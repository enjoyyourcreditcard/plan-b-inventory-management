<?php 
namespace App\Services;

use Carbon\Carbon;
use App\Models\Irf;
use App\Models\Part;
use App\Models\Stock;
use App\Models\Inbound;
use App\Models\Timeline;
use App\Models\Warehouse;
use Illuminate\Support\Arr;
use App\Models\InboundStock;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;
use App\Imports\InboundImport;
use Illuminate\Validation\Rule;
use App\Imports\WarehouseImport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\WarehouseTransferImport;
use Illuminate\Support\Facades\Validator;

class OrderInboundService
{

    public function __construct(Inbound $inbound, Irf $irf, Part $part, Warehouse $warehouse, Timeline $timeline, Stock $stock, InboundStock $inboundStock)
    {
        $this->inbound      = $inbound;
        $this->irf          = $irf;
        $this->part         = $part;
        $this->stock        = $stock;
        $this->inboundStock = $inboundStock;
        $this->timeline     = $timeline;
        $this->warehouse    = $warehouse;
    }

    /*
    *|--------------------------------------------------------------------------
    *| Show Inbound Form
    *|--------------------------------------------------------------------------
    */
    public function handleShowInboundForm($code)
    {
        $inboundForms = $this->grfInbound->with('inboundForms.part')->where([['id', '=', $code], ['status', '!=', 'closed']])->first();

        return ($inboundForms);
    }

    /*
    *|--------------------------------------------------------------------------
    *| Show Warehouse related to inbound
    *|--------------------------------------------------------------------------
    */
    public function handleGetWarehouseInbound()
    {
        $warehouseInbounds = $this->inbound->with('warehouse')->where('status', 'active')->get('warehouse_id')->groupby('warehouse_id');
        return ($warehouseInbounds);
    }

    /*
    *|--------------------------------------------------------------------------
    *| Store a new GRF to GRF table
    *|--------------------------------------------------------------------------
    */
    public function handleStoreInboundGrf($request)
    {
        $validatedData = $request->validate([
            'status'        => 'required',
        ]);

        $createdData = $this->grfInbound->create($validatedData);

        $this->timeline->create([
            "status"         => "draft",
            "grf_inbound_id" => $createdData->id,
        ]);

        return $createdData;
    }

    /*
    *|--------------------------------------------------------------------------
    *| IC: Generate new IRF code
    *|--------------------------------------------------------------------------
    */
    public function handleGenerateInboundIrfCode()
    {
        $irfs = count($this->irf->all());

        if ($irfs >= 0) {
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

            $attempt = $irfs + 1;
            $name    = str_replace(' ', '-', strtoupper(Auth::user()->name));
            $month   = $returnValue;
            $year    = now()->format('Y');

            if ($irfs > 0) {
                if ($irfs >= 9) {
                    $irf_code = '0' . $attempt . '/' . $name . '/' . 'INVENTREE' . '/' . $month . '/' . $year;
                } else {
                    $irf_code = '00' . $attempt . '/' . $name . '/' . 'INVENTREE' . '/' . $month . '/' . $year;
                }
            } else {
                $irf_code = '001' . '/' . $name . '/' . 'INVENTREE' . '/' . $month . '/' . $year;
            }
        } else {
            $irf_code = null;
        }

        return ($irf_code);
    }

     /*
    *|--------------------------------------------------------------------------
    *| Get all grf requester data by it's user
    *|--------------------------------------------------------------------------
    */
    public function handleGetAllInboundGrf()
    {
        $grfs = $this->grfInbound->latest()->get();

        return ($grfs);
    }

     /*
    *|--------------------------------------------------------------------------
    *| Get all grf requester data by it's user
    *|--------------------------------------------------------------------------
    */
    public function handleGetAllInboundGrfByUser()
    {
        $grfs = $this->grfInbound->where([['user_id', Auth::user()->id]])->latest()->get();

        return ($grfs);
    }

