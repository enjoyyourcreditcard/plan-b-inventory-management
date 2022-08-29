<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Services\NotificationService;

class NotificationController extends Controller
{
    // view

    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
    }
    
    // public function index()
    // {
    //     $notifications =  $this->notificationService->handleAllNotification();
    //     return view('layouts.main', [
    //         'notifications' => $notifications
    //     ]);
    // }
    
    public function destroy($id)
    {
    
        $this->notificationService->handleDeleteNotification($id);

        return redirect('/part');

    }
    
    // API
    
    public function getAllNotification()
    {
        return ResponseJSON($this->notificationService->handleAllNotification(), 200);
    }

    public function postStoreNotification(Request $request)
    {
        return ResponseJSON($this->notificationService->handleStoreNotification($request), 200);
    }

    public function putUpdateNotification(Request $request, $id)
    {
        return ResponseJSON($this->notificationService->handleUpdateNotification($request, $id), 200);
    }

    public function getDeleteNotification($id)
    {
        return ResponseJSON($this->notificationService->handleDeleteNotification($id), 200);
    }
}
