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
    *| Index Request Form
    *|--------------------------------------------------------------------------
    */
    public function index()
    {
        $notifications =  $this->notificationService->handleAllNotification();
        $requestForms = $this->requestFormService->handleGetByUserRequestForm();
        $grf_code = $this->requestFormService->handleGenerateGrfCode();

        return view('transaction.request_form.request_form', [
            'notifications' => $notifications,
            'requestForms' => $requestForms,
            'grf_code' => $grf_code
        ]);
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
        // return view('transaction.return-stock', [
        //   View
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
    | Create Request Form
    |--------------------------------------------------------------------------
    */
    public function create($code)
    {
        // Services
        $notifications =  $this->notificationService->handleAllNotification();
        $grf = $this->requestFormService->handleGetCurrentGrf($code);
        $timeline = $this->requestFormService->handleTimelineGrf($grf);
        $requestForms = $this->requestFormService->handleShowRequestForm($code);
        $brands = $this->brandService->handleGetAllBrand();
        $segment = $this->segmentService->handleAllSegment();
        $warehouses = $this->warehouseService->handleAllWareHouse();
        // dd($requestForms);


        return view('transaction.request_form.create', [
            'notifications' => $notifications,
            'requestForms' => $requestForms,
            'segment' => $segment,
            'brands' => $brands,
            'warehouses' => $warehouses,
            'grf' => $grf
        ]);
    }

    /*
    *|--------------------------------------------------------------------------
    *| Store Request Form
    *|--------------------------------------------------------------------------
    */
    public function storeAddItem(Request $request, $id)
    {
        // Services
        $this->requestFormService->handleStore($request, $id);

        // Return View
        return redirect()->back();
    }

    /*
    *|--------------------------------------------------------------------------
    *| Store GRF Draft Request Form
    *|--------------------------------------------------------------------------
    */
    public function storeCreateGrf(Request $request)
    {
        // Services
        try {
            $this->requestFormService->handleStoreGrf($request);
            return redirect()->route('requester.get.detail', str_replace('/', '~', strtolower($request->grf_code)));
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    /*
    *|--------------------------------------------------------------------------
    *| Update Status Request Form
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
    *| Delete Request Form
    *|--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        // Services
        $this->requestFormService->handleDeleteRequestForm($id);

        // Return View
        return redirect()->back();
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
