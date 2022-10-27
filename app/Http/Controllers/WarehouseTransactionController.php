<?php

namespace App\Http\Controllers;

use App\Imports\WarehouseImport;
use App\Models\RequestStock;
use App\Models\WhApproval;
use App\Services\BrandService;
use App\Services\PartService;
use App\Services\RequestFormService;
use App\Services\RequestStockService;
use App\Services\TransactionService;
use App\Services\WarehouseService;
use App\Services\WarehouseTransactionService;
use Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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

    public function index() {
        // *: Get data untuk warehouse approv
        $whapproval = $this->warehouseTransactionService->handleAllWhApproval();
        // *: Get data untuk warehouse return
        $whreturn = $this->warehouseTransactionService->handleAllWhReturn();
        return view('warehouse.home', [
            'whapproval' => $whapproval,
            'whreturn' => $whreturn
        ]);

    }

    public function getAllWarehouseApproval()
    {
        return ResponseJSON($this->warehouseTransactionService->handleAllWhApproval(), 200);
    }

    // *: Untuk show data approv
    public function show($id) {
        $whapprov = $this->warehouseTransactionService->handleShowWhApproval($id);
        $requestForm = $this->requestStockService->handleRequestStockByRequestForms($whapprov->requestForms);
        return view('warehouse.check_whapproval', compact('whapprov','requestForm'));
    }

    // *: Untuk show data return
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
    public function updateImport(Request $request){
        // ! ! //
        $excel = [];

        foreach (request()->file('file') as $key => $file) {
            $excel = Excel::toArray(new WarehouseImport, $file);
            
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
        // ! ! //
        

        // TODO: Validasi
        // if () {
        //     $this->validate($request, [
        //         'file' => 'required|mimes:csv,xls,xlsx,ods'
        //     ]);
        // }

        // TODO: Notif validasi
        // Session::flash('sukses','Data Siswa Berhasil Diimport!');
        }

    /*
    *|--------------------------------------------------------------------------
    *| Index WH Transfer
    *|--------------------------------------------------------------------------
    */
    public function indexTransfer () {
        try {
            $grf_code = $this->warehouseTransactionService->handleGenerateGrfCode();
            $grfs = $this->requestFormService->handleGetAllWarehouseTransferGrfByUser();
    
            return view( "warehouse.transfer", [
                'grf_code' => $grf_code,
                'grfs' => $grfs,
            ] );
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }



    /*
    *|--------------------------------------------------------------------------
    *| Store GRF WH Transfer
    *|--------------------------------------------------------------------------
    */
    public function storeGrfTransfer (Request $request) {
        try {
            $this->requestFormService->handleStoreGrf($request);
    
            return Redirect::route( "warehouse.transfer.get.detail", str_replace( '/', '~', strtolower( $request->grf_code ) ) );
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }


    
    /*
    *|--------------------------------------------------------------------------
    *| Store Item Transfer
    *|--------------------------------------------------------------------------
    */
    public function storeTransfer (Request $request, $id) {
        try {
            $this->warehouseTransactionService->handleStoreWarehouseForm($request, $id);
    
            return redirect()->back();
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    /*
    *|--------------------------------------------------------------------------
    *| Update Ready Transfer
    *|--------------------------------------------------------------------------
    */
    public function updateTransfer (Request $request) {
        try {
            $this->warehouseTransactionService->handleUpdateWarehouseTransfer($request);
    
            return redirect()->back();
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }


    
    /*
    *|--------------------------------------------------------------------------
    *| Displaying Warehouse Transfer
    *|--------------------------------------------------------------------------
    */
    public function createTransfer ($code) {
        try {
            $grf = $this->requestFormService->handleGetCurrentGrf($code);
            $warehouses = $this->warehouseService->handleAllWareHouse();
            $parts = $this->partService->handleAllPart();
            $transferForms = $this->warehouseTransactionService->handleTransferFormPerGrf($code);
            $brands = $this->brandService->handleGetAllBrand();
    
            return view('warehouse.create', [
                'grf' => $grf,
                'warehouses' => $warehouses,
                'parts' => $parts,
                'transferForms' => $transferForms,
                'brands' => $brands,
            ]);
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }



    /*
    *|--------------------------------------------------------------------------
    *| Remove Item Transfer from list
    *|--------------------------------------------------------------------------
    */
    public function deleteTransfer ($id) {
        try {
            $this->warehouseTransactionService->handleDeleteTransferForm($id);
    
            return redirect()->back();
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    /*
    *|--------------------------------------------------------------------------
    *| Store Pieces Transfer
    *|--------------------------------------------------------------------------
    */
    public function storePiecesTransfer (Request $request, $id) {
        // Services
        try {
            $this->warehouseTransactionService->handleStorePiecesTransfer($request, $id);
    
            return redirect()->back();
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }



    /*
    *|--------------------------------------------------------------------------
    *| Store Bulk Transfer
    *|--------------------------------------------------------------------------
    */
    public function storeBulkTransfer (Request $request, $id) {
        try {
            $this->warehouseTransactionService->handleStoreBulkTransfer($request, $id);
    
            return redirect()->back();
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }



    /*
    *|--------------------------------------------------------------------------
    *| Change current warehouse on transfer
    *|--------------------------------------------------------------------------
    */
    public function updateCurrentWarehouseTransfer ( Request $request, $id ) {
        try {
            $this->warehouseTransactionService->handleChangeCurrentWarehouseTransfer($request, $id);

            return redirect()->back();
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }



    /*
    *|--------------------------------------------------------------------------
    *| Change warehouse destination on transfer
    *|--------------------------------------------------------------------------
    */
    public function updateWarehouseDestinationTransfer ( Request $request, $id ) {
        try {
            $this->warehouseTransactionService->handleChangeWarehouseDestinationTransfer($request, $id);

            return redirect()->back();
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }
}
