<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Services\BrandService;
use App\Services\MiniStockService;
use App\Services\NotificationService;
use App\Services\PartService;
use App\Services\RequestFormService;
use App\Services\SegmentService;
use App\Services\TransactionService;
use App\Services\WarehouseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
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
    *| Shows user's request main page
    *|--------------------------------------------------------------------------
    */
    public function index()
    {
        try {
            $notifications =  $this->notificationService->handleAllNotification();
            $grf_code = $this->requestFormService->handleGenerateGrfCode();
            $grfs = $this->requestFormService->handleGetAllGrfByUser();
            $chartDatas = $this->requestFormService->handleChartDatas();
            $this->requestFormService->handleCloseThreeDay($grfs);

            return view('home.requester.index', [
                'notifications' => $notifications,
                'grf_code' => $grf_code,
                'grfsClosed' => $grfs->whereIn('status', ['closed', "reject"]),
                'grfsAvailable' => $grfs->whereNotIn('status', ["closed", "reject"]),
                "chartDatas" => $chartDatas
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
        $grf = $this->requestFormService->handleGetCurrentGrf($code);
        $requestForms = $this->requestFormService->handleShowRequestForm($code);
        $miniStocks = $this->miniStockService->handleShowMiniStock($code);

        // Return View
        return view("transaction.requester.return", [
            "grf" => $grf,
            "requestForms" => $requestForms,
            "miniStocks" => $miniStocks,
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
            $warehouses = $this->warehouseService->handleGetWareHouseByRegional(Auth::user()->regional);
            $brands = $this->brandService->handleGetAllBrand();
            $segments = $this->segmentService->handleAllSegment();
            $requestForms = $this->requestFormService->handleShowRequestForm($code);
            // dd($warehouses);
            return view("transaction.requester.show", [
                'notifications' => $notifications,
                'grf' => $grf,
                'warehouses' => $warehouses,
                'brands' => $brands,
                'segments' => $segments,
                'requestForms' => $requestForms,
            ]);
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
            return redirect()->route('request.get.detail', str_replace('/', '~', strtolower($request->grf_code)));
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }



    /*
    *|--------------------------------------------------------------------------
    *| Store GRF Draft Request Form Emergency
    *|--------------------------------------------------------------------------
    */
    public function storeEmergencyGrf(Request $request)
    {
        try {
            $this->requestFormService->handleStoreGrfEmergency($request);

            return redirect::route("request.get.emergency.detail", str_replace("/", "~", strtolower($request->grf_code)));
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }



    /*
    *|--------------------------------------------------------------------------
    *| Store Emergency GRF Document
    *|--------------------------------------------------------------------------
    */
    public function putDocumentEmergencyGRF(Request $request, $id)
    {
        try {
            $this->requestFormService->handleDocumentEmergencyGRF($request, $id);

            return redirect()->back();
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
    *| Save || Change the return Status
    *|--------------------------------------------------------------------------
    */
    public function updateReturnStock(Request $request, $id)
    {
        try {
            $isReturn = $this->miniStockService->handleUpdateReturnStock($request, $id);

            if ($isReturn == true) {
                return redirect()->route('request.get.home');
            } else {
                return redirect()->back();
            }
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
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
    *| Change the GRF status t user pickup
    *|--------------------------------------------------------------------------
    */
    public function getApprovePickup($id)
    {
        try {
            $this->requestFormService->handlePostApprovePickup($id);

            return redirect()->back();
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }



    /*
    *|--------------------------------------------------------------------------
    *| Delete selected item on the list
    *|--------------------------------------------------------------------------
    */
    public function destroyDocument($id)
    {
        try {
            $this->requestFormService->handleDeleteRequestDocument($id);

            return redirect()->back();
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }
}
