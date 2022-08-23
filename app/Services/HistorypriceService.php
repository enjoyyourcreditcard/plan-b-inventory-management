<?php

namespace App\Services;

use App\Models\HistoryPrice;
use Illuminate\Http\Request;
// use App\Services\HistoryPriceController;
use Illuminate\Support\Facades\Validator;

class HistoryPriceService
{

    public function __construct(HistoryPrice $historyprice)
    {
        $this->historyprice = $historyprice;
    }
    
    public function handleIndex()
    {
        $history_prices = $this->historyprice->latest()->get();
        // dd($historyprices);

        // return view('part.detail', [
        //     'historyprices' => $historyprices
        // ]);

        return($history_prices);
    }

    public function handleStore(Request $request)
    {
        $this->historyprice->create($request->all());
        return redirect('/detail/part');
    }

}
