<?php

namespace App\Services;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class WareHouseService{

    public function __construct(warehouse $warehouse)
    {
        $this->warehouse = $warehouse;
    }

    public function handleAllWareHouse()
    {
        $warehouse = Warehouse::all();
        return($warehouse);
    }

    public function handleStoreWareHouse(Request $request)
    {
        $warehouse = $this->warehouse->create([
            'wh_name' => $request->wh_name,
            'regional' => $request->regional,
            'kota' => $request->kota,
            'location' => $request->location,
            'wh_type' => $request->wh_type,
            'contract_status' => $request->contract_status,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'status' => "active",
        ]);
        return($warehouse);
    }

    public function handleUpdateWareHouse(Request $request, $id){
        $this->warehouse->find($id)->update([
            'wh_name' => $request->wh_name,
            'regional' => $request->regional,
            'kota' => $request->kota,
            'location' => $request->location,
            'wh_type' => $request->wh_type,
            'contract_status' => $request->contract_status,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            ]);
            return('');
    }

    public function inActive($id){
        $warehouse = $this->warehouse->find($id); 
        $data = []; 
        $data['status'] = 'inactive'; 
        $warehouse->update($data); 
        return('');
    }

}