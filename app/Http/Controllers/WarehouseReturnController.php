<?php

namespace App\Http\Controllers;

use App\Imports\WarehouseReturn;
use App\Models\RequestStock;
use App\Services\RequestStockService;
use App\Services\TransactionService;
use App\Services\WarehouseReturnService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class WarehouseReturnController extends Controller
{
    public function __construct(RequestStockService $requestStockService, WarehouseReturnService $warehouseReturnService, TransactionService $transactionService)
    {
        $this->requestStockService = $requestStockService;
        $this->transactionService = $transactionService;
        $this->warehouseReturnService = $warehouseReturnService;
    }

    public function store(Request $request, $id){
        // dd($request);
        $this->warehouseReturnService->handleStoreWhReturn($request, $id);
        return redirect()->back();
    }

    public function updateImport(Request $request){
        $this->warehouseReturnService->hanldeImportWarehouseReturn($request);
        return redirect()->back();
    }

    public function postApproveReturnWH(Request $request)
    {
        $transactionService = $this->transactionService; 
        $this->warehouseReturnService->handlePostApproveReturnWH($request,$transactionService); 
        return redirect()->route('warehouse.get.request');
    }
}