        /*
    *|--------------------------------------------------------------------------
    *| Store a requested item into the list 
    *|--------------------------------------------------------------------------
    */
    public function handleInboundStore($request, $id)
    {
        if ($request->warehouse_id && $request->warehouse_destination) {
            $this->grfInbound->find($id)->update([
                'warehouse_id'          => $request->warehouse_id,
                'warehouse_destination' => $request->warehouse_destination,
            ]);
        }
 
        $validatedDatas = $request->validate([
            'part_id' => 'required',
            'quantity'  => 'required',
        ]);   

        $validatedDatas['grf_inbound_id'] = $id;
        
        if ($this->part->find($validatedDatas['part_id'])->sn_status == 'SN' || $this->part->find($validatedDatas['part_id'])->sn_status == 'sn') {
            for ($i = 0; $i < $validatedDatas['quantity']; $i++) {
                $this->orderInbound->create([
                    'grf_inbound_id' => $validatedDatas['grf_inbound_id'],
                    'part_id'        => $validatedDatas['part_id'],
                    'created_at'     => now(),
                ]);
            }
        } else {
            $grf     = $this->grfInbound->find($id);
            $inbound = $this->inbound->where('warehouse_id', $grf->warehouse_id)->where('part_id', $validatedDatas['part_id'])->where('stock_status', 'in')->first();

            $this->orderInbound->create([
                'grf_inbound_id' => $validatedDatas['grf_inbound_id'],
                'part_id'        => $validatedDatas['part_id'],
                'quantity'       => $validatedDatas['quantity'],
                'created_at'     => now(),
            ]);
        }
        
        return ('data stored');
    }

        /*
    *|--------------------------------------------------------------------------
    *| Show a requested item into the list 
    *|--------------------------------------------------------------------------
    */
    public function handleInboundMiniStock($code)
    {
        $grf          = $this->grfInbound->where('id', $code)->first();
        $orderInbound = $this->orderInbound->with('part', 'inbound', 'warehouse')->where('grf_inbound_id', '=', $grf->id)->get()->groupby('part_id');
        return ($orderInbound);
    }

        /*
    *|--------------------------------------------------------------------------
    *| Change current warehouse
    *|--------------------------------------------------------------------------
    */
    public function handleUpdateCurrentWarehouse($request, $id)
    {
        $validatedData = $request->validate([
            'warehouse_id' => 'required',
        ]);
            
        $this->grfInbound->find($id)->update($validatedData);
    }

        /*
    *|--------------------------------------------------------------------------
    *| Change warehouse destination
    *|--------------------------------------------------------------------------
    */
    public function handleUpdateWarehouseDestination($request, $id)
    {
        $validatedData = $request->validate([
            'warehouse_destination' => 'required',
        ]);
            
        $this->grfInbound->find($id)->update($validatedData);
    }

            /*
    *|--------------------------------------------------------------------------
    *| Delete a requested item in the list 
    *|--------------------------------------------------------------------------
    */
    public function handleDeleteOrderInbound($request, $id)
    {
        $this->orderInbound->where([['part_name', $request->part_name], ['grf_inbound_id', $id]])->delete();

        return ('data has been slain');
    }

        /*
    *|--------------------------------------------------------------------------
    *| Change the GRF status to submited
    *|--------------------------------------------------------------------------
    */
    public function handleUpdateRequestForm($request, $id)
    {
        $data = [
            "inbound_grf_id" => $id,
            "status"         => "submited",
            "user_id"        => Auth::id(),
        ];

        $this->grfInbound->find($id)->update($data);

        $this->timeline->create($data);

        return ('Data has been updated');
    }

