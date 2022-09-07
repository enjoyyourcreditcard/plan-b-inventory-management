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
        if($request->tenggat_waktu == null){
            $request['tenggat_waktu'] = "-";
        }
        $warehouse = $this->warehouse->create([
            'name' => $request->name,
            'regional' => $request->regional,
            'city' => $request->city,
            'location' => $request->location,
            'type' => $request->type,
            'contract_status' => $request->contract_status,
            'tenggat_waktu' => $request->tenggat_waktu,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'status' => "active",
        ]);
        return($warehouse);
    }

    public function handleUpdateWareHouse(Request $request, $id){
        $this->warehouse->find($id)->update([
            'name' => $request->name,
            'regional' => $request->regional,
            'city' => $request->city,
            'location' => $request->location,
            'type' => $request->type,
            'contract_status' => $request->contract_status,
            'tenggat_waktu' => $request->tenggat_waktu,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'lat' => $request->lat,
            'lng' => $request->lng,
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