<?php

namespace App\Services;

use App\Models\Vendor;

class VendorService
{
    public function __construct(Vendor $vendor)
    {
        $this->vendor = $vendor;
    }

    public function handleGetAllVendor()
    {
        $data = $this->vendor->get();
        return $data;
    }

    public function handleGetVendor($id)
    {
        $data = $this->vendor->find($id);
        return $data;
    }

    public function handleStoreVendor($request)
    {
        $data = $request->validate([
            'name' => 'required|unique:vendors',
            'start_at' => 'required',
            'end_at' => 'required',
            'status' => '',
        ]);

        $data['status'] = 'active';

        $vendor = $this->vendor->create($data);
        return($vendor);
    }

    public function handleUpdateVendor($request)
    {
        $data = $this->vendor->find($request->id)->update([
            'name' => $request->name,
            'start_at' => $request->start_at,
            'end_at' => $request->end_at,
        ]);

        return($data);
    }

    public function handleStatus($request)
    {
        # code...
    }
}
