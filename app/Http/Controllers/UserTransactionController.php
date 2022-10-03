<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PartService;
use App\Services\BrandService;
use App\Services\WarehouseService;
use App\Services\RequestFormService;
use App\Services\NotificationService;
use App\Services\SegmentService;

class UserTransactionController extends Controller
{
    public function __construct(SegmentService $segmentService, NotificationService $notificationService, RequestFormService $requestFormService, PartService $partService, BrandService $brandService, WarehouseService $warehouseService)
    {
        $this->notificationService = $notificationService; 
        $this->requestFormService = $requestFormService; 
        $this->partService = $partService; 
        $this->brandService = $brandService; 
        $this->segmentService = $segmentService;
        $this->warehouseService = $warehouseService; 
    }

    public function index ()
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

    public function create ($code)
    {

        $notifications =  $this->notificationService->handleAllNotification();
        $grf = $this->requestFormService->handleGetCurrentGrf($code);
        $requestForms = $this->requestFormService->handleShowRequestForm($code);
        $brands = $this->brandService->handleGetAllBrand();
        $segment = $this->segmentService->handleAllSegment();
        $warehouses = $this->warehouseService->handleAllWareHouse();
        return view('transaction.request_form.create', [
            'notifications' => $notifications,            
            'requestForms' => $requestForms,
            'segment' => $segment,
            'brands' => $brands,
            'warehouses' => $warehouses,
            'grf' => $grf
        ]);
    }

    public function store (Request $request, $id)
    {

        $this->requestFormService->handleStore($request, $id);
        return redirect()->back();
    
    }

    public function storeGrf (Request $request)
    {

        $this->requestFormService->handleStoreGrf($request);
        return redirect('/request-form/' . str_replace('/', '~', strtolower($request->grf_code)));
    }

    public function update (Request $request, $id)
    {

        $this->requestFormService->handleUpdateRequestForm($request, $id);
    
        return redirect()->route('get.requester.home');
    }

    public function destroy ($id) {

        $this->requestFormService->handleDeleteRequestForm($id);
        return redirect()->back();
    }
}