    /*
    *|--------------------------------------------------------------------------
    *| Store inbound data from excel
    *|--------------------------------------------------------------------------
    */
    public function handleImportExcel($request)
    {
        $excel        = Excel::toCollection(new InboundImport, $request->excel);
        $part_id      = [];
        $brand        = [];
        $quantity     = [];
        $nomor_po     = [];
        $warehouse_id = $request->warehouse_id;

        foreach ($excel->first() as $row) {
            try {
                $part_id[]  = $this->part->where('name', $row['part_name'])->where('brand_name', $row['brand'])->first()->id;    
                $brand[]    = $this->part->where('name', $row['part_name'])->where('brand_name', $row['brand'])->first()->brand_name;
                $quantity[] = $row['quantity'];
                $nomor_po[] = $row['nomor_po'];
            } catch (\Throwable $th) {
                continue;
            }
        }

        $request['part_id']      = $part_id;
        $request['brand']        = $brand;
        $request['quantity']     = $quantity;
        $request['nomor_po']     = $nomor_po;
        $request['warehouse_id'] = $warehouse_id;

        $validatedData = $request->validate([
            'part_id'      => 'required',
            'irf_code'     => 'required',
            'brand'        => 'required',
            'quantity'     => 'required',
            'nomor_po'     => 'required',
            'warehouse_id' => 'required',
        ]);

        $recentIrf = $this->irf->create([
            'irf_code'     => $validatedData['irf_code'],
            'warehouse_id' => $validatedData['warehouse_id'],
            'type'         => 'transfer_inbound',
            'status'       => 'on_progress',
        ]);

        $this->timeline->create([
            'irf_id' => $recentIrf->id,
            'status' => 'on_progress',
        ]);

        for ($i = 0; $i < count($validatedData['part_id']); $i++) {
            $this->inbound->create([
                'warehouse_id' => $validatedData['warehouse_id'],
                'irf_id'       => $recentIrf->id,
                'part_id'      => $validatedData['part_id'][$i],
                'brand'        => $validatedData['brand'][$i],
                'quantity'     => $validatedData['quantity'][$i],
                'nomor_po'     => $validatedData['nomor_po'][$i],
            ]);
        }

        return ('stored');
    }

    /*
    *|--------------------------------------------------------------------------
    *| Store non sn Inbound Giver
    *|--------------------------------------------------------------------------
    */
    public function handleStoreNonSnInboundGiverPieces($request, $id)
    {
        $validatedData = $request->validate([
            'part_id'    => 'required',
            'quantity'   => 'required'
        ]);

        $currentGrf   = $this->grfInbound->with('inboundForms.inbound')->find($id);
        $inbound      = $this->inbound->where('part_id', $request->part_id)->where('warehouse_id', $currentGrf->warehouse_id)->where('stock_status', 'in')->where('status', 'active')->first();
        $orderInbound = $this->orderInbound->where([['grf_inbound_id', $id], ['part_id', $request->part_id], ['quantity', $request->quantity]])->first();

        $orderInbound->update([
            'inbound_id' => $inbound->id,
        ]);

        return 'stored';
    }

    /*
    *|--------------------------------------------------------------------------
    *| Store sn Inbound Giver
    *|--------------------------------------------------------------------------
    */
    public function handleStoreSnInboundGiverPieces($request, $id)
    {
        $validatedData = $request->validate([
            'sn_code.*' => ['distinct'],
            'sn_code'   => ['required', 'array', Rule::exists('inbounds')->where(function ($query) use ($request) {
                $query->where('part_id', $request->part_id);
            })]
        ]);

        $orderInbounds  = $this->orderInbound->where([['grf_inbound_id', $id], ['part_id', $request->part_id]])->get();
        $inboundBySn    = collect([]);

        for ($i = 0; $i < count($request->sn_code); $i++) {
            $inboundBySn->push($this->inbound->where([['sn_code', $request->sn_code[$i]], ['part_id', $request->part_id]])->first());
        }

        for ($i = 0; $i < count($orderInbounds); $i++) {
            $orderInbounds[$i]->update([
                'inbound_id' => $inboundBySn[$i]->id,
            ]);
        }

        return 'stored';
    }

