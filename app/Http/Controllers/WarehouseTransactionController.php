<?php

namespace App\Http\Controllers;

use App\Models\WhApproval;
use Illuminate\Http\Request;
use App\Services\PartService;
use App\Services\BrandService;
use App\Services\WarehouseService;
use App\Services\RequestFormService;
use App\Services\TransactionService;
use App\Services\WarehouseTransactionService;

class WarehouseTransactionController extends Controller
{

    public function __construct(WarehouseTransactionService $warehouseTransactionService,TransactionService $transactionService, WarehouseService $warehouseService, RequestFormService $requestFormService, PartService $partService, BrandService $brandService)
    {
        $this->warehouseTransactionService = $warehouseTransactionService;
        $this->warehouseService = $warehouseService;
        $this->transactionService = $transactionService;
        $this->requestFormService = $requestFormService;
        $this->partService = $partService; 
        $this->brandService = $brandService; 
    }

    public function index() {
        $whapproval = $this->warehouseTransactionService->handleAllWhApproval();
        return view('warehouse.home', [
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
        return view('approval.check_whapproval', compact('whapprov'));
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

    /*
    *|--------------------------------------------------------------------------
    *| Index WH Transfer
    *|--------------------------------------------------------------------------
    */
    public function indexTransfer () {
        // Services
        $requestForms = $this->requestFormService->handleGetByUserRequestForm();
        $grf_code = $this->warehouseTransactionService->handleGenerateGrfCode();
        
        // Return View
        return view('warehouse.transfer', [
            'requestForms' => $requestForms,
            'grf_code' => $grf_code
        ]);
    }

    /*
    *|--------------------------------------------------------------------------
    *| Store GRF WH Transfer
    *|--------------------------------------------------------------------------
    */
    public function storeGrfTransfer (Request $request) {
        // Services
        $this->requestFormService->handleStoreGrf($request);
        
        // Return View
        return redirect('/warehouse-transfer/' . str_replace('/', '~', strtolower($request->grf_code)));
    }

    /*
    *|--------------------------------------------------------------------------
    *| Store Item Transfer
    *|--------------------------------------------------------------------------
    */
    public function storeTransfer (Request $request, $id) {
        // Services
        $this->warehouseTransactionService->handleStoreWarehouseForm($request, $id);

        // Return View
        return redirect()->back();
    }

    /*
    *|--------------------------------------------------------------------------
    *| Update Ready Transfer
    *|--------------------------------------------------------------------------
    */
    public function updateTransfer (Request $request) {
        // Services
        $this->warehouseTransactionService->handleUpdateWarehouseTransfer($request);

        // Return View
        return redirect()->back();
    }

    /*
    *|--------------------------------------------------------------------------
    *| Displaying Warehouse Transfer
    *|--------------------------------------------------------------------------
    */
    public function createTransfer ($code) {
        // Services
        $warehouses = $this->warehouseService->handleAllWareHouse();
        $parts = $this->partService->handleAllPart();
        $grf = $this->requestFormService->handleGetCurrentGrf($code);
        $transferForms = $this->warehouseTransactionService->handleTransferFormPerGrf($code);
        $brands = $this->brandService->handleGetAllBrand();

        // Return View
        return view('warehouse.create', [
            'warehouses' => $warehouses,
            'parts' => $parts,
            'grf' => $grf,
            'transferForms' => $transferForms,
            'brands' => $brands,
        ]);
    }

    /*
    *|--------------------------------------------------------------------------
    *| Delete Item Transfer
    *|--------------------------------------------------------------------------
    */
    public function deleteTransfer ($id) {
        // Services
        $this->warehouseTransactionService->handleDeleteTransferForm($id);

        // Return View
        return redirect()->back();
    }

    /*
    *|--------------------------------------------------------------------------
    *| Store Pieces Transfer
    *|--------------------------------------------------------------------------
    */
    public function storePiecesTransfer (Request $request, $id) {
        // Services
        $this->warehouseTransactionService->handleStorePiecesTransfer($request, $id);

        // Return View
        return redirect()->back();
    }

    /*
    *|--------------------------------------------------------------------------
    *| Store Bulk Transfer
    *|--------------------------------------------------------------------------
    */
    public function storeBulkTransfer (Request $request, $id) {
        // Services
        $this->warehouseTransactionService->handleStoreBulkTransfer($request, $id);

        // Return View
        return redirect()->back();
    }
}
