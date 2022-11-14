<?php

namespace App\Services;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class WareHouseService
{

    public function __construct(warehouse $warehouse)
    {
        $this->warehouse = $warehouse;
    }

    public function handleAllWareHouse()
    {
        $warehouse = Warehouse::all();
        return ($warehouse);
    }

    public function handleGetWareHouseByRegional($regional)
    {
        $warehouse = Warehouse::where('regional', $regional)->get();
        return ($warehouse);
    }

    public function handleStoreWareHouse(Request $request)
    {
        if ($request->expired == null) {
            $request['expired'] = "-";
        }
        $warehouse = $this->warehouse->create([
            'name' => $request->name,
            'regional' => $request->regional,
            'city' => $request->city,
            'location' => $request->location,
            'type' => $request->type,
            'contract_status' => $request->contract_status,
            'expired' => $request->expired,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'status' => "active",
        ]);
        return ($warehouse);
    }

    public function handleEditWarehouse($id)
    {
        $data = $this->warehouse->find($id);
        return $data;
    }

    public function handleUpdateWareHouse(Request $request, $id)
    {
        $this->warehouse->find($id)->update([
            'name' => $request->name,
            'regional' => $request->regional,
            'city' => $request->city,
            'location' => $request->location,
            'type' => $request->type,
            'contract_status' => $request->contract_status,
            'expired' => $request->expired,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
            'lat' => $request->lat,
            'lng' => $request->lng,
        ]);
        return ('');
    }

    // public function inActive($id){
    //     $warehouse = $this->warehouse->find($id); 
    //     $data = []; 
    //     $data['status'] = 'inactive'; 
    //     $warehouse->update($data); 
    //     return('');
    // }

    public function handleStatus($request)
    {
        $warehouse = $this->warehouse->find($request->id);
        if ($warehouse->status == 'active') {
            $warehouse->status = 'inactive';
            $warehouse->save();
            return $warehouse;
        } else {
            $warehouse->status = 'active';
            $warehouse->save();
            return $warehouse;
        }
    }
}
