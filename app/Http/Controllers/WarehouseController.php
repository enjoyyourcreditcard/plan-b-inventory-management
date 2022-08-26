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
        // return('1234567890');
        $warehouse = $this->warehouseService->handleAllWareHouse();
        return view('warehouse.warehouse', compact('warehouse'));
    }

    public function store(Request $request){
        // return('1234567890');
        $this->warehouseService->handleStoreWareHouse($request);
        return redirect('/warehouse');
    }
    
    public function inActive($id){
        $this->warehouseService->inActive($id);
        return redirect('/warehouse');
    }

    public function update(Request $request, $id){
        // return($request);
        $this->warehouseService->handleUpdateWareHouse($request, $id);
        return redirect('/warehouse');
    }
}
