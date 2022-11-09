<?php

namespace App\Http\Controllers;

use App\Services\NotificationService;
use App\Services\PartService;
use Illuminate\Http\Request;
use App\Services\StockService;
use App\Services\WarehouseService;

class StockController extends Controller
{
    public function __construct(StockService $stockService, WarehouseService $WarehouseService, PartService $partService, NotificationService $notificationService) {
        $this->stockService = $stockService;
        $this->WarehouseService = $WarehouseService;
        $this->partService = $partService;
        $this->notificationService = $notificationService;
        

    }

    public function index() {
        $stocks = $this->stockService->handleAllStock();
        $warehouse = $this->WarehouseService->handleAllWareHouse();
        $parts = $this->partService->handleAllPart();
        // $notifications =  $this->notificationService->handleAllNotification();

        // $is_sn = $part->sn_status == "sn";

        return view('stock.stock', [
            'stocks' => $stocks,
            'parts' => $parts,
            'warehouse' => $warehouse,
            // 'notifications' => $notifications,

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
