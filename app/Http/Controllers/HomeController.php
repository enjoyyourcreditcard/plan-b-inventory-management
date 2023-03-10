<?php

namespace App\Http\Controllers;

use App\Services\NotificationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(NotificationService $notificationService)
    {
        $this->notificationService = $notificationService;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $notifications =  $this->notificationService->handleAllNotification();
        if (Auth::user()->role == 'requester') {
            return redirect()->route('request.get.home');
        }

        if (Auth::user()->role == 'warehouse') {
            return redirect()->route('warehouse.get.dashboard');
        }

        return view('home', ['notifications' => $notifications]);
    }
}
