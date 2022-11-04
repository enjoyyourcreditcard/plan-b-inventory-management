<?php

namespace App\Http\Controllers;

use App\Services\NotificationService;
use Illuminate\Http\Request;
use App\Services\PartService;
use App\Services\RequestService;
use App\Services\SegmentService;
use App\Services\WareHouseService;

class RequestController extends Controller
{
    public function __construct(SegmentService $segmentService, RequestService $requestService, PartService $partService, WareHouseService $warehouseService, NotificationService $notificationService)
    {
        $this->requestService = $requestService; 
        $this->partService = $partService; 
        $this->warehouseService = $warehouseService;
        $this->notificationService = $notificationService;
    }

    public function index ()
    {
        $notifications =  $this->notificationService->handleAllNotification();
        $requests = $this->requestService->handleAllRequest();
        $parts = $this->partService->handleAllPart();
        $maxReq = $this->requestService->handleMaximumRequest(); //
        return view('home.requester.index', [
            'notifications' => $notifications,            
            'requester' => $requests,
            'parts' => $parts,
            'maxReq' => $maxReq,
        ]);   
    }

    // API
    
    public function getAllRequest(Request $request)
    {
        return ResponseJSON($this->requestService->handleAllRequestApi($request), 200);
    }

    public function postStoreRequest(Request $request)
    {
        return ResponseJSON($this->requestService->handleStoreRequestApi($request), 200);
    }

    public function putUpdateRequest(Request $request, $id)
    {
        return ResponseJSON($this->requestService->handleUpdateRequestApi($request, $id), 200);
    }

    public function getDeleteRequest($id)
    {
        return ResponseJSON($this->requestService->handleInactiveRequestApi($id), 200);
    }
}
