<?php

namespace App\Services;

use App\Models\Grf;
use App\Models\Stock;
use App\Models\Rekondisi;
use App\Models\RequestStock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MiniStockService
{
    public function __construct (Stock $stock, Grf $grf, RequestStock $requestStock)
    {
        $this->stock = $stock;
        $this->requestStock = $requestStock;
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
    public function handleUpdateReturnStock ($request, $code)
    {
        $grf = $this->grf->find($code);
        $grf->status = 'return';
        $grf->save();
        return "oke";

        // $grf_code = str_replace('~', '/', strtoupper($code));

        // return redirect('request-form');
        // $miniStocks = $this->stock->with('grf')->whereHas('grf', function ($query) use ($grf_code) {
        //     $query->where('grf_code', $grf_code);
        // })->get();

        // foreach ($request->old_sn_code as $key => $old_sn_code) {
        //     $miniStock = $miniStocks->where('sn_code', $old_sn_code)->first();

        //     if ($request->condition[$key] != null) {
        //         $data = $miniStock->update([
        //             'condition' => $request->condition[$key],
        //         ]);
        //     }

        //     if ($request->note[$key] != null) {
        //         $miniStock->update([
        //           'note'
        //         ]);
        //     }
        // }
    }
}



// $request_stock_id = $request->create('request_stock_id');
// $sn = $request->create('sn');
// $sn_return = $request->create('sn_return');
// $condition = $request->create('condition');

// $pushToRekondisi = $this->rekondisi
// ->when($request_stock_id, function ($query, $request_form_id){
//     return $query->where('request_stock_id', $request_stock_id);
// })
// ->when($sn, function ($query, $sn){
//     return $query->where('sn', $sn);
// })
// ->when($sn_return, function ($query, $sn_return){
//     return $query->where('sn_return', $sn_return);
// })
// ->when($condition, function ($query, $condition){
//     return $query->where('condition', $condition);
// })
// ->get();

// $pushTo = $this->grf->where('condition', 'not good')->orWhere('condition', 'replace')->$pushToRekondisi;
// $pushTo = $request->create([
//         'request_stock_id',
//         'sn',
//         'sn_return',
//         'condition',
//     ]);
    
//     $push = $this->rekondisi->create(request_form_id);
//     $condition = $this->grf->where('condition', 'not good')->orWhere('condition', 'replace')->get($id);