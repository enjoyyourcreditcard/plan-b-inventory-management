<?php

namespace App\Services;

use App\Models\Grf;
use App\Models\Stock;
use App\Models\Timeline;
use App\Models\RequestStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MiniStockService
{
    public function __construct (Stock $stock, Grf $grf, RequestStock $requestStock, Timeline $timeline)
    {
        $this->stock = $stock;
        $this->requestStock = $requestStock;
        $this->grf = $grf;
        $this->timeline = $timeline;
    }

    /*
    |--------------------------------------------------------------------------
    | Mini Stock per GRF
    |--------------------------------------------------------------------------
    */
    public function handleShowMiniStock ($code)
    {
        $grf_code = str_replace('~', '/', strtoupper($code));
        
        $miniStocks = $this->requestStock->with('grf', 'part', 'requestForm', 'part.segment.category')->whereHas('grf', function ($query) use ($grf_code) {
            $query->where('grf_code', $grf_code);
        })->get();

        $miniStocks->map(function ($miniStock) {
            $miniStock['category'] = $miniStock->part->segment->category->name;
        });

        return $miniStocks;
    }

    /*
    |--------------------------------------------------------------------------
    | Mini Stock per User
    |--------------------------------------------------------------------------
    */
    public function handleMiniStockByUser ()
    {
        $miniStocks = $this->requestStock->with('grf', 'part', 'requestForm')->whereHas('grf', function ($query) {
            $query->where([['user_id', Auth::user()->id], ['status', '!=', 'draft'], ['surat_jalan', '!=', null]]);
        })->get();

        return $miniStocks;
    }

    /*
    |--------------------------------------------------------------------------
    | Submit Return Stock
    |--------------------------------------------------------------------------
    */
    public function handleUpdateReturnStock ($request, $id)
    {
        $miniStocks = $this->requestStock->where('grf_id', $id)->get();
        
        foreach ($request->old_sn_code as $key => $sn_code) {
            $miniStocks->where('sn', $sn_code)->first()->update([
                'condition' => $request['condition'][$key],
                'sn_return' => $request['sn_code'][$key],
                'remarks' => $request['remarks'][$key],
            ]);

            if ($request->isAjax != 'yep') {
                $this->stock->where('sn_code', $sn_code)->first()->update([
                    'condition' => $request['condition'][$key],
                ]);
            }
        }

        if ($request->isAjax != 'yep') {
            $this->grf->find($id)->update([
                'status' => 'return'
            ]);
    
            $this->timeline->create([
                'grf_id' => $id,
                'status' => 'return'
            ]);
        }


        return('Data stored!');
    }
}
