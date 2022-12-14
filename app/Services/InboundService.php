<?php

namespace App\Services;

use App\Exports\InboundExport;
use App\Models\Inbound;
use App\Models\Irf;
use App\Models\Part;
use App\Models\Stock;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class InboundService
{

    public function __construct(Inbound $inbound, Stock $stock, Part $part, Irf $irf)
    {
        $this->stock = $stock;
        $this->irf = $irf;
        $this->part = $part;
        $this->inbound = $inbound;
    }

    /*
    *|--------------------------------------------------------------------------
    *| show all inbound
    *|--------------------------------------------------------------------------
    */
    public function handleAllInbound()
    {
        return $this->inbound->with('part', 'warehouse', 'irf')->orderBy('id', 'DESC')->get();
    }

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
        $datas           = $this->orderInbound->with('grfInbound', 'inbound.part')->where('grf_inbound_id', $id)->get()->groupBy('part_id');
        $collect         = collect([]);
        $inputedQuantity = collect([]);

        foreach ($datas as $key => $data) {
            $inputedQuantity = count($data->where('inbound_id', '!=', null)); 

            $collect->push([
                'part_name'         => $data[0]->part->name,
                'uom'               => $data[0]->part->uom,
                'part_id'           => $data[0]->part->id,
                'quantity'          => $data[0]->part->sn_status == 'SN' || $data[0]->part->sn_status == 'sn' ? count($data) : $data[0]->quantity,
                'inputed_quantity'  => $data[0]->part->sn_status == 'SN' || $data[0]->part->sn_status == 'sn' ? $inputedQuantity : ($data[0]->inbound_id == null ? 0 : $data[0]->quantity),
                'is_sn'             => $data[0]->part->sn_status == 'SN' || $data[0]->part->sn_status == 'sn' ? true : false,
            ]);
        }
        
        return $collect;
    }

    public function handleGetIrfRecipient($id)
    {
        $data = $this->irf->with('warehouse')->where([['status', '!=', 'closed'], ['warehouse_id', $id]])->get();
        return $data;
    }

    public function handleShowIrfRecipient($id)
    {
        $data = $this->irf->with('warehouse', 'inbounds')->where('irf_code', str_replace('~', '/', $id))->first();
        return $data;
    }

    public function handleShowOrderInboundRecipient($id)
    {
        $irf      = $this->irf->with('inbounds.inboundStocks', 'inbounds.part')->find($id);
        $inbounds = $irf->inbounds;
        $collect  = collect([]);

        for ($i = 0; $i < $inbounds->count(); $i++ ) {
            $inbound         = $inbounds[$i];
            $isSn            = $inbound->part->sn_status == 'SN' || $inbound->part->sn_status == 'sn' ? true : false;
            $inputedQuantity = $isSn ? $inbound->inboundStocks->count() : ($inbound->inboundStocks->count() ? $inbound->inboundStocks->first()->quantity : 0);
            $isInputed       = $isSn ? ($inputedQuantity == $inbound->quantity ? true : false) : ($inputedQuantity == $inbound->quantity ? true : false);

            $collect->push([
                'inbound_id'       => $inbound->id,
                'part_id'          => $inbound->part_id,
                'part_name'        => $inbound->part->name,
                'brand_name'       => $inbound->brand,
                'sn_status'        => $inbound->part->sn_status,
                'quantity'         => $inbound->quantity,
                'uom'              => $inbound->part->uom,
                'inputed_quantity' => $inputedQuantity,
                'is_inputed'       => $isInputed,
                'is_sn'            => $isSn,
            ]);
        }

        return $collect;
    }
}