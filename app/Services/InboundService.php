<?php

namespace App\Services;

use App\Models\Stock;
use App\Models\Inbound;
// use App\Models\Part;
// use App\Models\Warehouse;

use Illuminate\Http\Request;
use App\Exports\InboundExport;
use Maatwebsite\Excel\Facades\Excel;

class InboundService
{

    public function __construct(Inbound $inbound, Stock $stock)
    {
        $this->stock = $stock;
        // $this->part = $part;
        $this->inbound = $inbound;
    }

        /*
    *|--------------------------------------------------------------------------
    *| show all inbound
    *|--------------------------------------------------------------------------
    */

    public function handleAllInbound()
    {
        $groupByPartIds = $this->inbound->with('part')->get()->groupBy('part_id');

        if( count($groupByPartIds = $this->inbound->with('part')->get()->groupBy('part_id')) ) {
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
            'part_id' => 'required',
            'warehouse_id' => 'required',
            'sn_code' => '',
            'orafin_code' => '',
            'condition' => 'reuired',
            'expired_date' => 'required',
            'stock_status' => 'required',
            'status' => 'required',
        ]);

        $this->inbound->create($validatedData);
        return ('Data has been stored');
    }

    
    public function handleUpdateInboundApi(Request $request, $id)
    {
        $this->inbound->find($id)->update([
            // 'condition' => $request->condition,
            // 'stock_status' => $request->stock_status,
        ]);
        return ('Data has been updated');
    }

    public function handleDeleteInboundApi($id)
    {
        $this->inbound->find($id)->delete();        
        return ('Data has been delete');
    }
}