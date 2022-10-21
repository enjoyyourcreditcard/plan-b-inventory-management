<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Services\PartService;
use App\Services\BrandService;
use App\Services\MiniStockService;
use App\Services\WarehouseService;
use App\Services\RequestFormService;
use App\Services\TransactionService;
use App\Services\NotificationService;
use App\Services\SegmentService;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

class UserTransactionController extends Controller
{
    public function __construct(MiniStockService $miniStockService, SegmentService $segmentService, NotificationService $notificationService, RequestFormService $requestFormService, PartService $partService, BrandService $brandService, WarehouseService $warehouseService)
    {
        $this->notificationService = $notificationService;
        $this->requestFormService = $requestFormService;
        $this->partService = $partService;
        $this->segmentService = $segmentService;
        $this->brandService = $brandService;
        $this->warehouseService = $warehouseService;
        $this->miniStockService = $miniStockService;
    }



    /*
    *|--------------------------------------------------------------------------
    *| Shows user's request main page
    *|--------------------------------------------------------------------------
    */
    public function index()
    {
        try {
            $notifications =  $this->notificationService->handleAllNotification();
            $grf_code = $this->requestFormService->handleGenerateGrfCode();
            $grfs = $this->requestFormService->handleGetAllGrfByUser();
            
            return view('request.request', [
                'notifications' => $notifications,
                'grf_code' => $grf_code,
                'grfs' => $grfs
            ]);
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    

    /*
    *|--------------------------------------------------------------------------
    *| Show Return Stockresources/views/transaction/return-stock.blade.php
    *|--------------------------------------------------------------------------
    */
    public function showReturnStock($code)
    {
        // Services
        $miniStocks = $this->miniStockService->handleShowMiniStock($code);
        $requestForms = $this->requestFormService->handleShowRequestForm($code);
        $grf = $this->requestFormService->handleGetCurrentGrf($code);

        // Return View
        return view ('transaction.return-stock', [
            'miniStocks' => $miniStocks,
            'requestForms' => $requestForms,
            'grf' => $grf,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | Show Return Stock
    |--------------------------------------------------------------------------
    */
    public function ajaxReturnStock($code)
    {
        // Services
        $miniStocks = $this->miniStockService->handleShowMiniStock($code);

        // Return View
        return response()->JSON($miniStocks->where('condition', '!=', null)->groupby('category'));
    }

    /*
    |--------------------------------------------------------------------------
    | Shows a request form and item list
    |--------------------------------------------------------------------------
    */
    public function create($code)
    {
        try {
            $notifications =  $this->notificationService->handleAllNotification();
            $grf = $this->requestFormService->handleGetCurrentGrf($code);
            $warehouses = $this->warehouseService->handleAllWareHouse();
            $brands = $this->brandService->handleGetAllBrand();
            $segments = $this->segmentService->handleAllSegment();
            $requestForms = $this->requestFormService->handleShowRequestForm($code);

            return view( "request.show", [
                'notifications' => $notifications,
                'grf' => $grf,
                'warehouses' => $warehouses,
                'brands' => $brands,
                'segments' => $segments,
                'requestForms' => $requestForms,
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
            $this->requestFormService->handleStore($request, $id);

            return redirect()->back();
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }



    /*
    *|--------------------------------------------------------------------------
    *| Create a new grf for new request
    *|--------------------------------------------------------------------------
    */
    public function storeCreateGrf(Request $request)
    {
        try {
            $this->requestFormService->handleStoreGrf($request);
            return redirect()->route( 'request.get.detail', str_replace( '/', '~', strtolower( $request->grf_code ) ) );
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }




    /*
    *|--------------------------------------------------------------------------
    *| Change warehouse location
    *|--------------------------------------------------------------------------
    */
    public function changeWarehouse(Request $request, $id)
    {
        try {
            $this->requestFormService->handleChangeWarehouseLocation($request, $id);
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
            $this->requestFormService->handleUpdateRequestForm($request, $id);
            return redirect()->back();
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    /*
    *|--------------------------------------------------------------------------
    *| Update Submit Return Stock
    *|--------------------------------------------------------------------------
    */
    public function updateReturnStock(Request $request, $id)
    {
        // Services
        $this->miniStockService->handleUpdateReturnStock($request, $id);
        return redirect()->route('requester.get.home');
    }



    /*
    *|--------------------------------------------------------------------------
    *| Delete selected item on the list
    *|--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        try {
            $this->requestFormService->handleDeleteRequestForm($id);

            return redirect()->back();
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }
    /*
    *|--------------------------------------------------------------------------
    *| User Approve Pickup
    *|--------------------------------------------------------------------------
    */
    public function getApprovePickup($id)
    {
        $this->requestFormService->handlePostApprovePickup($id);
        return redirect()->back();
    }
}
