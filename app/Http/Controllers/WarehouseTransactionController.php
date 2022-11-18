<?php

namespace App\Http\Controllers;

use App\Models\RequestStock;
use App\Models\WhApproval;
use App\Services\BrandService;
use App\Services\PartService;
use App\Services\RequestFormService;
use App\Services\RequestStockService;
use App\Services\TransactionService;
use App\Services\WarehouseService;
use App\Services\WarehouseTransactionService;
use App\Imports\WarehouseImport;
use Illuminate\Support\Facades\Auth;
// use Excel;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class WarehouseTransactionController extends Controller
{

    public function __construct(RequestStockService $requestStockService, WarehouseTransactionService $warehouseTransactionService, TransactionService $transactionService, WarehouseService $warehouseService, RequestFormService $requestFormService, PartService $partService, BrandService $brandService)
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
    public function viewRequest()
    {
        /*
        *|--------------------------------------------------------------------------
        *| Get Data Untuk Warehouse Approv
        *|--------------------------------------------------------------------------
        */
        // $whapproval = $this->warehouseTransactionService->handleAllWhApproval();
        return view('transaction.warehouse.request');
    }


    public function apiRequest($id)
    {
        $whapproval = $this->warehouseTransactionService->handleFindWhApproval($id);
        return ResponseJSON($whapproval, 200);
    }
    
    
    public function apiReturn($id)
    {
        $whreturn = $this->warehouseTransactionService->handleFindWhReturn($id);
        return ResponseJSON($whreturn, 200);
        
    }

    public function indexReturn()
    {
        /*
        *|--------------------------------------------------------------------------
        *| Get Data Untuk Warehouse Return
        *|--------------------------------------------------------------------------
        */
        // $whreturn = $this->warehouseTransactionService->handleAllWhReturn();
        // dd($whreturn);
        return view('transaction.warehouse.return');
    }

    /*
    *|--------------------------------------------------------------------------
    *| Function untuk get data di dashboard
    *|--------------------------------------------------------------------------
    */
    public function dashboard()
    {
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
        return view('home.warehouse.index', [
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
    public function show($id)
    {
        $whapprov = $this->warehouseTransactionService->handleShowWhApproval($id);
        $requestForm = $this->requestStockService->handleRequestStockByRequestForms($whapprov->requestForms);
        return view('transaction.warehouse.check-whapproval', compact('whapprov', 'requestForm'));
    }

    /*
    *|--------------------------------------------------------------------------
    *| Show Data Return Warehouse
    *|--------------------------------------------------------------------------
    */
    public function showReturn($id)
    {
        $whreturn = $this->warehouseTransactionService->handleShowWhReturn($id);
        $requestForm = $this->requestStockService->handleRequestStockByRequestForms($whreturn->requestForms);

        return view('transaction.warehouse.warehouse-return', compact('whreturn','requestForm'));
    }

    public function store(Request $request){
        try {
            $this->warehouseTransactionService->handleStoreWhApproval($request);
            return redirect()->back();
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    public function postApproveWH(Request $request)
    {
        $transactionService = $this->transactionService;
        $this->warehouseTransactionService->handlePostApproveWH($request, $transactionService);
        return redirect()->route('warehouse.get.request');
    }

    /*
    *|--------------------------------------------------------------------------
    *| Import Bulk Warehouse Approv
    *|--------------------------------------------------------------------------
    */
    public function updateImport(Request $request){

        try {
            $file = $request->file;

            $excel = Excel::toCollection(new WarehouseImport, $file);

            $sn_code = [];

            foreach ($excel->first() as $row) {
                $sn_code[] = $row->first();
            }

            $request['sn_code'] = $sn_code;

            $validateData = $request->validate([
                'request_form_id' => 'required',
                'grf_id' => 'required',
                'part_id' => 'required',
                'sn_code.*' => 'distinct', 
                'sn_code' => ['required', 'array'],
            ]);
    
    
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
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
        }

    /*
    *|--------------------------------------------------------------------------
    *| Index WH Transfer
    *|--------------------------------------------------------------------------
    */
    public function indexTransfer()
    {
        try {
            $grf_code = $this->warehouseTransactionService->handleGenerateGrfCode();
            $grfs = $this->requestFormService->handleGetAllWarehouseTransferGrfByUser();

            return view("transaction.warehouse.transfer", [
                'grf_code' => $grf_code,
                'grfs' => $grfs,
            ]);
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }



    /*
    *|--------------------------------------------------------------------------
    *| Store GRF WH Transfer
    *|--------------------------------------------------------------------------
    */
    public function storeGrfTransfer(Request $request)
    {
        try {
            $this->requestFormService->handleStoreGrf($request);

            return Redirect::route("warehouse.transfer.get.detail", str_replace('/', '~', strtolower($request->grf_code)));
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }



    /*
    *|--------------------------------------------------------------------------
    *| Store Item Transfer
    *|--------------------------------------------------------------------------
    */
    public function storeTransfer(Request $request, $id)
    {
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
    public function updateTransfer(Request $request)
    {
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
    public function createTransfer($code)
    {
        try {
            $grf = $this->requestFormService->handleGetCurrentGrf($code);
            $warehouses = $this->warehouseService->handleAllWareHouse();
            $parts = $this->partService->handleAllPart();
            $transferForms = $this->warehouseTransactionService->handleTransferFormPerGrf($code);
            $brands = $this->brandService->handleGetAllBrand();

            return view('transaction.warehouse.create', [
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
    public function deleteTransfer($id)
    {
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
    public function storePiecesTransfer(Request $request, $id)
    {
        // Services
        try {
            $this->warehouseTransactionService->handleStorePiecesTransfer($request, $id);

            return redirect()->back()->with('success', 'Berhasil');
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }



    /*
    *|--------------------------------------------------------------------------
    *| Store Bulk Transfer
    *|--------------------------------------------------------------------------
    */
    public function storeBulkTransfer(Request $request, $id)
    {
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
    public function updateCurrentWarehouseTransfer(Request $request, $id)
    {
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
    public function updateWarehouseDestinationTransfer(Request $request, $id)
    {
        try {
            $this->warehouseTransactionService->handleChangeWarehouseDestinationTransfer($request, $id);

            return redirect()->back();
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    /*
    *|--------------------------------------------------------------------------
    *| Get data for wh approv transfer
    *|--------------------------------------------------------------------------
    */

    public function apiTransfer($warehouse_id){
        return ResponseJSON($this->warehouseTransactionService->handleAllWhTransfer($warehouse_id), 200);
    }

    public function apiDetailWhtransfer($id){
        return ResponseJSON($this->warehouseTransactionService->handleShowWhTransfer($id), 200);
    }

    public function whtransfer()
    {
       $transferform = $this->warehouseTransactionService->handleAllWhTransfer(Auth::user()->warehouse_id);
        return view('transaction.warehouse.transferApprov', [
            "transferform" => $transferform,
        ]); 
    }

    public function showWhTransfer($id){
        $grf = $this->requestFormService->handleGetCurrentGrf($id);
        $currentGrf = $this->requestFormService->handleGetCurrentGrf($id);
        $tfApprov = $this->warehouseTransactionService->handleShowWhTransfer($id);
        return view('transaction.warehouse.detailTransferApprov', [
            'currentGrf' => $currentGrf,
            'grf' => $grf,
            'tfApprov' => $tfApprov,
        ]);
    }

    public function manualWhTransfer(Request $request, $id) {
        try {
            $this->warehouseTransactionService->handleStoreManualTransfer($request, $id);
            return redirect()->back()->with('success', 'Berhasil');
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    public function submitStatus(Request $request, $id){
        try {
            $this->warehouseTransactionService->handleSubmitTransferApprov($request, $id);
            return Redirect()->route('warehouse.get.whtransfer');
        } catch(\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }

    }

    /*
    *|--------------------------------------------------------------------------
    *| Get data for wh approv transfer
    *|--------------------------------------------------------------------------
    */

    public function listRecipient($warehouse_destination){
        return ResponseJSON($this->warehouseTransactionService->handleWhRecipientAPI($warehouse_destination), 200);
    }

    public function apiRecipient($id){
        return ResponseJSON($this->warehouseTransactionService->handleShowRecipient($id), 200);
    }

    public function recipient(){
        $transferform = $this->warehouseTransactionService->handleWhRecipient(Auth::user()->warehouse_destination);
        return view('transaction.warehouse.recipientTransfer', [
            "transferform" => $transferform,
        ]); 
    }

    public function showWhRecipient($id){
        $grf = $this->requestFormService->handleGetCurrentGrf($id);
        $currentGrf = $this->requestFormService->handleGetCurrentGrf($id);
        $tfApprov = $this->warehouseTransactionService->handleShowRecipient($id);
        return view('transaction.warehouse.detailRecipientTransfer', [
            'currentGrf' => $currentGrf,
            'grf' => $grf,
            'tfApprov' => $tfApprov,
        ]);
    }

    public function bulkRecipient(Request $request, $id){
        try {
            $this->warehouseTransactionService->handleBulkRecipient($request, $id);
            return redirect()->back()->with('success', 'Berhasil');
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    public function submitRecipient(Request $request, $id)
    {
        try {
            $this->warehouseTransactionService->handleSubmitRecipient($request, $id);
            return Redirect()->route('warehouse.get.recipient');
        } catch(\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }

    }
}
