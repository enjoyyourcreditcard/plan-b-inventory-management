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
        return ($history_prices);
    }


    public function handleGetHistoryPriceByPartId($part_id)
    {
        $history_prices = $this->historyprice->where('part_id',$part_id)->paginate(5);
        return ($history_prices);
    }
    
    public function handleStoreHistoryPrice(Request $request)
    {
        $validatedData = $request->validate([
            'part_id' => 'required',
            'price' => 'required',

        ]);

        $history_price = $this->historyprice->create($validatedData);
        return ($history_price);
    }
}
