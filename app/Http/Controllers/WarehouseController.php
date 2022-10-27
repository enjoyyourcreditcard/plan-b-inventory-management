<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;
use App\Services\WarehouseService;

class WarehouseController extends Controller
{

    public function __construct(WareHouseService $warehouseService)
    {
        $this->warehouseService = $warehouseService;
    }

    public function index(){
        $warehouse = $this->warehouseService->handleAllWareHouse();
        return view('master.warehouse', compact('warehouse'));
    }
    
    public function getAllWarehouse()
    {
        return ResponseJSON($this->warehouseService->handleAllWareHouse(), 200);
    }


    public function store(Request $request){
        $this->warehouseService->handleStoreWareHouse($request);
        return redirect('/warehouse');
    }
    
   
    public function inActive($id){
        $this->warehouseService->inActive($id);
        return redirect('/warehouse');
    }

    public function update(Request $request, $id){
        $this->warehouseService->handleUpdateWareHouse($request, $id);
        return redirect('/warehouse');
    }
}
