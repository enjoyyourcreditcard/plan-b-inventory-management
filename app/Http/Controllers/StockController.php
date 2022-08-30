<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\StockService;

class StockController extends Controller
{
    public function __construct(StockService $stockService) {
        $this->stockService = $stockService;
    }

    public function index() {
        $stocks = $this->stockService->handleAllStock();
        return view('stock.stock', [
            'stocks' => $stocks
        ]);
    }

    public function store(Request $request) {
        $this->stockService->handleStoreStock($request);
        return back();
    }

    public function updateCondition($id, Request $request) {
        //
    }

    public function destroy($id) {
        $this->stockService->handleDeleteStock($id);
        return back();
    }

    public function getAllStock(Request $request)
    {
        return ResponseJSON($this->stockService->handleAllStockApi($request), 200);
    }

    public function postStoreStock(Request $request)
    {
        return ResponseJSON($this->stockService->handleStoreStockApi($request), 200);
    }

    public function putUpdateStock(Request $request, $id)
    {
        return ResponseJSON($this->stockService->handleUpdateStockApi($request, $id), 200);
    }

    public function getDeleteStock($id)
    {
        return ResponseJSON($this->stockService->handleDeleteStockApi($id), 200);
    }
}
