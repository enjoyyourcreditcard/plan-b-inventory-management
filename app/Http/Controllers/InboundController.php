<?php

namespace App\Http\Controllers;

use App\Exports\InboundExport;
use App\Imports\InboundImport;
use App\Services\InboundService;
use App\Services\NotificationService;
use App\Services\OrderInboundService;
use App\Services\PartService;
use App\Services\RequestFormService;
use App\Services\TransactionService;
use App\Services\WarehouseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;

class InboundController extends Controller
{
    public function __construct(InboundService $inboundService, PartService $partService, NotificationService $notificationService, WarehouseService $warehouseService, OrderInboundService $orderInboundService, RequestFormService $requestFormService, TransactionService $transactionService)
    {
        $this->inboundService      = $inboundService;
        $this->partService         = $partService;
        $this->notificationService = $notificationService;
        $this->warehouseService    = $warehouseService;
        $this->orderInboundService = $orderInboundService;
        $this->requestFormService  = $requestFormService;
        $this->transactionService  = $transactionService;
    }

    /*
   *|--------------------------------------------------------------------------
   *| IC: Index inbounds
   *|--------------------------------------------------------------------------
   */
    public function index()
    {
        try{
            $inbounds   = $this->inboundService->handleAllInbound();
            $parts      = $this->partService->handleAllPart();
            $warehouses = $this->warehouseService->handleAllWareHouse();
            $irfCode    = $this->orderInboundService->handleGenerateInboundIrfCode();
            // $notifications    =  $this->notificationService->handleAllNotification();

            return view('stock.inbound', [
                'inbounds'   => $inbounds,
                'parts'      => $parts,
                'warehouses' => $warehouses,
                'irfCode'    => $irfCode,
                // 'notifications'    => $notifications,
            ]);
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }

    }

