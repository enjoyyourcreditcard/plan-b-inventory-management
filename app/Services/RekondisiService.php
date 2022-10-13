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
        $rekondisis = $this->requestStock->with('part')->where('condition', 'not good')->orWhere('condition', 'replace')->get();
        return($rekondisis);
    }

    public function handlePostNewCodition(Request $request)
    {
        $validatedData = $request->validate([
            'condition' => 'required'
        ]);
        $data = $this->stock->create($validatedData);


        return ($data);
    }
}
