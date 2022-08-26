<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Services\BrandService;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }

    public function index()
    {
        $brands = $this->brandService->handleAllBrand();
        return view('brand.brand', [
            'brands' => $brands
        ]);
    }

    public function store(Request $request)
    {
        $this->brandService->handleStoreBrand($request);
        return redirect('/brand');
    }

    public function update(Request $request, $id)
    {
        $brand = $this->brandService->handleUpdateBrand($request, $id);
        return redirect('/brand');
    }

    public function deactive($id)
    {
        $this->brandService->handleDeactiveBrand($id);
        return back();
    }

    public function getAllBrand()
    {
        return ResponseJSON($this->brandService->handleAllBrand(), 200);
    }

    public function postStoreBrand(Request $request)
    {
        return ResponseJSON($this->brandService->handleStoreBrand($request), 200);
    }

    public function putUpdateBrand(Request $request, $id)
    {
        return ResponseJSON($this->brandService->handleUpdateBrand($request, $id), 200);
    }

    public function getDeactiveBrand($id)
    {
        return ResponseJSON($this->brandService->handleDeactiveBrand($id), 200);
    }
}
