<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Part;
use App\Models\Inbound;
use App\Models\Timeline;
use App\Models\Warehouse;
use App\Models\GrfInbound;
use Illuminate\Support\Arr;
use App\Models\OrderInbound;
use Illuminate\Http\Request;
use App\Imports\InboundImport;
use App\Imports\WarehouseImport;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class OrderInboundService
{

    public function __construct(Inbound $Inbound, OrderInbound $orderInbound, GrfInbound $grfInbound, Part $part, Warehouse $warehouse, Timeline $timeline )
    {
        $this->inbound = $Inbound;
        $this->orderInbound = $orderInbound;
        $this->grfInbound = $grfInbound;
        $this->part = $part;
        $this->warehouse = $warehouse;
        $this->timeline = $timeline;
    }

    /*
    *|--------------------------------------------------------------------------
    *| Show Inbound Form
    *|--------------------------------------------------------------------------
    */

    public function handleShowInboundForm($code)
    {
        // dd($code);
        $inboundForms = $this->grfInbound->with('inboundForms.part')->where([['inbound_grf_code', '=', str_replace('~', '/', strtoupper($code))], ['status', '!=', 'closed']])->first();
        return ($inboundForms);
    }

    /*
    *|--------------------------------------------------------------------------
    *| Store a new GRF to GRF table
    *|--------------------------------------------------------------------------
    */
    public function handleStoreInboundGrf($request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'inbound_grf_code' => 'required',
            'warehouse_id' => 'nullable',
            'type' => 'nullable',
        ]);

        $validatedData['user_id'] = Auth::user()->id;

        $createdData = $this->grfInbound->create($validatedData);

        $timeLine = [
            "status" => "draft",
            "inbound_grf_id" => $createdData->id,
        ];

        $this->timeline->create($timeLine);

        
        return ('Data has been stored');
        
    }

    /*
    *|--------------------------------------------------------------------------
    *| Store a new GRF
    *|--------------------------------------------------------------------------
    */
    public function handleGenerateInboundGrfCode()
    {
        // $warehouse = $this->inboundGrf->find($id, 'warehouse_id');
        $inboundGrfs = count($this->grfInbound->where('user_id', '=', Auth::user()->id)->get());
        $grfs = count($this->grfInbound->where([['user_id', '=', Auth::user()->id], ['status', '!=', 'closed'],])->get());
        // dd($grfs);

        if ($grfs >= 0) {
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

            $attempt = $inboundGrfs + 1;
            $name = str_replace(' ', '-', strtoupper(Auth::user()->name));
            $month = $returnValue;
            $year = now()->format('Y');

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
        // dd($request);
        $validatedDatas = $request->validate([
            'inbound_id' => 'required',
            'warehouse_id' => 'required',
            'quantity' => 'required',
        ]);   
        $validatedDatas['grf_inbound_id'] = $id;
        
        $this->orderInbound->create([
                'grf_inbound_id' => $validatedDatas['grf_inbound_id'],
                'inbound_id' => $validatedDatas['inbound_id'],
                'warehouse_id' => $validatedDatas['warehouse_id'],
                'quantity' => $validatedDatas['quantity'],
                'created_at' => now(),
            ]);
        
        // $inbounds = $this->inbound->where([['id', $request->inbound_id]])->with('orderInbound')->get();
        // $inbounds->map(function ($inbound) use($request, $id) {
       
        //     $inbound['quantity_old'] = ($inbound->quantity);
        //     $this->inbound->find($request->inbound_id)->update([
        //         'quantity' => $inbound['quantity_old'] - $request->quantity,
        //     ]);
            
        // });


        
        return ('data stored');
    }

        /*
    *|--------------------------------------------------------------------------
    *| Show a requested item into the list 
    *|--------------------------------------------------------------------------
    */
    public function handleInboundMiniStock($code)
    {
        $orderInbound = $this->orderInbound->with('inbound', 'warehouse')->where('grf_inbound_id', '=', str_replace('~', '/', strtoupper($code)))->get();

        return ($orderInbound);
    }

        /*
    *|--------------------------------------------------------------------------
    *| Store a grf warehouse
    *|--------------------------------------------------------------------------
    */
    public function handleStoreWarehouse($request, $id)
    {

            $validatedWarehouse_id = $request->validate([
                'warehouse_id' => 'required',
            ]);
            
            $this->grfInbound->find($id)->update($validatedWarehouse_id);
    }

            /*
    *|--------------------------------------------------------------------------
    *| Delete a requested item in the list 
    *|--------------------------------------------------------------------------
    */
    public function handleDeleteOrderInbound($request, $id)
    {
        $inbounds = $this->inbound->where([['id', $request->inbound_id]])->with('orderInbound')->get();
        $inbounds->map(function ($inbound) {

            $inbound['quantity_new'] = ($inbound->quantity);

            $inbound->orderInbound->map(function ($orderInbound) use ($inbound) {
                $this->inbound->find($orderInbound->inbound_id)->update([
                    'quantity' => $inbound['quantity_new'] += $orderInbound->quantity
                ]);
            });  

        });

        $this->orderInbound->find($id)->delete();

        return ('data has been slain');
    }

        /*
    *|--------------------------------------------------------------------------
    *| Change the GRF status to submited
    *|--------------------------------------------------------------------------
    */
    public function handleUpdateRequestForm($request, $id)
    {
        // dd($id);
        $data = [
            "inbound_grf_id" => $id,
            "status" => "submited",
        ];

        $this->grfInbound->find($id)->update($data);

        $this->timeline->find($id)->update($data);

        return ('Data has been updated');
    }

    /*
    *|--------------------------------------------------------------------------
    *| Store inbound data from excel
    *|--------------------------------------------------------------------------
    */
    public function handleImportExcel($request)
    {
        $excel = Excel::toCollection(new InboundImport, $request->excel);

        $part_id = [];
        $orafin_code = [];
        $sn_code = [];

        foreach ($excel->first() as $row) {
            $part_id[] = $this->part->where('name', $row['part_id'])->first()->id;    
            $orafin_code[] = $this->part->where('name', $row['part_id'])->first()->orafin_code;
            $sn_code[] = $row['sn_code'];
        }

        $request['part_id'] = $part_id;
        $request['orafin_code'] = $orafin_code;
        $request['sn_code'] = $sn_code;

        $validatedData = $request->validate([
            'part_id' => 'required',
            'orafin_code' => 'required',
            'sn_code.*' => 'distinct',
            'sn_code' => ['required', 'array', 'unique:stocks'],
            // 'sn_code' => ['required', 'array', Rule::exists('stocks')],
        ]);

        foreach ($validatedData['part_id'] as $key => $part_id) {
            $this->inbound->create([
                'part_id' => $part_id,
                'orafin_code' => $validatedData['orafin_code'][$key],
                'sn_code' => $validatedData['sn_code'][$key],
                'stock_status' => 'in',
                'status' => 'active',
                'is_select' => 0,
            ]);
        }

        return ('easy no sweat');
        
    }

}
