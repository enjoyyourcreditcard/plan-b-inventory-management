<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoryPrice;
use App\Services\HistoryPriceService;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class HistoryPriceController extends Controller
{ 
    public function __construct(HistoryPriceService $historypriceService)
    {
        $this->historypriceService = $historypriceService;
    }
  

    public function store(Request $request)
    {
        $this->historypriceService->handleStoreHistoryPrice($request);
        // Redirect::to();
        return redirect(URL::previous() . "#tabs-hp")->with('success', 'Save data price!');
    }

    
    public function getAllHistoryPrice()
    {
        return ResponseJSON($this->historypriceService->handleAllHistoryPrice(), 200);
    }

    public function postStoreHistoryPrice(Request $request)
    {
        return ResponseJSON($this->historypriceService->handleStoreHistoryPrice($request), 200);
    }
}
