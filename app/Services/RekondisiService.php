<?php

namespace App\Services;

use App\Models\Part;
use App\Models\Stock;
use App\Models\Rekondisi;
use App\Models\Warehouse;

use App\Models\RequestStock;
use Illuminate\Http\Request;

class RekondisiService
{

    public function __construct(Part $part, RequestStock $requestStock, Stock $stock)
    {
        $this->requestStock = $requestStock;
        $this->stock = $stock;
    }

    public function handleGetConditionRequestStock()
    {
        $rekondisis = $this->requestStock->with('part')->where('condition', 'not good')->orWhere('condition', 'replace')->orderBy('created_at','desc')->get();

        return($rekondisis);
    }

    public function handlePostStockNewCodition($request, $id)
    {

        $stock = $this->stock->where('sn_code', $id)->first()->update([
            'condition' => $request->condition,
                    
        ]);
        if ($stock = true) {
            $deactive = $this->requestStock->where('sn', $id)->create([
                'status' => $request->session()->flash('done'),
            ]);
        } else {
            $deactive = null;
        }
        dd($deactive);
        return ResponseJSON($stock, 200);

    }
}