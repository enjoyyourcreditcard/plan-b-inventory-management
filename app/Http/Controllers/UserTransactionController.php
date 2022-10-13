<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PartService;
use App\Services\BrandService;
use App\Services\MiniStockService;
use App\Services\WarehouseService;
use App\Services\RequestFormService;
use App\Services\TransactionService;
use App\Services\NotificationService;

class UserTransactionController extends Controller
{
    public function __construct(NotificationService $notificationService, RequestFormService $requestFormService, PartService $partService, BrandService $brandService, WarehouseService $warehouseService, MiniStockService $miniStockService)
    {
        $this->notificationService = $notificationService; 
        $this->requestFormService = $requestFormService;
        $this->partService = $partService; 
        $this->brandService = $brandService; 
        $this->warehouseService = $warehouseService;
        $this->miniStockService = $miniStockService;
    }

    /*
    |--------------------------------------------------------------------------
    | Index Request Form
    |--------------------------------------------------------------------------
    */
    public function index ()
    {
        // Services
        $notifications =  $this->notificationService->handleAllNotification();
        $requestForms = $this->requestFormService->handleGetByUserRequestForm();
        $grf_code = $this->requestFormService->handleGenerateGrfCode();

        // Return View
        return view('transaction.request_form.request_form', [
            'notifications' => $notifications,            
            'requestForms' => $requestForms,
            'grf_code' => $grf_code
        ]);   
    }

    /*
    |--------------------------------------------------------------------------
    | Show Return Stock
    |--------------------------------------------------------------------------
    */
    public function showReturnStock ($code)
    {
        // Services
        $miniStocks = $this->miniStockService->handleShowMiniStock ($code);
        $requestForms = $this->requestFormService->handleShowRequestForm ($code);
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
    public function ajaxReturnStock ($code)
    {
        // Services
        $miniStocks = $this->miniStockService->handleShowMiniStock ($code);

        // Return View
        return response()->JSON($miniStocks->where('condition', '!=', null)->groupby('category'));
    }

    /*
    |--------------------------------------------------------------------------
    | Create Request Form
    |--------------------------------------------------------------------------
    */
    public function create ($code)
    {
        // Services
        $notifications =  $this->notificationService->handleAllNotification();
        $grf = $this->requestFormService->handleGetCurrentGrf($code);
        $timeline = $this->requestFormService->handleTimelineGrf($grf);
        $requestForms = $this->requestFormService->handleShowRequestForm($code);
        $brands = $this->brandService->handleGetAllBrand();
        $parts = $this->partService->handleAllPart();
        $warehouses = $this->warehouseService->handleAllWareHouse();

        // Return View
        return view('transaction.request_form.create', [
            'notifications' => $notifications,            
            'requestForms' => $requestForms,
            'parts' => $parts,
            'brands' => $brands,
            'warehouses' => $warehouses,
            'grf' => $grf
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Store Request Form
    |--------------------------------------------------------------------------
    */
    public function store (Request $request, $id)
    {
        // Services
        $this->requestFormService->handleStore($request, $id);
        
        // Return View
        return redirect()->back();
    }

    /*
    |--------------------------------------------------------------------------
    | Store GRF Draft Request Form
    |--------------------------------------------------------------------------
    */
    public function storeGrf (Request $request)
    {
        // Services
        $this->requestFormService->handleStoreGrf($request);

        // Return View
        return redirect('/request-form/' . str_replace('/', '~', strtolower($request->grf_code)));
    }

    /*
    |--------------------------------------------------------------------------
    | Update Status Request Form
    |--------------------------------------------------------------------------
    */
    public function update (Request $request, $id)
    {
        // Services
        $this->requestFormService->handleUpdateRequestForm($request, $id);

        // Return View
        return redirect()->back();
    }

    /*
    |--------------------------------------------------------------------------
    | Update Submit Return Stock
    |--------------------------------------------------------------------------
    */
    public function updateReturnStock (Request $request, $id)
    {
        // Services
        $this->miniStockService->handleUpdateReturnStock($request, $id);

        // Return View
        return redirect('/request-form');
    }

    /*
    |--------------------------------------------------------------------------
    | Delete Request Form
    |--------------------------------------------------------------------------
    */
    public function destroy ($id)
    {
        // Services
        $this->requestFormService->handleDeleteRequestForm($id);

        // Return View
        return redirect()->back();
    }
}