    /*
    *|--------------------------------------------------------------------------
    *| Store sn Inbound Giver Bulk
    *|--------------------------------------------------------------------------
    */
    public function handleStoreSnInboundGiverBulk($request, $id)
    {
        $excel   = Excel::toCollection(new WarehouseTransferImport, $request->file);
        $sn_code = [];

        foreach ($excel->first() as $row) {
            $sn_code[] = $row->first();
        }

        $request['sn_code'] = $sn_code;

        $validatedData = $request->validate([
            'sn_code.*' => ['distinct'],
            'sn_code'   => ['required', 'array', Rule::exists('inbounds')->where(function ($query) use ($request) {
                $query->where('part_id', $this->part->where('name', $request->part_name)->first()->id);
            })]
        ]);

        $orderInbounds  = $this->orderInbound->where([['grf_inbound_id', $id], ['part_name', $request->part_name]])->get();
        $inboundBySn    = collect([]);

        for ($i = 0; $i < count($request->sn_code); $i++) {
            $inboundBySn->push($this->inbound->where([['sn_code', $request->sn_code[$i]], ['part_id', $this->part->where('name', $request->part_name)->first()->id]])->first());
        }

        for ($i = 0; $i < count($orderInbounds); $i++) {
            $orderInbounds[$i]->update([
                'inbound_id' => $inboundBySn[$i]->id,
            ]);
        }

        return 'stored';
    }

    /*
    *|--------------------------------------------------------------------------
    *| Update GRF Inbound
    *|--------------------------------------------------------------------------
    */
    public function handleUpdateGiver($request, $id, $grf_code, $transactionService)
    {
        $currentGrf = $this->grfInbound->with('inboundForms.inbound', 'inboundForms.part')->find($id);
        $data       = $currentGrf->update([
            "grf_code"    => $grf_code,
            "surat_jalan" => $transactionService->handleGenerateSuratJalan(1),
            "status"      => "delivery_approved",
        ]);

        foreach ($currentGrf->inboundForms as $orderInbound) {
            if ($orderInbound->part->sn_status == 'SN' || $orderInbound->part->sn_status == 'sn') {
                $this->inbound->find($orderInbound->inbound_id)->update([
                    'stock_status' => 'out',
                ]);
            } else {
                $this->inbound->find($orderInbound->inbound_id)->update([
                    'quantity' => $this->inbound->find($orderInbound->inbound_id)->quantity - $orderInbound->quantity,
                ]);
            }
        }

        $this->timeline->create([
            'grf_inbound_id' => $id,
            'status' => 'wh_approved'
        ]);
        $this->timeline->create([
            'grf_inbound_id' => $id,
            'status' => 'delivery_approved'
        ]);

        return $data;
    }

    /*
    *|--------------------------------------------------------------------------
    *| WH: Store quantity to inbound_stocks
    *|--------------------------------------------------------------------------
    */
    public function handleStoreNonSnInboundRecipientPieces($request, $id)
    {
        $validatedData = $request->validate([
            'inbound_id' => 'required',
            'quantity'   => 'required',
        ]);

        $this->inboundStock->create($validatedData);

        return 'stored';
    }

    /*
    *|--------------------------------------------------------------------------
    *| WH: Store SN to inbound_stocks
    *|--------------------------------------------------------------------------
    */
    public function handleStoreSnInboundRecipientPieces($request, $id)
    {
        $validatedData = $request->validate([
            'sn_code.*'  => ['distinct'],
            'sn_code'    => ['required', 'array'],
            'inbound_id' => 'required'
        ]);

        for ($i = 0; $i < count($validatedData['sn_code']); $i++) {
            $snCode    = $validatedData['sn_code'][$i];
            $inboundId = $validatedData['inbound_id'];
            
            $this->inboundStock->create([
                'inbound_id' => $inboundId, 
                'sn_code'    => $snCode, 
            ]);
        }

        return 'stored';
    }
    
