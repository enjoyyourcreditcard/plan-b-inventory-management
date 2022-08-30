<?php

namespace App\Services;

use App\Models\Stock;
use App\Models\Part;
use Illuminate\Http\Request;

class StockService
{

    public function __construct(Part $part, Stock $stock)
    {
        $this->stock = $stock;
        $this->part = $part;
    }

    public function handleAllStock()
    {
        $stocks = $this->stock->all();
        return($stocks);
    }

    public function handleShowStock($id)
    {
        $stocks = $this->stock->where('part_id', $id)->get();
        return($stocks);
    }

    public function handleStoreStock($request)
    {
        $validatedData = $request->validate([
            'part_id' => 'required',
            'wh_id' => 'required',
            'sn_code' => 'nullable',
            'condition' => '',
            'expired_date' => 'required',
            'stock_status' => '',
            'status' => '',
        ]);

        $validatedData['condition'] = "good new";
        $validatedData['stock_status'] = "in";
        $validatedData['status'] = "active";

        $this->stock->create($validatedData);

        return('Stock has been stored');
    }

    public function handleUpdateConditionStock($id, $request)
    {
        $validatedData = $request->validate([
            'condition' => 'required',
            'stock_status' => 'required',
            'status' => 'required',
        ]);

        $this->stock->update($validatedData);

        return('Stock has been stored');
    }

    public function handleDeleteStock($id)
    {
        $this->stock->destroy($id);

        return('Stock has been deleted');
    }

    public function handleAllStockApi(Request $request)
    {   
        $part_id = $request->input('part_id');
        $wh_id = $request->input('wh_id');
        $condition = $request->input('condition');
        $stock_status = $request->input('stock_status');
        $status = $request->input('status');
        $created_at = $request->input('created_at');

        $stocks = $this->stock
        ->when($part_id, function ($query, $part_id){
            return $query->where('part_id', $part_id);
        })
        ->when($wh_id, function ($query, $wh_id){
            return $query->where('wh_id', $wh_id);
        })
        ->when($condition, function ($query, $condition){
            return $query->where('condition', $condition);
        })
        ->when($stock_status, function ($query, $stock_status){
            return $query->where('stock_status', $stock_status);
        })
        ->when($status, function ($query, $status){
            return $query->where('status', $status);
        })
        ->when($created_at, function ($query, $created_at){
            return $query->where('created_at', $created_at);
        })
        ->get();

        return($stocks);
    }

    public function handleStoreStockApi(Request $request)
    {
        $validatedData = $request->validate([
            'part_id' => 'required',
            'wh_id' => 'required',
            'sn_code' => 'required',
            'condition' => 'required',
            'expired_date' => 'required',
            'stock_status' => 'required',
            'status' => 'required',
        ]);

        $this->stock->create($validatedData);
        return ('Data has been stored');
    }

    
    public function handleUpdateStockApi(Request $request, $id)
    {
        $this->stock->find($id)->update([
            'condition' => $request->condition,
            'stock_status' => $request->stock_status,
        ]);
        return ('Data has been updated');
    }

    public function handleDeleteStockApi($id)
    {
        $this->stock->find($id)->delete();        
        return ('Data has been delete');
    }
}
