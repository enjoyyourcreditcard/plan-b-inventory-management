<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Grf;
use App\Models\Irf;
use App\Models\Part;
use App\Models\Stock;
use App\Models\Timeline;
use App\Models\Warehouse;
use App\Models\RequestForm;
use App\Models\RequestStock;
use App\Models\TransferForm;
use Illuminate\Http\Request;
use App\Models\TransferStock;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\WarehouseTransferImport;
use App\Imports\WarehouseTransferRecipient;
use Illuminate\Validation\ValidationException;

class WarehouseTransactionService
{

    public function __construct(Timeline $timeline, RequestForm $requestForm, Grf $grf, Irf $irf, TransferForm $transferForm, TransferStock $transferStock, Stock $stock, Warehouse $warehouse, RequestStock $requestStock)
    {
        $this->requestForm   = $requestForm;
        $this->grf           = $grf;
        $this->irf           = $irf;
        $this->timeline      = $timeline;
        $this->warehouse     = $warehouse;
        $this->stock         = $stock;
        $this->transferForm  = $transferForm;
        $this->transferStock = $transferStock;
        $this->requestStock  = $requestStock;
    }

    /*
    *--------------------------------------------------------------------------
    * Get data warehouse approval
    *--------------------------------------------------------------------------
    */
    public function handleAllWhApproval()
    {
        $grfs = $this->grf->with('user')->where('status', 'ic_approved')->where('warehouse_id', Auth::user()->warehouse_id)->get();
        return ($grfs);
    }

    /*
    *--------------------------------------------------------------------------
    * Get data warehouse return
    *--------------------------------------------------------------------------
    */
    public function handleAllWhReturn()
    {
        $grfs = $this->grf->with('user')->where('status', 'return')->where('warehouse_id', Auth::user()->warehouse_id)->get();
        return ($grfs);
    }

    public function handleFindWhApproval($id)
    {
        $grfs = $this->grf->with('user')->where('status', 'ic_approved')->where('warehouse_id', $id)->get();
        return ($grfs);
    }

    public function handleFindWhReturn($id)
    {
        $grfs = $this->grf->with('user')->where('status', 'return_ic_approved')->where('warehouse_id', $id)->get();
        return ($grfs);
    }

    /*
    *--------------------------------------------------------------------------
    * Show data warehouse approv sesuai grf
    *--------------------------------------------------------------------------
    */
    public function handleShowWhApproval($id)
    {
        $wherewh                = str_replace('~', '/', $id);
        $whapproval             = $this->grf->with('requestForms.part', 'user', 'warehouse')->where('grf_code', $wherewh)->first();
        $whapproval['quantity'] = 0;

        foreach ($whapproval->requestForms as $requestForm) {
            $whapproval['quantity'] += $requestForm->quantity;
        }

        return ($whapproval);
    }

    // *: Untuk show data sesuai id yang untuk tampil sesuai grfcode return
    public function handleShowWhReturn($id)
    {
        $wherewh              = str_replace('~', '/', $id);
        $whreturn             = $this->grf->with('requestForms.part', 'user', 'warehouse')->where('grf_code', $wherewh)->first();
        $whreturn['quantity'] = 0;

        foreach ($whreturn->requestForms as $requestForm) {
            $whreturn['quantity'] += $requestForm->quantity;
        }
        
        return ($whreturn);
    }

    // *: Untuk menggrouping banyak data menjadi 1 row
    public function handleGroubWhApproval()
    {
        $whapproval = $this->whapprov->all()->groupBy('grf_code');
        return ($whapproval);
    }

