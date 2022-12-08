<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Grf;
use App\Models\Stock;
use App\Models\Timeline;
use App\Models\Warehouse;
use App\Models\RequestForm;
use App\Models\TransferForm;
use Illuminate\Http\Request;
use App\Models\TransferStock;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\WarehouseTransferImport;
use App\Imports\WarehouseTransferRecipient;
use App\Models\Part;
use App\Models\RequestStock;
use Illuminate\Validation\ValidationException;

class WarehouseTransactionService
{

    public function __construct(Timeline $timeline, RequestForm $requestForm, Grf $grf, TransferForm $transferForm, TransferStock $transferStock, Stock $stock, Warehouse $warehouse, RequestStock $requestStock)
    {
        $this->requestForm = $requestForm;
        $this->grf = $grf;
        $this->timeline = $timeline;
        $this->warehouse = $warehouse;
        $this->stock = $stock;
        $this->transferForm = $transferForm;
        $this->transferStock = $transferStock;
        $this->requestStock = $requestStock;
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

        // dd($grfs);
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

        $this->requestStock->create([
            'request_form_id' => $request->request_form_id,
            'grf_id' => $request->grf_id,
            'part_id' => $request->part_id,
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



            $this->requestStock->create([
                'request_form_id' => $request->request_form_id,
                'grf_id' => $request->grf_id,
                'part_id' => $request->part_id,
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
        $allGrfs = count($this->grf->where('user_id', '=', Auth::user()->id)->get());
        $grfs = count($this->grf->where([['user_id', '=', Auth::user()->id], ['status', '!=', 'closed'], ['type', 'transfer']])->get());

        $rawMonth = now()->format('m');
        $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
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
        $name = str_replace(' ', '-', strtoupper(Auth::user()->name));
        $month = $returnValue;
        $year = now()->format('Y');

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
                'warehouse_id' => 'required',
                'warehouse_destination' => 'required',
            ]);

            $this->grf->find($id)->update($validatedWarehouseId);
        }

        $validatedData = $request->validate([
            'part_id' => 'required',
            'quantity' => 'required',
        ]);

        $validatedData['grf_id'] = $id;

        $transferCreated = $this->transferForm->create($validatedData);

        for ($i = 0; $i < $request->quantity; $i++) {
            $this->transferStock->create([
                'transfer_form_id' => $transferCreated->id,
                'grf_id' => $transferCreated->grf_id,
                'part_id' => $transferCreated->part_id,
                'sn' => null,
            ]);
        }

        return ('Data has been updated');
    }



    /*
    *|--------------------------------------------------------------------------
    *| Submit the warehouse transfer list
    *|--------------------------------------------------------------------------
    */
    public function handleUpdateWarehouseTransfer($request)
    {
        $transferForms = $this->transferForm->with('transferStocks')->where('grf_id', $request->grf_id)->get();

        $stocks = [];

        // foreach ($transferForms as $transferForm) {
        //     foreach ($transferForm->transferStocks as $transferStock) {
        //         if ($this->stock->where([['sn_code', $transferStock->sn], ['part_id', $transferForm->part_id]])->first()) {
        //             $stocks[] = $this->stock->where([['sn_code', $transferStock->sn], ['part_id', $transferForm->part_id]])->first();
        //         } else {
        //             return redirect()->back()->with('error', 'SN Codes does not match, please recheck your SN Codes');
        //         }
        //     }
        // }

        foreach ($stocks as $stock) {
            $stock->update([
                'warehouse_id' => $this->warehouse->where('name', $request->warehouse_destination)->first()->id,
            ]);
        };

        $this->grf->find($request->grf_id)->update([
            'status' => 'submited',
        ]);

        $this->timeline->create([
            'grf_id' => $request->grf_id,
            'status' => "submited",
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

        $this->transferStock->where("grf_id", $id)->get()->map(function ($itemList) {
            $itemList->delete();
        });

        $this->transferForm->where("grf_id", $id)->get()->map(function ($itemList) {
            $itemList->delete();
        });

        $this->grf->find($id)->update($validatedData);

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

        $this->grf->find($id)->update($validatedData);

        return (null);
    }



    /*
    *|--------------------------------------------------------------------------
    *| Store pieces sn for warehouse transfer's items
    *|--------------------------------------------------------------------------
    */
    public function handleStorePiecesTransfer($request, $id)
    {
        // dd($request);
        $limit = $this->transferForm->find($request->transfer_form_id)->quantity;

        // $validatedData = $request->validate([
        //     'transfer_form_id' => 'required',
        //     'grf_id' => 'required',
        //     'part_id' => 'required',
        //     'sn_code.*' => 'distinct|exists:stocks,sn_code',
        //     'sn_code' => [
        //         'required', 'array', 'size:' . $limit, Rule::exists('stocks')->where(function ($query) use ($request) {
        //             return $query->where('part_id', $request->part_id);
        //         }),
        //     ],
        // ]);

        $transferStocks = $this->transferStock->where([['transfer_form_id', $request->transfer_form_id], ['grf_id', $request->grf_id], ['part_id', $request->part_id]])->get();

        foreach ($request["sn_code"] as $key => $sn_code) {
            $transferStocks[$key]->update([
                'sn' => $sn_code,
            ]);
        };

        return 'snes stored';
    }



    /*
    *|--------------------------------------------------------------------------
    *| Store bulk sn for warehouse transfer's items
    *|--------------------------------------------------------------------------
    */
    public function handleStoreBulkTransfer($request, $id)
    {
        $excel = Excel::toCollection(new WarehouseTransferImport, $request->file);

        $sn_code = [];

        foreach ($excel->first() as $row) {
            $sn_code[] = $row->first();
        }

        $limit = $this->transferForm->find($request->transfer_form_id)->quantity;

        $request['sn_code'] = $sn_code;

        $validatedData = $request->validate([
            'transfer_form_id' => 'required',
            'grf_id' => 'required',
            'part_id' => 'required',
            'sn_code.*' => 'distinct|exists:stocks,sn_code',
            'sn_code' => [
                'required', 'array', 'size:' . $limit, Rule::exists('stocks')->where(function ($query) use ($request) {
                    return $query->where('part_id', $request->part_id);
                }),
            ],
        ]);


        $transferStocks = $this->transferStock->where([['transfer_form_id', $validatedData['transfer_form_id']], ['grf_id', $validatedData['grf_id']], ['part_id', $validatedData['part_id']]])->get();

        foreach ($transferStocks as $key => $transferStock) {
            $transferStock->update([
                'sn' => $validatedData['sn_code'][$key],
            ]);
        }

        return $validatedData;
    }



    /*
    *|--------------------------------------------------------------------------
    *| Get view wh transfer approv
    *|--------------------------------------------------------------------------
    */

    public function handleAllWhTransfer($warehouse_id)
    {
        $transferform = $this->grf->with('user', 'transferForms', 'warehouse')->where([['warehouse_id', $warehouse_id], ['type', '!=', 'request'], ['status', 'submited']])->get();
        return ($transferform);
    }

    public function handleShowWhTransfer($id)
    {
        $wherewh = str_replace('~', '/', $id);
        $whapproval = $this->grf->with('transferForms.part', 'user', 'warehouse', 'transferStock',)->where('grf_code', $wherewh)->first();
        return ($whapproval);
    }

    public function handleStoreManualTransfer($request, $id)
    {

        $validatedData = $request->validate([
            'transfer_form_id' => 'required',
            'grf_id'           => 'required',
            'part_id'          => 'required',
            'sn.*'             => ['distinct'],
            'sn'               => ['required', 'array', Rule::exists('transfer_stocks')->where(function ($query) use ($request) {
                $query->where([['part_id', $request->part_id], ['grf_id', $request->grf_id], ['transfer_form_id', $request->transfer_form_id]]);
            })]
        ]);

        return ('');
    }

    public function handleSubmitTransferApprov($request, $id)
    {
        $currentGrf = $this->grf->with('transferStock')->find($id);

        foreach ($currentGrf->transferStock as $transferStock) {
            $this->stock->where('sn_code', $transferStock->sn)->update(['stock_status' => 'out']);
        }

        $currentGrf->status = "delivery_approved";
        $currentGrf->save();

        $this->timeline->create([
            'grf_id' => $id,
            'status' => 'delivery_approved',
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
        $transferform = $this->grf->with('user', 'transferForms', 'warehouse')->where([['warehouse_destination', $warehouse_destination], ['status', 'delivery_approved'], ['type', '!=', 'request']])->get();
        return $transferform;
    }

    public function handleWhRecipient()
    {
        $transferform = $this->grf->with('user', 'transferForms', 'warehouse')->where([['warehouse_destination', Auth::user()->warehouse->name], ['status', 'delivery_approved'], ['type', '!=', 'request']])->get();
        return ($transferform);
    }

    public function handleShowRecipient($id)
    {
        $wherewh = str_replace('~', '/', $id);
        $whapproval = $this->grf->with('transferForms.part', 'user', 'warehouse', 'transferStock')->where('grf_code', $wherewh)->first();
        return ($whapproval);
    }

    public function handleBulkRecipient($request, $id)
    {
        $excel = Excel::toCollection(new WarehouseTransferRecipient, $request->file);

        $sn = [];

        foreach ($excel->first() as $row) {
            $sn[] = $row->first();
        }

        $limit = $this->transferForm->find($request->transfer_form_id)->quantity;

        $request['sn'] = $sn;

        $validatedData = $request->validate([
            'transfer_form_id' => 'required',
            'grf_id' => 'required',
            'part_id' => 'required',
            'sn.*' => 'distinct|exists:transfer_stocks,sn',
            'sn' => [
                'required', 'array', 'size:' . $limit, Rule::exists('transfer_stocks')->where(function ($query) use ($request) {
                    return $query->where([['part_id', $request->part_id], ['grf_id', $request->grf_id]]);
                }),
            ],
        ]);
        return ('success');
    }

    public function handleSubmitRecipient($request, $id)
    {
        $currentGrf = $this->grf->with('transferStock')->find($id);
        // dd($this->warehouse->where('name', $currentGrf->warehouse_destination)->first()->id);
        foreach ($currentGrf->transferStock as $transferStock) {
            $this->stock->where('sn_code', $transferStock->sn)->update(['stock_status' => 'in', 'warehouse_id' => $this->warehouse->where('name', $currentGrf->warehouse_destination)->first()->id]);
        }

        $currentGrf->status = "closed";
        $currentGrf->save();

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
