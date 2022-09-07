<?php

namespace App\Services;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class NotificationService
{

    public function __construct(Notification $notification)
    {
        $this->notification = $notification;
    }

    public function handleAllNotification()
    {
        $notification = $this->notification->where('user_id',1)->latest()->get();
        return($notification);

    }

    public function handleStoreNotification(Request $request)
    {
        $notification = $this->notification->create($request->all());
        return($notification);
    }

    public function handleUpdateNotification(Request $request, $id)
    {
        $notification = $this->notification->find($id)->update($request->all());
        return($notification);
    }
    
    public function handleDeactiveNotification($id)
    {
        $notification = $this->brand->find($id);
        $notification->status = 'read';
        $notification->save();
        return($notification);
    }

    public function handleAllNotificationApi(Request $request)
    {   
        $user_id = $request->input('user_id');
        $status = $request->input('status');
        $created_at = $request->input('created_at');

        $notification = $this->notification
        ->when($user_id, function ($query, $user_id){
            return $query->where('user_id', $user_id);
        })
        ->when($status, function ($query, $status){
            return $query->where('status', $status);
        })
        ->when($created_at, function ($query, $created_at){
            return $query->orderBy('created_at', $created_at);
        })
        ->get();

        return($notification);
    }

    public function handleStoreNotificationApi(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'title' => 'required',
            'content' => 'required',
            'status' => 'required',
        ]);

        $this->notification->create($validatedData);
        return ('Data has been stored');
    }

    public function handleUpdateNotificationApi(Request $request, $id)
    {
        $this->notification->find($id)->update([
            'status' => $request->status,
        ]);
        return ('Data has been updated');
    }

    public function handleDeleteNotificationApi($id)
    {
        $brand = $this->brand->find($id);
        $brand->status = 'read';
        $brand->save();
        return($brand);
    }
    
}