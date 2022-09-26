<?php

namespace App\Http\Controllers;

use App\Models\WhApproval;
use App\Services\TransactionService;
use App\Services\WarehouseTransactionService;
use Illuminate\Http\Request;

class WarehouseTransactionController extends Controller
{

    public function __construct(WarehouseTransactionService $warehouseTransactionService,TransactionService $transactionService)
    {
        $this->warehouseTransactionService = $warehouseTransactionService;
        $this->transactionService = $transactionService;
    }

    public function index() {
        $whapproval = $this->warehouseTransactionService->handleAllWhApproval();
        return view('transaction.warehouse.home', [
            'whapproval' => $whapproval,
        ]);
    }

    public function getAllWarehouseApproval()
    {
        return ResponseJSON($this->warehouseTransactionService->handleAllWhApproval(), 200);
    }

    public function show($id) {
        $whapprov = $this->warehouseTransactionService->handleShowWhApproval($id);
        // dd($whapprov);
        return view('transaction.warehouse.check_whapproval', compact('whapprov'));
    }

    public function postApproveWH(Request $request)
    {
        $transactionService = $this->transactionService; 
        $this->warehouseTransactionService->handlePostApproveWH($request,$transactionService); 
        return redirect()->back();
    }

    // public function update(Request $request, $id){
    //     $whapprov = $this->warehouseService->handleUpdateWareHouse($request, $id);
    //     return view('approval.check_whapproval');
    // }

    // public function update(Request $request) {
    //     $whapprov = $this->WarehouseTransactionService->handleUpdateWhApproval($request);
    //     return view('approval.check_whapproval', compact('whapprov'));
    // }

}
