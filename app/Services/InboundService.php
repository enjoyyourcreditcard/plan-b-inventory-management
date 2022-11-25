<?php

namespace App\Services;

// use App\Models\Part;
// use App\Models\Warehouse;
use App\Models\Stock;
use App\Models\Inbound;
use App\Models\GrfInbound;
use App\Models\OrderInbound;
use Illuminate\Http\Request;
use App\Exports\InboundExport;
use Maatwebsite\Excel\Facades\Excel;

class InboundService
{

    public function __construct(Inbound $inbound, Stock $stock, GrfInbound $grfInbound, OrderInbound $orderInbound)
    {
        $this->stock = $stock;
        $this->inbound = $inbound;
        $this->grfInbound = $grfInbound;
        $this->orderInbound = $orderInbound;
    }

        /*
    *|--------------------------------------------------------------------------
    *| show all inbound
    *|--------------------------------------------------------------------------
    */

    public function handleAllInbound()
    {
        $groupByPartIds = $this->inbound->with('part')->where('status', 'active')->get()->groupBy('part_id');

        if( count($groupByPartIds) ) {
            foreach ($groupByPartIds as $key => $groupByPartId) {
                $distinct[] = collect([
                    'id' =>$groupByPartId->first()->id, 
                    'part' => $groupByPartId->first()->part->name,
                    'segment' => $groupByPartId->first()->part->segment->name,
                    'quantity' => $groupByPartId->count(),
                ]);
            }
        }else{
            $distinct = [];
        }

        

        return ($distinct);
    }

    // public function handleStoreInbound($request)
    // {
    //     $validatedData = $request->validate([
    //         'part_id' => 'required',
    //         'sn_code' => 'required',
    //         'condition' => 'required',
    //         // 'inbound_status' => 'required',
    //     ]);

    //     $this->inbound->create($validatedData);
        

    //     return('Inbound has been stored');
    // }

    // public function handleUpdateInbound( $request)
    // {
    //     $inbound = $this->inbound->find($request->id);
    //     $validatedData = $request->validate([
    //         'condition' => 'required',
    //         // 'inbound_status' => 'required',
    //     ]);

    //     $inbound->update($validatedData);

    //     return('Inbound has been stored');
    // }

    // public function handleDeleteInbound($id)
    // {
    //     $this->inbound->destroy($id);

    //     return('Inbound has been deleted');
    // }

    // public function handleUpInbound($id)
    // {
    //     $data = $this->inbound->where('id', $id)->first();
    //     $dataArray = $data->toArray();
    //     unset($dataArray['id'],$dataArray['created_at'],$dataArray['updated_at']);
        
        
    //     $this->stock->create($dataArray);
    //     // dd($data);
    // }

    public function handleAllDeleteInbound(Request $request)
    {
        if (isset($request['id']) == true) {
            foreach ($request['id'] as $id) {
                $this->inbound->find($id)->delete();
            }
            return('Inbound stored!');
        }else{
            return('No inbound');
        }
        // $this->inbound->where('id', $request->input('ids'))->delete();
        return('Inbound has been deleted');
    }
    
    // public function handleAllUpInbound(Request $request)
    // {
    //     if (isset($request['id']) == true) {
    //         foreach ($request['id'] as $id) {
    //             $inbound = $this->inbound->find($id);
    //             $data = $inbound->toArray();
    //             unset($data['id'],$data['created_at'],$data['updated_at']);
    //             $this->stock->create($data);
    //         }
    //         return('Inbound stored!');
    //     }else{
    //         return('No inbound');
    //     }
    // }

    

    public function handleAllInboundApi(Request $request)
    {   
        $part_id = $request->input('part_id');
        $warehouse_id = $request->input('warehouse_id');
        $condition = $request->input('condition');
        $stock_status = $request->input('stock_status');
        $status = $request->input('status');
        $expired_date = $request->input('expired_date');

        $inbound = $this->inbound
        ->when($part_id, function ($query, $part_id){
            return $query->where('part_id', $part_id);
        })
        ->when($warehouse_id, function ($query, $warehouse_id){
            return $query->where('warehouse_id', $warehouse_id);
        })
        ->when($condition, function ($query, $condition){
            return $query->where('condition', $condition);
        })
        ->when($stock_status, function ($query, $stock_status){
            return $query->where('stock_status', $stock_status);
        })
        ->when($expired_date, function ($query, $expired_date){
            return $query->where('expired_date', $expired_date);
        })
        ->when($status, function ($query, $status){
            return $query->where('status', $status);
        })->get();

        return($inbound);
    }

    public function handleStoreInboundApi(Request $request)
    {
        $validatedData = $request->validate([
            'part_id'       => 'required',
            'warehouse_id'  => 'required',
            'sn_code'       => '',
            'orafin_code'   => '',
            'condition'     => 'reuired',
            'expired_date'  => 'required',
            'stock_status'  => 'required',
            'status'        => 'required',
        ]);

        $this->inbound->create($validatedData);
        return ('Data has been stored');
    }

    public function handleDeleteInboundApi($id)
    {
        $this->inbound->find($id)->delete();        
        return ('Data has been delete');
    }

    public function handleGetGrfInboundGiver($id)
    {
        $data = $this->grfInbound->with('user', 'warehouse')->where([['status', '!=', 'closed'], ['warehouse_id', $id]])->get();
        return $data;
    }

    public function handleShowGrfInboundGiver($id)
    {
        $data = $this->grfInbound->with('warehouse', 'inboundForms.inbound')->find($id);
        return $data;
    }

    public function handleShowOrderInboundGiver($id)
    {
        $datas           = $this->orderInbound->with('grfInbound', 'inbound.part')->where('grf_inbound_id', $id)->get()->groupBy('part_name');
        $collect         = collect([]);
        $inputedQuantity = collect([]);

        foreach ($datas as $key => $data) {
            $inputedQuantity = count($data->where('inbound_id', '!=', null)); 

            $collect->push([
                'part_name'         => $key,
                'quantity'          => count($data),
                'inputed_quantity'  => $inputedQuantity,
            ]);
        }
        
        return $collect;
    }

    public function handleGetGrfInboundRecipient($id)
    {
        $data = $this->grfInbound->with('user', 'warehouse')->where([['status', '!=', 'closed'], ['status', '!=', 'submited'], ['warehouse_destination', $id]])->get();
        return $data;
    }

    public function handleShowGrfInboundRecipient($id)
    {
        $data = $this->grfInbound->with('warehouse', 'inboundForms.inbound')->find($id);
        return $data;
    }

    public function handleShowOrderInboundRecipient($id)
    {
        $datas           = $this->orderInbound->with('grfInbound', 'inbound.part')->where('grf_inbound_id', $id)->get()->groupBy('part_name');
        $collect         = collect([]);
        $inputedQuantity = collect([]);

        foreach ($datas as $key => $data) {
            $inputedQuantity = count($data->where('received_sn_code', '!=', null)); 

            $collect->push([
                'part_name'         => $key,
                'quantity'          => count($data),
                'inputed_quantity'  => $inputedQuantity,
            ]);
        }
        
        return $collect;
    }
}