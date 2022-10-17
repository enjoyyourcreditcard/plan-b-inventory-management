<?php

namespace App\Services;

use App\Models\Historyprice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HistorypriceService
{

    public function __construct(Historyprice $Historyprice)
    {
        $this->Historyprice = $Historyprice;
    }

    public function handleAllHistoryprice()
    {
        $history_prices = $this->Historyprice->latest()->paginate(5);
        return ($history_prices);
    }


    public function handleGetHistorypriceByPartId($part_id)
    {
        $history_prices = $this->Historyprice->where('part_id',$part_id)->paginate(5);
        return ($history_prices);
    }
    
    public function handleStoreHistoryprice(Request $request)
    {
        $validatedData = $request->validate([
            'part_id' => 'required',
            'price' => 'required',

        ]);

        $history_price = $this->Historyprice->create($validatedData);
        return ($history_price);
    }
}
