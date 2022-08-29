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
        $notification = $this->notification->paginate(5);
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


    public function handleUpdateCategory($request)
    {
        $this->category->find($request->id)->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        return('Data has been updated');
    }
    
    public function handleDeleteNotification($id)
    {
        $data = $this->notification::find($id);
        $data->delete();


        return($data);

    }
    
}