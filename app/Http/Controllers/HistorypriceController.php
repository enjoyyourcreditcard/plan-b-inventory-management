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
    
    public function index()
    {
        // return ResponseJSON($this->hpService->handleIndex(), 200);
        $history_price = $this->historypriceService->handleIndex();

        return ResponseJSON($history_price, 200);
    }

    public function store(Request $request)
    {
        return $this->historypriceService->handleStore($request);
    }
}
