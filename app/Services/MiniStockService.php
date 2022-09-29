<?php

namespace App\Services;

use App\Models\Grf;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MiniStockService
{
    public function __construct (Stock $stock, Grf $grf)
    {
        $this->stock = $stock;
        $this->grf = $grf;
    }

    /*
    |--------------------------------------------------------------------------
    | Mini Stock per GRF
    |--------------------------------------------------------------------------
    */
    public function handleShowMiniStock ($code)
    {
        $grf_code = str_replace('~', '/', strtoupper($code));
        $miniStocks = $this->stock->with('grf', 'part', 'part.requestForms.grf')->whereHas('grf', function ($query) use ($grf_code) {
            $query->where('grf_code', $grf_code);
        })->get();

        return $miniStocks;
    }

    /*
    |--------------------------------------------------------------------------
    | Mini Stock per User
    |--------------------------------------------------------------------------
    */
    public function handleMiniStockByUser ()
    {
        $grfs = $this->grf->with('stocks')->where([['user_id', Auth::user()->id], ['status', '!=', 'draft'], ['surat_jalan', '!=', null]])->get();
        $stocks = [];
        foreach ($grfs as $grf) {
            $stocks[$grf->grf_code] = $grf->stocks->where('grf_id', '!=', null);
        }

        return $stocks;
    }

    /*
    |--------------------------------------------------------------------------
    | Submit Return Stock
    |--------------------------------------------------------------------------
    */
    public function handleUpdateReturnStock ($request, $code)
    {
        $grf_code = str_replace('~', '/', strtoupper($code));
        $miniStocks = $this->stock->with('grf')->whereHas('grf', function ($query) use ($grf_code) {
            $query->where('grf_code', $grf_code);
        })->get();

        dd($request);

        foreach ($request->old_sn_code as $key => $old_sn_code) {
            $miniStock = $miniStocks->where('sn_code', $old_sn_code)->first();

            if ($request->condition[$key] != null) {
                $data = $miniStock->update([
                    'condition' => $request->condition[$key],
                ]);
            }

            // if ($request->note[$key] != null) {
            //     $miniStock->update([
            //       'note'
            //     ]);
            // }
        }

        dd('');
    }
}
