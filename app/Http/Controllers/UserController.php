<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use App\Services\WareHouseService;
use Illuminate\Http\Request;
use Throwable;

class UserController extends Controller
{
    public function __construct(UserService $userService, WareHouseService $warehouseService)
    {
        $this->warehouseService = $warehouseService;
        $this->userService = $userService;
    }
    
    public function index()
    {
        $warehouse = $this->warehouseService->handleAllWareHouse();
        return view('master.user', [
            'warehouse' => $warehouse,
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // dd($request);
        $this->userService->handleStoreUser($request);
        return redirect()->back();
        // return ('tes');
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
        $this->userService->handleUpdateUser($request);
        return redirect()->back();
    }

    public function postStatus(Request $request)
    {
        $this->userService->handleStatus($request->id);
        return redirect()->back();
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
