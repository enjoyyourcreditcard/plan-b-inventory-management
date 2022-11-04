<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;
use App\Services\WarehouseService;
use Illuminate\Support\Facades\Redirect;

class WarehouseController extends Controller
{

    public function __construct(WareHouseService $warehouseService)
    {
        $this->warehouseService = $warehouseService;
    }

    public function index(){
        $warehouse = $this->warehouseService->handleAllWareHouse();
        return view('master.warehouse.index', compact('warehouse'));
    }
    
    public function getAllWarehouse()
    {
        return ResponseJSON($this->warehouseService->handleAllWareHouse(), 200);
    }

    public function create()
    {
        try {
            return view('master.warehouse.create');
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }


    public function store(Request $request){
        $this->warehouseService->handleStoreWareHouse($request);
        return redirect('/warehouse');
    }
    
    public function edit($id)
    {        
        try {
            $warehouse = $this->warehouseService->handleEditWarehouse($id);
            return view('master.warehouse.edit', ['warehouse' => $warehouse]);
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }
    
    public function update(Request $request, $id){
        try {
            $this->warehouseService->handleUpdateWareHouse($request, $id);
        return redirect('/warehouse');
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    public function postStatus(Request $request)
    {
        try {
            $this->warehouseService->handleStatus($request);
            return redirect('/warehouse');
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

}
