<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PartService;
use App\Services\RequestFormService;
use App\Services\NotificationService;

class RequestFormController extends Controller
{
    public function __construct(NotificationService $notificationService, RequestFormService $requestFormService, PartService $partService)
    {
        $this->notificationService = $notificationService; 
        $this->requestFormService = $requestFormService; 
        $this->partService = $partService; 
    }

    public function index ()
    {
        $notifications =  $this->notificationService->handleAllNotification();
        $requestForms = $this->requestFormService->handleAllRequestForm();
        $parts = $this->partService->handleAllPart();
        return view('transaction.request_form.request_form', [
            'notifications' => $notifications,            
            'requestForms' => $requestForms,
            'parts' => $parts
        ]);   
    }

    public function store (Request $request)
    {
        $this->requestFormService->handleStoreRequestForm($request);
        return redirect()->back();
    }
}