    /*
    *|--------------------------------------------------------------------------
    *| Store sn Inbound Recipient Bulk
    *|--------------------------------------------------------------------------
    */
    public function handleStoreSnInboundRecipientBulk($request, $id)
    {
        $excel   = Excel::toCollection(new WarehouseTransferImport, $request->file);
        $sn_code = [];
        $limit   = $this->irf->with('inbounds')->find($id)->inbounds->find($request->inbound_id)->quantity;

        foreach ($excel->first() as $row) {
            $sn_code[] = $row->first();
        }

        $request['sn_code'] = $sn_code;

        $validatedData = $request->validate([
            'sn_code.*' => ['distinct'],
            'sn_code'   => ['required', 'array', 'size:' . $limit]
        ]);

        $validatedData['inbound_id'] = $request->inbound_id;

        for ($i = 0; $i < count($validatedData['sn_code']); $i++) {
            $snCode    = $validatedData['sn_code'][$i];
            $inboundId = $validatedData['inbound_id'];
            
            $this->inboundStock->create([
                'inbound_id' => $inboundId, 
                'sn_code'    => $snCode, 
            ]);
        }
        
        return 'stored';
    }

    /*
    *|--------------------------------------------------------------------------
    *| Update close GRF Inbound
    *|--------------------------------------------------------------------------
    */
    public function handleUpdateRecipient($request, $id)
    {
        $irf    = $this->irf->with('inbounds.inboundStocks', 'inbounds.part')->find($id);
        $stocks = $this->stock->with('part')->get();

        $this->timeline->create([
            'irf_id' => $id,
            'status' => 'closed'
        ]);

        $irf->update([
            'status' => 'closed'
        ]);

        for ($i = 0; $i < count($irf->inbounds); $i++) {
            $inbound = $irf->inbounds[$i];

            for ($ii = 0; $ii < count($inbound->inboundStocks); $ii++) {
                $inboundStock = $inbound->inboundStocks[$ii];
                $sn_status    = $inboundStock->inbound->part->sn_status;
                
                if ($sn_status == 'SN' || $sn_status == 'sn') {
                    $this->stock->create([
                        'part_id'      => $inboundStock->inbound->part_id,
                        'warehouse_id' => $inboundStock->inbound->warehouse_id,
                        'sn_code'      => $inboundStock->sn_code,
                        'condition'    => 'good new',
                        'expired_date' => now(),
                        'stock_status' => 'in',
                        'status'       => 'active',
                    ]);
                } else {
                    $isStockExists  = $stocks->where('part_id', $inboundStock->inbound->part_id)
                                             ->where('warehouse_id', $inboundStock->inbound->warehouse_id)
                                             ->where('stock_status', 'in')
                                             ->where('status', 'active')
                                             ->count();

                    $filteredStock  = $stocks->where('status', 'active')
                                             ->where('stock_status', 'in')
                                             ->where('warehouse_id', $inboundStock->inbound->warehouse_id)
                                             ->where('part_id', $inboundStock->inbound->part_id)
                                             ->first();
                    
                    if ($isStockExists) {
                        $filteredStock->update([
                            'good'     => ($filteredStock->good + $inboundStock->quantity),
                            'quantity' => ($filteredStock->quantity + $inboundStock->quantity),
                        ]);
                    } else {
                        $this->stock->create([
                            'part_id'      => $inboundStock->inbound->part_id,
                            'warehouse_id' => $inboundStock->inbound->warehouse_id,
                            'quantity'     => $inboundStock->quantity,
                            'good'         => $inboundStock->quantity,
                            'not_good'     => 0,
                            'condition'    => 'good new',
                            'expired_date' => now(),
                            'stock_status' => 'in',
                            'status'       => 'active',
                        ]);
                    }
                }
            }
        }

        return 'stored!';
    }
}
