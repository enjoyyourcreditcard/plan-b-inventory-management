<?php

namespace App\Http\Controllers;

use App\Models\RequestStock;
use App\Models\WhApproval;
use Illuminate\Http\Request;
use App\Services\PartService;
use App\Services\BrandService;
use App\Services\WarehouseService;
use App\Services\RequestFormService;
use App\Services\RequestStockService;
use App\Services\TransactionService;
use App\Services\WarehouseTransactionService;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\WarehouseImport;
use Illuminate\Support\Facades\Auth;
// use Excel;

class WarehouseTransactionController extends Controller
{

    public function __construct(RequestStockService $requestStockService, WarehouseTransactionService $warehouseTransactionService,TransactionService $transactionService, WarehouseService $warehouseService, RequestFormService $requestFormService, PartService $partService, BrandService $brandService)
    {
        $this->warehouseTransactionService = $warehouseTransactionService;
        $this->warehouseService = $warehouseService;
        $this->transactionService = $transactionService;
        $this->requestFormService = $requestFormService;
        $this->requestStockService = $requestStockService;
        $this->partService = $partService; 
        $this->brandService = $brandService; 
    }

        /*
        *|--------------------------------------------------------------------------
        *| Index Warehouse Approv Dan Return
        *|--------------------------------------------------------------------------
        */
    public function index() {
        /*
        *|--------------------------------------------------------------------------
        *| Get Data Untuk Warehouse Approv
        *|--------------------------------------------------------------------------
        */
        $whapproval = $this->warehouseTransactionService->handleAllWhApproval();
        return view('warehouse.home', [
            'whapproval' => $whapproval
        ]);
    }

    public function indexReturn(){
        /*
        *|--------------------------------------------------------------------------
        *| Get Data Untuk Warehouse Return
        *|--------------------------------------------------------------------------
        */
        $whreturn = $this->warehouseTransactionService->handleAllWhReturn();
        // dd($whreturn);
        return view('warehouse.homeReturn', [
            'whreturn' => $whreturn
        ]);
    }

    /*
    *|--------------------------------------------------------------------------
    *| Function untuk get data di dashboard
    *|--------------------------------------------------------------------------
    */
    public function dashboard(){
        /*
        *|--------------------------------------------------------------------------
        *| Get Data Untuk Warehouse Approv
        *|--------------------------------------------------------------------------
        */
        $whapproval = $this->warehouseTransactionService->handleAllWhApproval();
        /*
        *|--------------------------------------------------------------------------
        *| Get Data Untuk Warehouse Return
        *|--------------------------------------------------------------------------
        */
        $whreturn = $this->warehouseTransactionService->handleAllWhReturn();
        // dd($whreturn);
        return view('warehouse.dashboardWh', [
            'whreturn' => $whreturn,
            'whapproval' => $whapproval,
        ]);
    }

    public function getAllWarehouseApproval()
    {
        return ResponseJSON($this->warehouseTransactionService->handleAllWhApproval(), 200);
    }

    /*
    *|--------------------------------------------------------------------------
    *| Show Data Warehouse Approv
    *|--------------------------------------------------------------------------
    */
    public function show($id) {
        $whapprov = $this->warehouseTransactionService->handleShowWhApproval($id);
        $requestForm = $this->requestStockService->handleRequestStockByRequestForms($whapprov->requestForms);
        return view('warehouse.check_whapproval', compact('whapprov','requestForm'));
    }

    /*
    *|--------------------------------------------------------------------------
    *| Show Data Return Warehouse
    *|--------------------------------------------------------------------------
    */
    public function showReturn($id) {
        $whreturn = $this->warehouseTransactionService->handleShowWhReturn($id);
        $requestForm = $this->requestStockService->handleRequestStockByRequestForms($whreturn->requestForms);
        return view('warehouse.warehouse_return', compact('whreturn','requestForm'));
    }

    public function store(Request $request){
        $this->warehouseTransactionService->handleStoreWhApproval($request);
        return redirect()->back();
    }

    public function postApproveWH(Request $request)
    {
        $transactionService = $this->transactionService; 
        $this->warehouseTransactionService->handlePostApproveWH($request,$transactionService); 
        return redirect()->route('warehouse.get.home');
    }

    /*
    *|--------------------------------------------------------------------------
    *| Import Bulk Warehouse Approv
    *|--------------------------------------------------------------------------
    */
    public function updateImport(Request $request){
        $excel = [];

        $file = $request->file;

        $excel = Excel::toArray(new WarehouseImport, $file);
        // dd($excel);
        foreach ($excel[0] as $row) {
            RequestStock::create([
                'request_form_id' => $request->request_form_id,
                'grf_id' => $request->grf_id,
                'part_id' => $request->part_id,
                'sn' => $row[0],
                'sn_return' => null,
                'remarks' => null,
            ]);
        }
        return redirect()->back();
        }

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
