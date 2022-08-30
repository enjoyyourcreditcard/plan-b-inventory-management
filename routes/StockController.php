<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Services\StockService;
use Illuminate\Support\Facades\Validator;

class StockController extends Controller
{
    public function __construct(StockService $stockService)
    {
        $this->stockService = $stockService;
    }

    public function getAllStock()
    {
        return ResponseJSON($this->stockService->handleAllStockApi(), 200);
    }

    public function postStoreStock(Request $request)
    {
        return ResponseJSON($this->stockService->handleStoreStock($request), 200);
    }

    public function putUpdateStock(Request $request, $id)
    {
        return ResponseJSON($this->stockService->handleUpdateStock($request, $id), 200);
    }

    public function getDeleteStock($id)
    {
        return ResponseJSON($this->stockService->handleDeleteStock($id), 200);
    }

}
