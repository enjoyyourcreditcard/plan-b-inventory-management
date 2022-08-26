<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoryPrice;
use App\Services\HistoryPriceService;
use Illuminate\Support\Facades\Validator;

class HistoryPriceController extends Controller
{ 
    public function __construct(HistoryPriceService $historypriceService)
    {
        $this->historypriceService = $historypriceService;
    }
    
    public function index($id)
    {
        $history_prices = $this->historypriceService->handleAllHistoryPrice();
        return view('part.detail', [
            'historyprices' => $history_prices,
            'part_id' => $id
        ]);
    }

    public function store(Request $request)
    {
        $this->historypriceService->handleStoreHistoryPrice($request);
        return redirect('/detail/part')->with('success', 'Save data price!');
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
