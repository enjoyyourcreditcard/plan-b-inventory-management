<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\VendorService;
use Illuminate\Support\Facades\Redirect;

class VendorController extends Controller
{
    public function __construct(VendorService $vendorService)
    {
        $this->vendorService = $vendorService;
    }

    public function index()
    {
        try {
            $vendors = $this->vendorService->handleGetAllVendor();
            return view('master.vendor.index', [
                'vendors' => $vendors,
            ]);
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    public function create()
    {
        try {
            return view('master.vendor.create');
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }
    
    public function store(Request $request)
    {
        try {
            $this->vendorService->handleStoreVendor($request);
            return redirect('/vendor');
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }
    
    public function edit($id)
    {
        try {
            $vendor = $this->vendorService->handleGetVendor($id);
            return view('master.vendor.edit', [
                'vendor' => $vendor,
            ]);
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    public function update(Request $request)
    {
        try {
            $this->vendorService->handleUpdateVendor($request);
            return redirect('/vendor');
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    public function getAllVendor()
    {
        try {
            return ResponseJSON($this->vendorService->handleGetAllVendor(), 200);
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    public function Status(Request $request)
    {
        $this->vendorService->handleStatus($request);
    }
}