    /*
    *--------------------------------------------------------------------------
    * Input Non SN
    *--------------------------------------------------------------------------
    */
    public function handleStoreNonSnWhApproval($request)
    {
        $validatedData = $request->validate([
            'request_form_id' => 'required',
            'grf_id' => 'required',
            'part_id' => 'required',
            'quantity' => 'required',
        ]);

        $stock = $this->stock
                      ->where('part_id', $validatedData['part_id'])
                      ->where('warehouse_id', $this->grf->find($validatedData['grf_id'])->warehouse_id)
                      ->where('stock_status', 'hold')
                      ->where('quantity', $validatedData['quantity'])
                      ->first();

        $this->requestStock->create([
            'request_form_id' => $request->request_form_id,
            'grf_id' => $request->grf_id,
            'part_id' => $request->part_id,
            'stock_id' => $stock->id,
            'quantity' => $request->quantity,
        ]);

        return ('data stored!');
    }
    
    /*
    *--------------------------------------------------------------------------
    * Input sn Satuan
    *--------------------------------------------------------------------------
    */
    public function handleStoreWhApproval($request)
    {
        $validatedData = $request->validate([
            'request_form_id' => 'required',
            'grf_id' => 'required',
            'part_id' => 'required',
            'sn_code.*' => 'distinct',
            'sn_code' => ['required', 'array'],
        ]);





        // dd("okeyy");

        foreach ($request->sn_code as $sn_code) {
            if (!$this->stock->where("sn_code", $sn_code)->where('stock_status','in')->exists()) {
                throw ValidationException::withMessages(['error' => "Serial Number (" .$sn_code. ") Tidak ditemukan"]);
            }
            // $this->part
            // if () {
            //     # code...
            // }
            // throw ValidationException::withMessages(['field_name' => 'This value is incorrect']);

            $stock = $this->stock->where('part_id', $request->part_id)->where('sn_code', $sn_code)->first();

            $this->requestStock->create([
                'request_form_id' => $request->request_form_id,
                'grf_id' => $request->grf_id,
                'part_id' => $request->part_id,
                'stock_id' => $stock->id,
                'sn' => $sn_code,
            ]);
        }

        return ('data stored!');
    }




    public function handlePostApproveWH($req, $transactionService)
    {
        $grf = $this->grf->with('requestStocks')->find($req->id);
        $grf->surat_jalan = $transactionService->handleGenerateSuratJalan(1);
        $grf->status = "delivery_approved";
        $grf->save();

        foreach ($grf->requestStocks as $requestStock) {
            $this->stock->where([['sn_code', $requestStock->sn], ['quantity', $requestStock->quantity]])->update(['stock_status' => 'hold']);
        }

        $this->timeline->create([
            'grf_id' => $req->id,
            'status' => 'wh_approved'
        ]);
        $this->timeline->create([
            'grf_id' => $req->id,
            'status' => 'delivery_approved'
        ]);

        // $grf->wh_approved_date = Carbon::now();
        // $grf->delivery_approved_date = Carbon::now();


        return "success";
    }

