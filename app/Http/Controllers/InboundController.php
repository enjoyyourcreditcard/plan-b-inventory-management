<?php

namespace App\Http\Controllers;

use App\Models\GrfInbound;
use App\Models\OrderInbound;
use Illuminate\Http\Request;
use App\Services\PartService;
use App\Exports\InboundExport;
use App\Imports\InboundImport;
use App\Services\InboundService;
use App\Services\WarehouseService;
use App\Services\RequestFormService;
use App\Services\TransactionService;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\NotificationService;
use App\Services\OrderInboundService;
use Illuminate\Support\Facades\Redirect;

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

    // INDEX
    public function index()
    {
        try{
        $inbound   = $this->inboundService->handleAllInbound();
        $parts     = $this->partService->handleAllPart();
        $warehouses = $this->warehouseService->handleAllWareHouse();
        $grfs      = $this->orderInboundService->handleGetAllInboundGrfByUser();
        // $notifications    =  $this->notificationService->handleAllNotification();
        // $inbound_grf_code = $this->orderInboundService->handleGenerateInboundRequest();

        return view('stock.inbound', [
            'inbound'    => $inbound,
            'parts'      => $parts,
            'warehouses' => $warehouses,
            'grfs'       => $grfs
            // 'notifications'    => $notifications,
            // 'inbound_grf_code' => $inbound_grf_code,
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
        // dd($request);
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

            // dd($inbounds[0]);

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

    // EXCEL
    public function export()
    {
        return (new InboundExport)->download('inboundPO.xlsx');
    }
        
    /*
    *|--------------------------------------------------------------------------
    *| Store Bulk Part
    *|--------------------------------------------------------------------------
    */
    public function import (Request $request) {
        try {
            $this->orderInboundService->handleImportExcel($request);
            return redirect()->back();
        } catch (\Exception $e) {
            dd($e);
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
    *| Recipient index
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
    *| Recipient show
    *|--------------------------------------------------------------------------
    */
    public function recipientShow ($id) {
        try {
            $currentGrf   = $this->inboundService->handleShowGrfInboundRecipient($id);
            $confirmation = $this->orderInboundService->handleConfirmationInboundRecipient($currentGrf);

            // dd($confirmation);
            return view('transaction.warehouse.recipient-show', [
                'currentGrf' => $currentGrf,
                'confirmation' => $confirmation,
            ]);
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }   

    /*
    *|--------------------------------------------------------------------------
    *| Recipient store SN Pieces
    *|--------------------------------------------------------------------------
    */
    public function recipientPiecesStore (Request $request, $id) {
        try {
            $this->orderInboundService->handleStoreSnInboundRecipientPieces($request, $id);
            return redirect()->back();
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }
      
    /*
    *|--------------------------------------------------------------------------
    *| Recipient store SN Bulk
    *|--------------------------------------------------------------------------
    */
    public function recipientBulkStore (Request $request, $id) {
        try {
            $this->orderInboundService->handleStoreSnInboundRecipientBulk($request, $id);
            return redirect()->back();
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    /*
    *|--------------------------------------------------------------------------
    *| Recipient Submit
    *|--------------------------------------------------------------------------
    */
    public function recipientSubmit (Request $request, $id) {
        try {
            $this->orderInboundService->handleUpdateRecipient($request, $id);
            return redirect()->route('inbound.get.recipient');
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
        return ResponseJSON($this->inboundService->handleGetGrfInboundRecipient($id), 200);
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
