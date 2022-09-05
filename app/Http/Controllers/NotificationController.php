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
    
    public function index()
    {
        $notifications =  $this->notificationService->handleAllNotification();
        return view('part.activity', [
            'notifications' => $notifications
        ]);
    }
    
    public function destroy($id)
    {
    
        $this->notificationService->handleDeleteNotification($id);

        return redirect('/part');

    }
    
    // API
    
    public function getAllNotification(Request $request)
    {
        return ResponseJSON($this->notificationService->handleAllNotificationApi($request), 200);
    }

    public function postStoreNotification(Request $request)
    {
        return ResponseJSON($this->notificationService->handleStoreNotificationApi($request), 200);
    }

    public function putUpdateNotification(Request $request, $id)
    {
        return ResponseJSON($this->notificationService->handleUpdateNotificationApi($request, $id), 200);
    }

    public function getDeleteNotification($id)
    {
        return ResponseJSON($this->notificationService->handleDeleteNotificationApi($id), 200);
    }
}