    /*
    *--------------------------------------------------------------------------
    * Warehouse transfer generate grf code
    *--------------------------------------------------------------------------
    */
    public function handleGenerateGrfCode()
    {
        $allGrfs     = count($this->grf->where('user_id', '=', Auth::user()->id)->get());
        $grfs        = count($this->grf->where([['user_id', '=', Auth::user()->id], ['status', '!=', 'closed'], ['type', 'transfer']])->get());
        $rawMonth    = now()->format('m');
        $map         = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $returnValue = '';

        while ($rawMonth > 0) {
            foreach ($map as $roman => $int) {
                if ($rawMonth >= $int) {
                    $rawMonth -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }

        $attempt = $allGrfs + 1;
        $name    = str_replace(' ', '-', strtoupper(Auth::user()->name));
        $month   = $returnValue;
        $year    = now()->format('Y');

        if ($allGrfs > 0) {
            if ($allGrfs >= 9) {
                $grf_code = '0' . $attempt . '/' . $name . '/' . 'IB' . '/' . $month . '/' . $year;
            } else {
                $grf_code = '00' . $attempt . '/' . $name . '/' . 'IB' . '/' . $month . '/' . $year;
            }
        } else {
            $grf_code = '001' . '/' . $name . '/' . 'IB' . '/' . $month . '/' . $year;
        }

        return ($grf_code);
    }

    public function handleTransferFormPerGrf($code)
    {
        $transferForms = $this->grf->with('transferForms.part', 'transferForms.transferStocks')->where([['grf_code', '=', str_replace('~', '/', strtoupper($code))], ['status', '!=', 'closed']])->first()->transferForms;
        return $transferForms;
    }



    /*
    *--------------------------------------------------------------------------
    * Store stock that will be transfer to the list
    *--------------------------------------------------------------------------
    */
    public function handleStoreWarehouseForm($request, $id)
    {
        if ($request->warehouse_id != null && $request->warehouse_destination != null) {
            $validatedWarehouseId = $request->validate([
                'warehouse_id'          => 'required',
                'warehouse_destination' => 'required',
            ]);

            $this->grf->find($id)->update($validatedWarehouseId);
        }

        $validatedData = $request->validate([
            'part_id'  => 'required',
            'quantity' => 'required',
        ]);

        $validatedData['grf_id'] = $id;

        $transferCreated = $this->transferForm->create($validatedData);

        for ($i = 0; $i < $request->quantity; $i++) {
            $this->transferStock->create([
                'transfer_form_id' => $transferCreated->id,
                'grf_id'           => $transferCreated->grf_id,
                'part_id'          => $transferCreated->part_id,
                'sn'               => null,
            ]);
        }

        return ('Data has been updated');
    }



    /*
    *|--------------------------------------------------------------------------
    *| IC: Submit the warehouse transfer list
    *|--------------------------------------------------------------------------
    */
    public function handleUpdateWarehouseTransfer($request)
    {
        $this->irf->find($request->irf_id)->update([
            'status' => 'on_progress',
        ]);

        $this->timeline->create([
            'irf_id'     => $request->irf_id,
            'status'     => "on_progress",
            'created_at' => now(),
        ]);

        return ResponseJSON(null, 200);
    }



    /*
    *|--------------------------------------------------------------------------
    *| Remove Item Transfer from list
    *|--------------------------------------------------------------------------
    */
    public function handleDeleteTransferForm($id)
    {
        $this->transferStock->where('transfer_form_id', $id)->get()->map(function ($transferStock) {
            $transferStock->delete();
        });

        $transferForm = $this->transferForm->find($id)->delete();

        return ResponseJSON($transferForm, 200);
    }



    /*
    *|--------------------------------------------------------------------------
    *| Change current warehouse on transfer
    *|--------------------------------------------------------------------------
    */
    public function handleChangeCurrentWarehouseTransfer($request, $id)
    {
        $validatedData = $request->validate(["warehouse_id" => "required"]);

        $validatedData["warehouse_destination"] = null;

        $this->transferStock->where("irf_id", $id)->get()->map(function ($itemList) {
            $itemList->delete();
        });

        $this->transferForm->where("irf_id", $id)->get()->map(function ($itemList) {
            $itemList->delete();
        });

        $this->irf->find($id)->update($validatedData);

        return (null);
    }



    /*
    *|--------------------------------------------------------------------------
    *| Change warehouse destination on transfer
    *|--------------------------------------------------------------------------
    */
    public function handleChangeWarehouseDestinationTransfer($request, $id)
    {
        $validatedData = $request->validate(["warehouse_destination" => "required"]);

        $this->irf->find($id)->update($validatedData);

        return (null);
    }



    /*
    *|--------------------------------------------------------------------------
    *| SH: Store pieces sn for warehouse transfer's items
    *|--------------------------------------------------------------------------
    */
    public function handleStorePiecesTransfer($request, $id)
    {
        $irf   = $this->irf->with('transferForms', 'transferStocks')->find($request->irf_id);
        $limit = $this->transferForm->find($request->transfer_form_id)->quantity;

        $validatedData = $request->validate([
            'transfer_form_id' => 'required',
            'irf_id'           => 'required',
            'part_id'          => 'required',
            'sn_code.*'        => 'distinct|exists:stocks,sn_code',
            'sn_code'          => ['required', 'array', 'size:' . $limit, Rule::exists('stocks')->where(function ($query) use ($request, $irf) {
                return $query->where('part_id', $request->part_id)->where('warehouse_id', $irf->warehouse_id);
            })],
        ]);

        for ($i = 0; $i < count($request->sn_code); $i++) {
            $sn_code = $request->sn_code[$i];
            $stock   = $this->stock->where('part_id', $request->part_id)->where('warehouse_id', $irf->warehouse_id)->where('sn_code', $sn_code)->where('stock_status', 'in')->where('status', 'active')->first();

            $this->transferStock->create([
                'transfer_form_id' => $request->transfer_form_id,
                'irf_id'           => $irf->id,
                'part_id'          => $request->part_id,
                'stock_id'         => $stock->id,
                'sn'               => $sn_code,
            ]);

            $stock->update([
                'stock_status' => 'hold'
            ]);
        }

        return 'snes stored';
    }


    // Approve Transfer and create out status
    public function handleStoreTransferNonSN($request)
    {
        $dataGrf = $this->grf->find($request->grf_id);
        $baseStock = $this->stock->where([['part_id', $request->part_id], ['warehouse_id', $dataGrf->warehouse_id], ['sn_code', null], ['stock_status', 'in']])->first();

        $data = $this->stock->create([
            'part_id' => $request->part_id,
            'warehouse_id' => $dataGrf->warehouse_id,
            'sn_code' => null,
            'quantity' => $request->quantity,
            'condition' => $baseStock->condition,
            'recondition' => null,
            'expired_date' => $baseStock->expired_date,
            'stock_status' => 'out',
            'status' => 'active',
        ]);

        $transferStock = $this->transferStock
        ->whereHas('transferForm', function ($query) use($dataGrf, $request) {$query->where([['grf_id', $dataGrf->id], ['transfer_form_id', $request->transfer_form_id]]);})
        ->whereHas('transferForm.part', function ($query) {$query->where('sn_status', 'NON SN');})->get();

        foreach ($transferStock as $key => $transferStock) {
            $transferStock->update([
                'stock_id' => $data->id 
            ]);
        }

        return('approved');
    }

    /*
    *|--------------------------------------------------------------------------
    *| WH: Input non SN to transfer
    *|--------------------------------------------------------------------------
    */
    public function handleUpdateTransferNonSN($request)
    {
        $irf       = $this->irf->find($request->irf_id);
        $stock     = $this->stock->where([['part_id', $request->part_id], ['warehouse_id', $irf->warehouse_id], ['stock_status', 'in'], ['status', 'active']])->first();

        $stock->update([
            'quantity' => ($stock->quantity - $request->quantity),
            'good'     => ($stock->good - $request->quantity),
        ]);

        $holdStock = $this->stock->create([
            'part_id'      => $request->part_id,
            'warehouse_id' => $irf->warehouse_id,
            'quantity'     => $request->quantity,
            'good'         => $request->quantity,
            'not_good'     => 0,
            'expired_date' => $stock->expired_date,
            'stock_status' => 'hold',
            'status'       => 'active',
        ]);

        $this->transferStock->create([
            'transfer_form_id' => $request->transfer_form_id,
            'irf_id'           => $irf->id,
            'part_id'          => $request->part_id,
            'stock_id'         => $holdStock->id,
            'quantity'         => $request->quantity,
        ]);

        return('updated');
    }

    /*
    *|--------------------------------------------------------------------------
    *| WH: Store bulk sn for warehouse transfer's items
    *|--------------------------------------------------------------------------
    */
    public function handleStoreBulkTransfer($request, $id)
    {
        $irf     = $this->irf->with('transferForms', 'transferStocks')->find($request->irf_id);
        $excel   = Excel::toCollection(new WarehouseTransferImport, $request->file);
        $sn_code = [];

        foreach ($excel->first() as $row) {
            $sn_code[] = $row->first();
        }

        $limit = $this->transferForm->find($request->transfer_form_id)->quantity;

        $request['sn_code'] = $sn_code;

        $validatedData = $request->validate([
            'transfer_form_id' => 'required',
            'irf_id'           => 'required',
            'part_id'          => 'required',
            'sn_code.*'        => 'distinct|exists:stocks,sn_code',
            'sn_code'          => [
                'required', 'array', 'size:' . $limit, Rule::exists('stocks')->where(function ($query) use ($request, $irf) {
                    return $query->where('part_id', $request->part_id)->where('warehouse_id', $irf->warehouse_id);
                }),
            ],
        ]);

        for ($i = 0; $i < count($request->sn_code); $i++) {
            $sn_code = $request->sn_code[$i];
            $stock   = $this->stock->where('part_id', $request->part_id)->where('warehouse_id', $irf->warehouse_id)->where('sn_code', $sn_code)->where('stock_status', 'in')->where('status', 'active')->first();

            $this->transferStock->create([
                'transfer_form_id' => $request->transfer_form_id,
                'irf_id'           => $irf->id,
                'part_id'          => $request->part_id,
                'stock_id'         => $stock->id,
                'sn'               => $sn_code,
            ]);

            $stock->update([
                'stock_status' => 'hold'
            ]);
        }

        return $validatedData;
    }



    /*
    *|--------------------------------------------------------------------------
    *| WH: IRF by warehouse_id
    *|--------------------------------------------------------------------------
    */
    public function handleAllWhTransfer($warehouse_id)
    {
        $transferform = $this->irf->with('transferForms', 'warehouse')->where([['warehouse_id', $warehouse_id], ['type', '!=', 'transfer_inbound'], ['type', '!=', 'transfer_rekondisi'], ['status', '!=', 'closed']])->get();
        return ($transferform);
    }

    /*
    *|--------------------------------------------------------------------------
    *| WH: transferForms by IRF
    *|--------------------------------------------------------------------------
    */
    public function handleShowWhTransfer($id)
    {
        $irf_code   = str_replace('~', '/', $id);
        $whapproval = $this->irf->with('transferForms.part', 'transferForms.transferStocks', 'warehouse', 'transferStocks',)->where('irf_code', $irf_code)->first();

        $whapproval->transferForms->map(function ($transferForm) {
            $transferForm['inputed_quantity'] = $transferForm->part->sn_status == 'SN' || $transferForm->part->sn_status == 'sn' ? count($transferForm->transferStocks) : (isset($transferForm->transferStocks->first()->quantity) ? $transferForm->transferStocks->first()->quantity : 0);
            return $transferForm;
        });

        return ($whapproval);
    }

    /*
    *|--------------------------------------------------------------------------
    *| WH: Input recieved item pieces
    *|--------------------------------------------------------------------------
    */
    public function handleStoreManualTransfer($request, $id)
    {
        $validatedData = $request->validate([
            'transfer_form_id' => 'required',
            'irf_id'           => 'required',
            'part_id'          => 'required',
            'sn.*'             => ['distinct'],
            'sn'               => ['required', 'array', Rule::exists('transfer_stocks')->where(function ($query) use ($request) {
                $query->where([
                    ['part_id', $request->part_id],
                    ['irf_id', $request->irf_id],
                    ['transfer_form_id', $request->transfer_form_id]
                ]);
            })]
        ]);

        $transferForm = $this->transferForm->with('transferStocks')->find($request->transfer_form_id);

        for ($i = 0; $i < count($transferForm->transferStocks); $i++) {
            $transferStock = $transferForm->transferStocks[$i];

            $transferStock->update([
                'sn_return' => $request->sn[$i]
            ]);
        }
    }

    /*
    *|--------------------------------------------------------------------------
    *| WH: input recieved non SN
    *|--------------------------------------------------------------------------
    */
    public function handleStoreRecipientNonSN($request, $id)
    {
        $irf = $this->irf->with('transferForms.transferStocks', 'transferStocks.stock')->find($request->irf_id);
        
        $irf->transferForms->find($request->transfer_form_id)->transferStocks->first()->update([
            'quantity_return' => $request->quantity
        ]);

        return 'updated';
    }

    /*
    *|--------------------------------------------------------------------------
    *| WH: Submit IRF to transfer
    *|--------------------------------------------------------------------------
    */
    public function handleSubmitTransferApprov($request, $id)
    {
        $irf = $this->irf->with('transferForms', 'transferStocks.stock')->find($id);

        for ($i = 0; $i < count($irf->transferStocks); $i++) { 
            $transferStock = $irf->transferStocks[$i];
            $stock         = $transferStock->stock;
            
            $stock->update([
                'stock_status' => 'out',
            ]);
        }

        $irf->status = "delivery_approved";
        $irf->save();

        $this->timeline->create([
            'irf_id'     => $id,
            'status'     => 'delivery_approved',
            'created_at' => now(),
        ]);

        return ('succes');
    }

    /*
    *|--------------------------------------------------------------------------
    *| Get view wh transfer recipient
    *|--------------------------------------------------------------------------
    */
    public function handleWhRecipientAPI($warehouse_destination)
    {
        return $this->irf->with('transferForms', 'warehouse')->where([['warehouse_destination', $warehouse_destination], ['status', 'delivery_approved']])->get();
    }

    public function handleWhRecipient()
    {
        return $this->irf->with('transferForms', 'warehouse')->where([['warehouse_destination', Auth::user()->warehouse->name], ['status', 'delivery_approved']])->get();
    }

    /*
    *|--------------------------------------------------------------------------
    *| WH: Detail IRF to recieve
    *|--------------------------------------------------------------------------
    */
    public function handleShowRecipient($id)
    {
        $irfCode    = str_replace('~', '/', $id);
        $whapproval = $this->irf->with('transferForms.part', 'transferForms.transferStocks', 'warehouse', 'transferStocks')->where('irf_code', $irfCode)->first();

        $whapproval->transferForms->map(function ($transferForm) {
            $transferForm['inputed_quantity'] = $transferForm->part->sn_status == 'SN' || $transferForm->part->sn_status == 'sn' ? count($transferForm->transferStocks->where('sn_return', '!=', null)) : ($transferForm->transferStocks->first()->quantity_return == null ? 0 : $transferForm->transferStocks->first()->quantity_return);

            return $transferForm;
        });

        return ($whapproval);
    }

    /*
    *|--------------------------------------------------------------------------
    *| WH: input recieved item bulk
    *|--------------------------------------------------------------------------
    */
    public function handleBulkRecipient($request, $id)
    {
        $irf   = $this->irf->with('transferForms', 'transferStocks')->find($request->irf_id);
        $excel = Excel::toCollection(new WarehouseTransferRecipient, $request->file);
        $sn    = [];

        foreach ($excel->first() as $row) {
            $sn[] = $row->first();
        }

        $limit = $this->transferForm->find($request->transfer_form_id)->quantity;

        $request['sn'] = $sn;

        $validatedData = $request->validate([
            'transfer_form_id' => 'required',
            'irf_id' => 'required',
            'part_id' => 'required',
            'sn.*' => 'distinct|exists:transfer_stocks,sn',
            'sn' => ['required', 'array', 'size:' . $limit, Rule::exists('transfer_stocks')->where(function ($query) use ($request) {
                $query->where([
                        ['part_id', $request->part_id],
                        ['irf_id', $request->irf_id],
                        ['transfer_form_id', $request->transfer_form_id]
                ]);
            })],
        ]);

        $transferForm = $this->transferForm->with('transferStocks')->find($request->transfer_form_id);

        for ($i = 0; $i < count($transferForm->transferStocks); $i++) {
            $transferStock = $transferForm->transferStocks[$i];

            $transferStock->update([
                'sn_return' => $request->sn[$i]
            ]);
        }

        return ('success');
    }

    public function handleSubmitRecipient($request, $id)
    {
        $irf                    = $this->irf->with('transferStocks', 'transferForms.part', 'transferForms.transferStocks.part')->find($id);
        $warehouseDestinationId = $this->warehouse->where('name', $irf->warehouse_destination)->first()->id;
        $dataSN                 = $this->transferStock->whereHas('irf', function ($query) use ($id) { $query->where('id', $id); })->whereHas('part', function ($query) { $query->where('sn_status', 'SN')->where('sn_status', 'sn'); })->get();
        $dataNonSN              = $this->transferStock->whereHas('irf', function ($query) use ($id) { $query->where('id', $id); })->whereHas('part', function ($query) { $query->where('sn_status', '!=', 'SN')->where('sn_status', '!=', 'sn'); })->get();

        // SN
        for ($i = 0; $i < count($dataSN); $i++) { 
            $transferStockSn = $dataSN[$i];

            $this->stock->find($transferStockSn->stock_id)->update([
                'warehouse_id' => $warehouseDestinationId,
                'stock_status' => 'in',
            ]);
        }

        // non SN
        for ($i = 0; $i < count($dataNonSN); $i++) { 
            $transferStockNonSn = $dataNonSN[$i];
            $stock = $this->stock
                          ->where('part_id', $transferStockNonSn->part_id)
                          ->where('warehouse_id', $warehouseDestinationId)
                          ->where('stock_status', 'in')
                          ->where('status', 'active')
                          ->first();

            if ($stock) {
                // ada
                $stock->update([
                    'quantity' => ($stock->quantity + $transferStockNonSn->quantity_return),
                    'good'     => ($stock->good + $transferStockNonSn->quantity_return),
                    'not_good' => 0,
                ]);
            } else {
                // gk ada
                $this->stock->create([
                    'part_id'      => $transferStockNonSn->part_id,
                    'warehouse_id' => $warehouseDestinationId,
                    'quantity'     => $transferStockNonSn->quantity_return,
                    'good'         => $transferStockNonSn->quantity_return,
                    'not_good'     => 0,
                    'condition'    => $transferStockNonSn->stock->condition,
                    'expired_date' => $transferStockNonSn->stock->expired_date,
                    'stock_status' => 'in',
                    'status'       => 'active',
                ]);
            }

            $transferStockNonSn->stock->update([
                'status' => 'non_active'
            ]);
        }

        $irf->update([
            'status' =>'closed'
        ]);

        $this->timeline->create([
            'irf_id'     => $id,
            'status'     => 'user_pickup',
            'created_at' => now(),
        ]);

        return 'Submited';

        // ================================================================

        foreach ($dataSN as $transferStock) {
            $this->stock->where('sn_code', $transferStock->sn)->update(['stock_status' => 'in', 'warehouse_id' => $this->warehouse->where('name', $irf->warehouse_destination)->first()->id]);
        }

        $dataNonSN = $this->transferForm->with('transferStocks')->whereHas('grf', function ($query) use($id) {$query->where('id', $id);})->whereHas('part', function ($query) {$query->where('sn_status', 'NON SN');})->get();
        
        
        foreach ($dataNonSN as $key => $transferForms) {
            $warehouseDestinationId = $this->warehouse->where('name', $irf->warehouse_destination)->first();
            $destinationStock = $this->stock->where([['part_id', $transferForms->part_id], ['warehouse_id', $warehouseDestinationId->id], ['sn_code', null], ['stock_status', 'in']])->first();
            $dataNonSNId = $transferForms->transferStocks->first()->stock_id;

            $this->stock->where('id', $destinationStock->id)->update([
                'quantity' => $destinationStock->quantity + $transferForms->quantity
            ]);

            $this->stock->where('id', $dataNonSNId)->delete();
        }

        $irf->status = "closed";
        $irf->save();

        $this->timeline->create([
            'grf_id' => $id,
            'status' => 'user_pickup',
            'created_at' => now(),
        ]);

        return ('succes');
    }





    // *: untuk input sn_code yang ada di field 
    // public function handleUpdateWhApproval($request)
    // {
    //     $whapprov = $this->requestForm->where('grf_code', $request->grf_code)->get();
    //     for ($i = 0; $i < count($request['id']); $i++) {
    //         $whapprov->find($request['id'][$i])->update(['sn_code' => $request['sn_code'][$i]]);
    //     }
    //     return ($whapprov);
    // }


}
