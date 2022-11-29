<?php 
namespace App\Services;

use Carbon\Carbon;
use App\Models\Part;
use App\Models\Stock;
use App\Models\Inbound;
use App\Models\Timeline;
use App\Models\Warehouse;
use App\Models\GrfInbound;
use Illuminate\Support\Arr;
use App\Models\OrderInbound;
use Illuminate\Http\Request;
use App\Imports\InboundImport;
use Illuminate\Validation\Rule;
use App\Imports\WarehouseImport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\WarehouseTransferImport;
use Illuminate\Support\Facades\Validator;
use Psy\Readline\Hoa\Console;

class OrderInboundService
{

    public function __construct(Inbound $Inbound, OrderInbound $orderInbound, GrfInbound $grfInbound, Part $part, Warehouse $warehouse, Timeline $timeline, Stock $stock)
    {
        $this->grfInbound   = $grfInbound;
        $this->inbound      = $Inbound;
        $this->orderInbound = $orderInbound;
        $this->part         = $part;
        $this->timeline     = $timeline;
        $this->warehouse    = $warehouse;
        $this->stock    = $stock;
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
    *| Store a new GRF
    *|--------------------------------------------------------------------------
    */
    public function handleGenerateInboundGrfCode()
    {
        // $warehouse   = $this->inboundGrf->find($id, 'warehouse_id');
        $inboundGrfs = count($this->grfInbound->where('user_id', '=', Auth::user()->id)->get());
        $grfs        = count($this->grfInbound->where([['user_id', '=', Auth::user()->id], ['status', '!=', 'closed'],])->get());

        if ($grfs >= 0) {
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

            $attempt = $inboundGrfs + 1;
            $name    = str_replace(' ', '-', strtoupper(Auth::user()->name));
            $month   = $returnValue;
            $year    = now()->format('Y');

            if ($inboundGrfs > 0) {
                if ($inboundGrfs >= 9) {
                    $inbound_grf_code = '0' . $attempt . '/' . $name . '/' . 'Inbound' . '/' . $month . '/' . $year;
                } else {
                    $inbound_grf_code = '00' . $attempt . '/' . $name . '/' . 'Inbound' . '/' . $month . '/' . $year;
                }
            } else {
                $inbound_grf_code = '001' . '/' . $name . '/' . 'Inbound' . '/' . $month . '/' . $year;
            }
        } else {
            $inbound_grf_code = null;
        }

        return ($inbound_grf_code);
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
        
        for ($i = 0; $i < $validatedDatas['quantity']; $i++) {
            $this->orderInbound->create([
                'grf_inbound_id' => $validatedDatas['grf_inbound_id'],
                'part_id'      => $validatedDatas['part_id'],
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
        $orderInbound = $this->orderInbound->with('inbound', 'warehouse')->where('grf_inbound_id', '=', $grf->id)->get()->groupby('part_name');
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
        // $inbounds = $this->inbound->where([['id', $request->inbound_id]])->with('orderInbound')->get();

        // $inbounds->map(function ($inbound) {
        //     $inbound['quantity_new'] = ($inbound->quantity);

        //     $inbound->orderInbound->map(function ($orderInbound) use ($inbound) {
        //         $this->inbound->find($orderInbound->inbound_id)->update([
        //             'quantity' => $inbound['quantity_new'] += $orderInbound->quantity
        //         ]);
        //     });  
        // });

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
        $orafin_code  = [];
        $sn_code      = [];
        $brand      = [];
        $warehouse_id = $request->warehouse_id;
        // dd($excel);

        foreach ($excel->first() as $row) {
            try {
                $part_id[]      = $this->part->where('name', $row['part_id'])->where('brand_name',$row['brand'])->first()->id;    
                $orafin_code[]  = $this->part->where('name', $row['part_id'])->where('brand_name',$row['brand'])->first()->orafin_code;
                $brand[]  = $this->part->where('name', $row['part_id'])->where('brand_name',$row['brand'])->first()->brand->name;
                $sn_code[]      = $row['serial_number'];
            } catch (\Throwable $th) {
                continue;
                // dd($row['part_id'],$row['brand']);
                //throw $th;
            }
           

        }


        $request['part_id']      = $part_id;
        $request['orafin_code']  = $orafin_code;
        $request['sn_code']      = $sn_code;
        $request['brand']      = $brand;
        $request['warehouse_id'] = $warehouse_id;

        $validatedData = $request->validate([
            'part_id'      => 'required',
            'orafin_code'  => 'required',
            'brand'  => 'required',
            'sn_code.*'    => 'distinct',
            'sn_code'      => ['required', 'array', 'unique:stocks'],
            'warehouse_id' => 'required'
        ]);

        foreach ($validatedData['part_id'] as $key => $part_id) {
            $this->inbound->create([
                'part_id'      => $part_id,
                'orafin_code'  => $validatedData['orafin_code'][$key],
                'sn_code'      => $validatedData['sn_code'][$key],
                'brand'      => $validatedData['brand'][$key],
                'warehouse_id' => $validatedData['warehouse_id'],
                'stock_status' => 'in',
                'status'       => 'active',
            ]);
        }

        return ('stored');
    }

    /*
    *|--------------------------------------------------------------------------
    *| Store sn Inbound Giver
    *|--------------------------------------------------------------------------
    */
    public function handleStoreSnInboundGiverPieces($request, $id)
    {
        // dd($request->part_name);
        $validatedData = $request->validate([
            'sn_code.*' => ['distinct'],
            'sn_code'   => ['required', 'array', Rule::exists('inbounds')->where(function ($query) use ($request) {
                $query->where('part_id', $request->part_name);
            })]
        ]);

        $orderInbounds  = $this->orderInbound->where([['grf_inbound_id', $id], ['part_id', $request->part_name]])->get();
        $inboundBySn    = collect([]);

        for ($i = 0; $i < count($request->sn_code); $i++) {
            $inboundBySn->push($this->inbound->where([['sn_code', $request->sn_code[$i]], ['part_id', $request->part_name]])->first());
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
        $currentGrf = $this->grfInbound->find($id);
        $data       = $currentGrf->update([
            "grf_code"    => $grf_code,
            "surat_jalan" => $transactionService->handleGenerateSuratJalan(1),
            "status"      => "delivery_approved",
        ]);

        foreach ($currentGrf->inboundForms as $orderInbound) {
            $this->inbound->find($orderInbound->inbound_id)->update([
                'stock_status' => 'out',
            ]);
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
    *| Store sn Inbound Recipient
    *|--------------------------------------------------------------------------
    */
    public function handleStoreSnInboundRecipientPieces($request, $id)
    {
        $validatedData = $request->validate([
            'sn_code.*' => ['distinct'],
            'sn_code'   => ['required', 'array', Rule::exists('inbounds')->where(function ($query) use ($request) {
                $query->where('part_id', $request->part_name);
            })]
        ]);

        $orderInbounds  = $this->orderInbound->where([['grf_inbound_id', $id], ['part_id', $request->part_name]])->get();
        $inboundBySn    = collect([]);

        for ($i = 0; $i < count($orderInbounds); $i++) {
            $orderInbounds[$i]->update([
                'received_sn_code' => $validatedData['sn_code'][$i],
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

        for ($i = 0; $i < count($orderInbounds); $i++) {
            $orderInbounds[$i]->update([
                'received_sn_code' => $validatedData['sn_code'][$i],
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
        $currentGrf = $this->grfInbound->find($id);
        $data       = $currentGrf->update([
            "status" => "closed",
        ]);

        foreach ($currentGrf->inboundForms as $orderInbound) {
            $this->inbound->find($orderInbound->inbound_id)->update([
                'status' => 'inactive',
            ]);
        }

        $this->timeline->create([
            'grf_inbound_id' => $id,
            'status' => 'closed'
        ]);

        for ($i = 0; $i < count($currentGrf->inboundForms); $i++) {
            $orderInbounds = $currentGrf->inboundForms[$i];

            $this->stock->create([
                'part_id' => $orderInbounds->inbound->part_id,
                'warehouse_id' => $currentGrf->warehouse_id,
                'sn_code' => $orderInbounds->received_sn_code,
                'condition' => 'GOOD NEW',
                'expired_date' => now(),
                'stock_status' => 'in',
                'status' => 'active',
            ]);
        }

        return $data;
    }

    /*
    *|--------------------------------------------------------------------------
    *| Confirmation inbound giver
    *|--------------------------------------------------------------------------
    */
    public function handleConfirmationInboundGiver($currentGrf) {
        if (count($currentGrf->inboundForms) == count($currentGrf->inboundForms->where('inbound_id', '!=', null))) {
            return true;
        } else {
            return false;
        }
    }
    public function handleConfirmationInboundRecipient($currentGrf) {
        if (count($currentGrf->inboundForms) == count($currentGrf->inboundForms->where('received_sn_code', '!=', null))) {
            return true;
        } else {
            return false;
        }
    }
}