    /*
   *|--------------------------------------------------------------------------
   *| Delete Inboud data
   *|--------------------------------------------------------------------------
   */
    public function delete($id){
        try{
            $this->inboundService->handleDeleteInbound($id);
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    /*
   *|--------------------------------------------------------------------------
   *| Delete Inboud data
   *|--------------------------------------------------------------------------
   */
    public function destroy(Request $request, $id){
        try{
            $this->orderInboundService->handleDeleteOrderInbound($request, $id);
            return redirect()->back();
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

     /*
    *|--------------------------------------------------------------------------
    *| Shows user's request main page
    *|--------------------------------------------------------------------------
    */
    public function storeCreateInboundGrf(Request $request)
    {
        try {
            $createdData = $this->orderInboundService->handleStoreInboundGrf($request);
            return redirect()->route( 'inbound.get.detail', $createdData->id );
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

     /*
    *|--------------------------------------------------------------------------
    *| Shows a request form and item list
    *|--------------------------------------------------------------------------
    */
    public function create($code)
    {
        try {
            $warehouses         = $this->warehouseService->handleAllWareHouse(); 
            $inbounds           = $this->inboundService->handleAllInbound(); //ngambil data master 
            $inboundForms       = $this->orderInboundService->handleShowInboundForm($code); //ngambil grf
            $orderInbounds      = $this->orderInboundService->handleInboundMiniStock($code);
            $warehouseInbounds  = $this->orderInboundService->handleGetWarehouseInbound();
            $grfs               = $this->orderInboundService->handleGetAllInboundGrfByUser();

            return view( "stock.InboundShow", [
                'inbounds'          => $inbounds,
                'warehouses'        => $warehouses,
                'warehouseInbounds' => $warehouseInbounds,
                'inboundForms'      => $inboundForms,
                'orderInbounds'     => $orderInbounds,
                'grfs'              => $grfs
            ] );
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    /*
    *|--------------------------------------------------------------------------
    *| Adding requested item into the list
    *|--------------------------------------------------------------------------
    */
    public function storeAddItem(Request $request, $id)
    {
        try {
            $this->orderInboundService->handleInboundStore($request, $id);
            return redirect()->back();
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    /*
    *|--------------------------------------------------------------------------
    *| Adding requested warehouse into the list
    *|--------------------------------------------------------------------------
    */
    // public function storeAddWh(Request $request, $id)
    // {
    //     try {
    //         $this->orderInboundService->handleInboundStore($request, $id);

    //         return redirect()->back();
    //     } catch (\Exception $e) {
    //         return Redirect::back()->withError($e->getMessage());
    //     }
    // }

    /*
    *|--------------------------------------------------------------------------
    *| Adding requested warehouse into the list
    *|--------------------------------------------------------------------------
    */
    public function storeAddWh(Request $request, $id)
    {
        try {
            $this->orderInboundService->handleInboundStore($request, $id);

            return redirect()->back();
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    /*
    *|--------------------------------------------------------------------------
    *| Adding requested warehouse
    *|--------------------------------------------------------------------------
    */
    public function updateCurrentWarehouse(Request $request, $id)
    {
        try {
            $this->orderInboundService->handleUpdateCurrentWarehouse($request, $id);
            return redirect()->back();
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    /*
    *|--------------------------------------------------------------------------
    *| Adding warehouse destination
    *|--------------------------------------------------------------------------
    */
    public function updateWarehouseDestination(Request $request, $id)
    {
        try {
            $this->orderInboundService->handleUpdateWarehouseDestination($request, $id);
            return redirect()->back();
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    /*
    *|--------------------------------------------------------------------------
    *| Submit the request
    *|--------------------------------------------------------------------------
    */
    public function changeStatusToSubmit(Request $request, $id)
    {
        try {
            $this->orderInboundService->handleUpdateRequestForm($request, $id);
            return redirect()->back();
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    /*
    *|--------------------------------------------------------------------------
    *| IC: Download template excel for inbound
    *|--------------------------------------------------------------------------
    */
    public function export()
    {
        return (new InboundExport)->download('inboundPO.xlsx');
    }
        
    /*
    *|--------------------------------------------------------------------------
    *| IC: Upload excel inbound PO
    *|--------------------------------------------------------------------------
    */
    public function import (Request $request) {
        try {
            $this->orderInboundService->handleImportExcel($request);
            return redirect()->back()->with('success', 'Proses upload berhasil! IRF telah terbuat.');
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }
        
    /*
    *|--------------------------------------------------------------------------
    *| Giver index
    *|--------------------------------------------------------------------------
    */
    public function giverIndex () {
        try {
            return view('transaction.warehouse.giver-index');
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }
        
    /*
    *|--------------------------------------------------------------------------
    *| Giver show
    *|--------------------------------------------------------------------------
    */
    public function giverShow ($id) {
        try {
            $currentGrf = $this->inboundService->handleShowGrfInboundGiver($id);
            $confirmation = $this->orderInboundService->handleConfirmationInboundGiver($currentGrf);

            return view('transaction.warehouse.giver-show', [
                'currentGrf' => $currentGrf,
                'confirmation' => $confirmation,
            ]);
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }
        
    /*
    *|--------------------------------------------------------------------------
    *| Giver store Non SN
    *|--------------------------------------------------------------------------
    */
    public function giverNonSnStore (Request $request, $id) {
        try {
            $this->orderInboundService->handleStoreNonSnInboundGiverPieces($request, $id);
            return redirect()->back();
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }
        
    /*
    *|--------------------------------------------------------------------------
    *| Giver store SN Pieces
    *|--------------------------------------------------------------------------
    */
    public function giverPiecesStore (Request $request, $id) {
        try {
            $this->orderInboundService->handleStoreSnInboundGiverPieces($request, $id);
            return redirect()->back();
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }
        
    /*
    *|--------------------------------------------------------------------------
    *| Giver store SN Bulk
    *|--------------------------------------------------------------------------
    */
    public function giverBulkStore (Request $request, $id) {
        try {
            $this->orderInboundService->handleStoreSnInboundGiverBulk($request, $id);
            return redirect()->back();
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }
        
    /*
    *|--------------------------------------------------------------------------
    *| Giver Submit
    *|--------------------------------------------------------------------------
    */
    public function giverSubmit (Request $request, $id) {
        try {
            $grf_code           = $this->requestFormService->handleGenerateGrfCode();
            $transactionService = $this->transactionService;

            $this->orderInboundService->handleUpdateGiver($request, $id, $grf_code, $transactionService);
            return redirect()->route('inbound.get.giver');
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    /*
    *|--------------------------------------------------------------------------
    *| WH: Index inbounds
    *|--------------------------------------------------------------------------
    */
    public function recipientIndex () {
        try {
            return view('transaction.warehouse.recipient-index');
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }   

    /*
    *|--------------------------------------------------------------------------
    *| WH: Detail inbound
    *|--------------------------------------------------------------------------
    */
    public function recipientShow ($id) {
        try {
            $irf = $this->inboundService->handleShowIrfRecipient($id);

            return view('transaction.warehouse.recipient-show', [
                'irf' => $irf,
            ]);
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }   

    /*
    *|--------------------------------------------------------------------------
    *| WH: Store sn to inbound_stocks table
    *|--------------------------------------------------------------------------
    */
    public function recipientPiecesStore (Request $request, $id) {
        try {
            $this->orderInboundService->handleStoreSnInboundRecipientPieces($request, $id);
            return redirect()->back()->with('success', 'SN berhasil diinput!');
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    /*
    *|--------------------------------------------------------------------------
    *| WH: Checklist non SN inbound item
    *|--------------------------------------------------------------------------
    */
    public function recipientNonSnStore (Request $request, $id) {
        try {
            $this->orderInboundService->handleStoreNonSnInboundRecipientPieces($request, $id);
            return redirect()->back()->with('success', 'Barang berhasil dicheck!');
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }
      
    /*
    *|--------------------------------------------------------------------------
    *| WH: Import excel to inbound_stocks table
    *|--------------------------------------------------------------------------
    */
    public function recipientBulkStore (Request $request, $id) {
        try {
            $this->orderInboundService->handleStoreSnInboundRecipientBulk($request, $id);
            return redirect()->back()->with('success', 'Excel berhasil diupload!');
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    /*
    *|--------------------------------------------------------------------------
    *| WH: Store inbound into stock table
    *|--------------------------------------------------------------------------
    */
    public function recipientSubmit (Request $request, $id) {
        try {
            $this->orderInboundService->handleUpdateRecipient($request, $id);
            return redirect()->route('inbound.get.recipient')->with('success', 'Barang telah tersimpan kedalam stock!');
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }
        
    // api
    public function getAllInbound(Request $request)
    {
        return ResponseJSON($this->inboundService->handleAllInboundApi($request), 200);
    }
    
    public function postStoreInbound(Request $request)
    {
        return ResponseJSON($this->inboundService->handleStoreInboundApi($request), 200);
    }
    
    public function putUpdateInbound(Request $request, $id)
    {
        return ResponseJSON($this->inboundService->handleUpdateInboundApi($request, $id), 200);
    }

    public function getDeleteInbound($id)
    {
        return ResponseJSON($this->inboundService->handleDeleteInboundApi($id), 200);
    }

    public function apiGiverIndex ($id)
    {
        return ResponseJSON($this->inboundService->handleGetGrfInboundGiver($id), 200);
    }

    public function apiGiverShow ($id)
    {
        return ResponseJSON($this->inboundService->handleShowOrderInboundGiver($id), 200);
    }

    public function apiRecipientIndex ($id)
    {
        return ResponseJSON($this->inboundService->handleGetIrfRecipient($id), 200);
    }

    public function apiRecipientShow ($id)
    {
        return ResponseJSON($this->inboundService->handleShowOrderInboundRecipient($id), 200);
    }
}

    // public function store(Request $request){
    //     $this->inboundService->handleStoreInbound($request);

    //     return redirect()-> back();
    // }
    
    // public function update(Request $request){
    //     $this->inboundService->handleUpdateInbound($request);
        
    //     return redirect()->back();
    // }

    // function allup(Request $request){
    //     $this->inboundService->handleAllUpInbound($request);
    //     $this->inboundService->handleAllDeleteInbound($request);

    //     return redirect()->back();
    // }
    
    // function up($id){
    //     $this->inboundService->handleUpInbound($id);
    //     $this->inboundService->handleDeleteInbound($id);

    //     return redirect()->back();
    // }
