<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\WhApproval;
use App\Models\RequestStock;
use Illuminate\Http\Request;
use App\Services\PartService;
use App\Services\BrandService;
use App\Imports\WarehouseImport;
use App\Services\WarehouseService;
use App\Services\RequestFormService;
use App\Services\TransactionService;
use Illuminate\Support\Facades\Auth;
// use Excel;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\RequestStockService;
use Illuminate\Support\Facades\Redirect;
use App\Services\WarehouseTransferService;
use App\Services\WarehouseTransactionService;

class WarehouseTransactionController extends Controller
{

    public function __construct(RequestStockService $requestStockService, WarehouseTransferService $warehouseTransferService, WarehouseTransactionService $warehouseTransactionService, TransactionService $transactionService, WarehouseService $warehouseService, RequestFormService $requestFormService, PartService $partService, BrandService $brandService, Stock $stock)
    {
        $this->warehouseTransactionService = $warehouseTransactionService;
        $this->warehouseService = $warehouseService;
        $this->warehouseTransferService = $warehouseTransferService;
        $this->transactionService = $transactionService;
        $this->requestFormService = $requestFormService;
        $this->requestStockService = $requestStockService;
        $this->partService = $partService;
        $this->brandService = $brandService;
        $this->stock = $stock;
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
     
        //masih error tidak bisa mengambil stock name
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

    public function storeNonSn(Request $request){
        try {
            $this->warehouseTransactionService->handleStoreNonSnWhApproval($request);
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
            ]);;
            
            foreach ($excel[0] as $row) {
                $stock = $this->stock->where('part_id', $validateData['part_id'])->where('sn_code', $row[0])->first();
                
                RequestStock::create([
                    'request_form_id' => $request->request_form_id,
                    'grf_id' => $request->grf_id,
                    'part_id' => $request->part_id,
                    'stock_id' => $stock->id,
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
    *| IC: Index WH Transfer
    *|--------------------------------------------------------------------------
    */
    public function indexTransfer()
    {
        try {
            $irfCode = $this->warehouseTransferService->handleGenerateIrfCode();
            $irfs    = $this->warehouseTransferService->handleAllIrf();

            return view("transaction.warehouse.transfer", [
                'irf_code' => $irfCode,
                'irfs'     => $irfs,
            ]);
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }



    /*
    *|--------------------------------------------------------------------------
    *| IC: Store IRF warehouse transfer
    *|--------------------------------------------------------------------------
    */
    public function storeIrfTransfer(Request $request)
    {
        try {
            $this->warehouseTransferService->handleStoreIrf($request);

            return Redirect::route("warehouse.transfer.get.detail", str_replace('/', '~', $request->irf_code));
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }



    /*
    *|--------------------------------------------------------------------------
    *| IC: Store Item Transfer
    *|--------------------------------------------------------------------------
    */
    public function storeTransfer(Request $request, $id)
    {
        try {
            $this->warehouseTransferService->handleStoreWarehouseForm($request, $id);

            return redirect()->back()->with('success', 'Berhasil memasukkan barang ke list!');
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    /*
    *|--------------------------------------------------------------------------
    *| IC: Submit IRG items to transfer
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
    *| IC: Detail warehouse transfer
    *|--------------------------------------------------------------------------
    */
    public function createTransfer($code)
    {
        try {
            $irf           = $this->warehouseTransferService->handleGetCurrentIrf($code);
            $transferForms = $this->warehouseTransferService->handleGetTransferFormPerIrf($code);
            $warehouses    = $this->warehouseService->handleAllWareHouse();
            $parts         = $this->partService->handleAllPart();
            $brands        = $this->brandService->handleGetAllBrand();

            return view('transaction.warehouse.create', [
                'irf'           => $irf,
                'warehouses'    => $warehouses,
                'parts'         => $parts,
                'transferForms' => $transferForms,
                'brands'        => $brands,
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
    *| WH: Store Pieces Transfer
    *|--------------------------------------------------------------------------
    */
    public function storePiecesTransfer(Request $request, $id)
    {
        try {
            $this->warehouseTransactionService->handleStorePiecesTransfer($request, $id);
            return redirect()->back()->with('success', 'Berhasil');
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    /*
    *|--------------------------------------------------------------------------
    *| WH: Store non SN Transfer
    *|--------------------------------------------------------------------------
    */
    public function storeNonSNTransfer(Request $request)
    {
        try {
            $this->warehouseTransactionService->handleUpdateTransferNonSN($request);
            return redirect()->back()->with('success', 'Berhasil');
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }



    /*
    *|--------------------------------------------------------------------------
    *| WH: Store Bulk Transfer
    *|--------------------------------------------------------------------------
    */
    public function storeBulkTransfer(Request $request, $id)
    {
        try {
            $this->warehouseTransactionService->handleStoreBulkTransfer($request, $id);

            return redirect()->back()->with('success', 'Berhasil mengimport excel');
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }



    /*
    *|--------------------------------------------------------------------------
    *| IC: Change current warehouse on transfer
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
    *| WH: Get data for wh approv transfer
    *|--------------------------------------------------------------------------
    */
    public function apiTransfer($warehouse_id){
        return ResponseJSON($this->warehouseTransactionService->handleAllWhTransfer($warehouse_id), 200);
    }

    /*
    *|--------------------------------------------------------------------------
    *| WH: Get data for detail wh approv transfer
    *|--------------------------------------------------------------------------
    */
    public function apiDetailWhtransfer($id){
        return ResponseJSON($this->warehouseTransactionService->handleShowWhTransfer($id), 200);
    }

    /*
    *|--------------------------------------------------------------------------
    *| WH: All IRF to transfer
    *|--------------------------------------------------------------------------
    */
    public function whtransfer()
    {
        $transferform = $this->warehouseTransactionService->handleAllWhTransfer(Auth::user()->warehouse_id);
        return view('transaction.warehouse.transferApprov', [
            "transferform" => $transferform,
        ]); 
    }

    /*
    *|--------------------------------------------------------------------------
    *| WH: Detail IRF on warehouse transfer
    *|--------------------------------------------------------------------------
    */
    public function showWhTransfer($id){
        $irf        = $this->warehouseTransferService->handleGetCurrentIrf($id);
        $tfApprov   = $this->warehouseTransactionService->handleShowWhTransfer($id);
        
        return view('transaction.warehouse.detailTransferApprov', [
            'irf'        => $irf,
            'tfApprov'   => $tfApprov,
        ]);
    }

    /*
    *|--------------------------------------------------------------------------
    *| WH: input recieved item pieces
    *|--------------------------------------------------------------------------
    */
    public function manualWhTransfer(Request $request, $id) {
        try {
            $this->warehouseTransactionService->handleStoreManualTransfer($request, $id);
            return redirect()->back()->with('success', 'Berhasil');
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    public function storeNonSNRecipient(Request $request, $id)
    {
        try {
            $this->warehouseTransactionService->handleStoreRecipientNonSN($request, $id);
            return redirect()->back()->with('success', 'Berhasil');
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    /*
    *|--------------------------------------------------------------------------
    *| WH: Submit IRF to transfer
    *|--------------------------------------------------------------------------
    */
    public function submitStatus(Request $request, $id){
        // try {
            $this->warehouseTransactionService->handleSubmitTransferApprov($request, $id);
            return Redirect()->route('warehouse.get.whtransfer');
        // } catch(\Exception $e) {
        //     return Redirect::back()->withError($e->getMessage());
        // }

    }

    /*
    *|--------------------------------------------------------------------------
    *| WH: API All IRF to recieve
    *|--------------------------------------------------------------------------
    */
    public function listRecipient($warehouse_destination){
        return ResponseJSON($this->warehouseTransactionService->handleWhRecipientAPI($warehouse_destination), 200);
    }

    /*
    *|--------------------------------------------------------------------------
    *| WH: API Detail IRF to recieve
    *|--------------------------------------------------------------------------
    */
    public function apiRecipient($id){
        return ResponseJSON($this->warehouseTransactionService->handleShowRecipient($id), 200);
    }

    /*
    *|--------------------------------------------------------------------------
    *| WH: All IRF to recieve
    *|--------------------------------------------------------------------------
    */
    public function recipient(){
        $irfs = $this->warehouseTransactionService->handleWhRecipient();
        return view('transaction.warehouse.recipientTransfer', [
            "irfs" => $irfs,
        ]); 
    }

    /*
    *|--------------------------------------------------------------------------
    *| WH: Detail IRF to recieve
    *|--------------------------------------------------------------------------
    */
    public function showWhRecipient($id){
        $irf        = $this->warehouseTransferService->handleGetCurrentIrf($id);

        return view('transaction.warehouse.detailRecipientTransfer', [
            'irf' => $irf,
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
        // try {
            $this->warehouseTransactionService->handleSubmitRecipient($request, $id);
            return Redirect()->route('warehouse.get.recipient');
        // } catch(\Exception $e) {
        //     return Redirect::back()->withError($e->getMessage());
        // }
    }
}
