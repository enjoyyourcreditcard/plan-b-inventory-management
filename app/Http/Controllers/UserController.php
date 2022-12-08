<?php

namespace App\Http\Controllers;

use Throwable;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\VendorService;
use App\Services\WareHouseService;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function __construct(UserService $userService, WareHouseService $warehouseService, VendorService $vendorService)
    {
        $this->warehouseService = $warehouseService;
        $this->userService = $userService;
        $this->vendorService = $vendorService;
    }
    
    public function index()
    {
        try {
            return view('master.user.index');
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    public function create()
    {
        try {
            $vendor = $this->vendorService->handleGetAllVendor();
            $warehouse = $this->warehouseService->handleAllWareHouse();
            return view('master.user.create', [
                'warehouse' => $warehouse,
                'vendor' => $vendor,
            ]);
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            $this->userService->handleStoreUser($request);
            return redirect('/user');
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        try { 
            $user = $this->userService->handleGetUser($id);
            $vendor = $this->vendorService->handleGetAllVendor();
            $warehouse = $this->warehouseService->handleAllWareHouse();
            return view('master.user.edit', [
                'warehouse' => $warehouse,
                'user' => $user,
                'vendor' => $vendor,
            ]);
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {
            $this->userService->handleUpdateUser($request);
            return redirect('/user');
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }
  
    public function postStatus(Request $request)
    {
        try {
            $this->userService->handleStatus($request->id);
            return redirect()->back();
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    /* 
    *|--------------------------------------------------------------------------
    *| Api Get All User  
    *|--------------------------------------------------------------------------
    */
    public function getAllUser(Request $req)
    {
        return ResponseJSON($this->userService->handleAllUserApi($req), 200);
    } 

    // profile
    public function indexProfile()
    {
        $userProfile = $this->userService->handleAllUserProfile();
        return view('profile', [
            'userProfile' => $userProfile,
        ]);

    }
}
