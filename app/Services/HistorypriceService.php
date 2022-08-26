<?php

namespace App\Services;

use App\Models\HistoryPrice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HistoryPriceService
{

    public function __construct(HistoryPrice $historyprice)
    {
        $this->historyprice = $historyprice;
    }
    
    public function handleAllHistoryPrice()
    {
        $history_prices = $this->historyprice->latest()->paginate(5);
        return($history_prices);
    }

    public function handleStoreHistoryPrice(Request $request)
    {
        $validatedData = $request->validate([ 
            // 'part_id' => 'required|unique:history_prices|max:11',
            'price' => 'required', 
        ]);

        $history_price = $this->historyprice->create($validatedData);
        return($history_price);
    }

}
