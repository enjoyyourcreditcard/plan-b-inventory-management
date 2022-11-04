<?php

namespace App\Http\Controllers;

use Throwable;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\WareHouseService;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function __construct(UserService $userService, WareHouseService $warehouseService)
    {
        $this->warehouseService = $warehouseService;
        $this->userService = $userService;
    }
    
    public function index()
    {
        try {
            $warehouse = $this->warehouseService->handleAllWareHouse();
            return view('master.user.user', [
                'warehouse' => $warehouse,
            ]);
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            $this->userService->handleStoreUser($request);
            return redirect()->back();
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
        //
    }

    public function update(Request $request)
    {
        try {
            $this->userService->handleUpdateUser($request);
            return redirect()->back();
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
}
