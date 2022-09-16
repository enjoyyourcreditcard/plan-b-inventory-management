<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PartService;
use App\Services\BrandService;
use App\Services\WarehouseService;
use App\Services\RequestFormService;
use App\Services\NotificationService;

class RequestFormController extends Controller
{
    public function __construct(NotificationService $notificationService, RequestFormService $requestFormService, PartService $partService, BrandService $brandService, WarehouseService $warehouseService)
    {
        $this->notificationService = $notificationService; 
        $this->requestFormService = $requestFormService; 
        $this->partService = $partService; 
        $this->brandService = $brandService; 
        $this->warehouseService = $warehouseService; 
    }

    public function index ()
    {
        $notifications =  $this->notificationService->handleAllNotification();
        $requestForms = $this->requestFormService->handleGetByUserGrfRequestForm();
        $grf_code = $this->requestFormService->handleGenerateGrfCode();
        return view('transaction.request_form.request_form', [
            'notifications' => $notifications,            
            'requestForms' => $requestForms,
            'grf_code' => $grf_code
        ]);   
    }

    public function create ($grf_code)
    {
        $notifications =  $this->notificationService->handleAllNotification();
        $requestForms = $this->requestFormService->handleShowRequestForm($grf_code);
        $brands = $this->brandService->handleGetAllBrand();
        $parts = $this->partService->handleAllPart();
        $warehouses = $this->warehouseService->handleAllWareHouse();
        // return ($parts);
        return view('transaction.request_form.create', [
            'notifications' => $notifications,            
            'requestForms' => $requestForms,
            'parts' => $parts,
            'brands' => $brands,
            'warehouses' => $warehouses
        ]);   
    }

    public function ajaxIndex ()
    {
        $parts = $this->partService->handleNameIdPart();
        return response()->json($parts);
    }

    public function store (Request $request)
    {
        $this->requestFormService->handleStoreRequestForm($request);
        return redirect('/request-form/' . str_replace('/', '~', strtolower($request->grf_code)));
    }

    public function update (Request $request)
    {
        $this->requestFormService->handleUpdateRequestForm($request);
        return redirect()->back();
    }
}
