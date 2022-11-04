<?php

namespace App\Http\Controllers;

use App\Models\OrderInbound;
use Illuminate\Http\Request;
use App\Services\PartService;
use App\Exports\InboundExport;
use App\Imports\InboundImport;
use App\Services\InboundService;
use App\Services\WarehouseService;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\NotificationService;
use App\Services\OrderInboundService;
use Illuminate\Support\Facades\Redirect;

class InboundController extends Controller
{
    public function __construct(InboundService $inboundService, PartService $partService, NotificationService $notificationService, WarehouseService $warehouseService, OrderInboundService $orderInboundService)
    {
        $this->inboundService = $inboundService;
        $this->partService = $partService;
        $this->notificationService = $notificationService;
        $this->warehouseService = $warehouseService;
        $this->orderInboundService = $orderInboundService;
    }

    // INDEX

    public function index()
    {
        try{
        $inbound =  $this->inboundService->handleAllInbound();
        $parts = $this->partService->handleAllPart();
        $notifications =  $this->notificationService->handleAllNotification();
        $warehouse = $this->warehouseService->handleAllWareHouse();
        $inbound_grf_code = $this->orderInboundService->handleGenerateInboundGrfCode();
        $grfs = $this->orderInboundService->handleGetAllInboundGrfByUser();
        return view('stock.inbound', [
            'inbound' => $inbound,
            'parts' => $parts,
            'notifications' => $notifications,
            'warehouse' => $warehouse,
            'inbound_grf_code' => $inbound_grf_code,
            'grfs' => $grfs
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
            $this->orderInboundService->handleStoreInboundGrf($request);
            return redirect()->route( 'inbound.get.detail', str_replace( '/', '~', strtolower( $request->inbound_grf_code ) ) );
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
            $warehouses = $this->warehouseService->handleAllWareHouse(); 
            $inbounds =  $this->inboundService->handleAllInbound(); //ngambil data master 
            $inboundForms = $this->orderInboundService->handleShowInboundForm($code); //ngambil grf
            $orderInbounds = $this->orderInboundService->handleInboundMiniStock($code);
            $grfs = $this->orderInboundService->handleGetAllInboundGrfByUser();
            return view( "stock.InboundShow", [
                'inbounds' => $inbounds,
                'warehouses' => $warehouses,
                'inboundForms' => $inboundForms,
                'orderInbounds' => $orderInbounds,
                'grfs' => $grfs
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
    *| Adding requested warehouse
    *|--------------------------------------------------------------------------
    */
    public function storeAddWarehouse(Request $request, $id)
    {
        try {
            $this->orderInboundService->handleStoreWarehouse($request, $id);

            
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
    *| Store Bulk Transfer
    *|--------------------------------------------------------------------------
    */
    public function import (Request $request) {
        try {
            $this->orderInboundService->handleImportExcel($request);
    
            return redirect()->back();
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
}

// public function store(Request $request){
    //     $this->inboundService->handleStoreInbound($request);
    //     return redirect()-> back();
    // }
    
    // public function update(Request $request){
        //     $this->inboundService->handleUpdateInbound($request);
        
        //     return redirect()->back();
       
    // }
    // function allup(Request $request)
        // {
            //     $this->inboundService->handleAllUpInbound($request);
            //     $this->inboundService->handleAllDeleteInbound($request);
            //     return redirect()->back();
            // }
            
            // function up($id)
            // {
                //     $this->inboundService->handleUpInbound($id);
                //     $this->inboundService->handleDeleteInbound($id);
                //     return redirect()->back();
                // }
                
                
                // // 
