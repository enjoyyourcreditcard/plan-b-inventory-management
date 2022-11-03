<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Services\BrandService;
use App\Services\SegmentService;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    public function __construct(BrandService $brandService, SegmentService $segmentService)
    {
        $this->segmentService = $segmentService;
        $this->brandService = $brandService;
    }

    public function index()
    {
        $brands = $this->brandService->handleAllBrand();
        return view('master.brand.index', [
            'brands' => $brands
        ]);
    }

    public function create()
    {
        try {
            $segments = $this->segmentService->handleAllSegment();
            return view('master.brand.create', ['segments' => $segments]);
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            $this->brandService->handleStoreBrand($request);
            return redirect('brand');
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $brand = $this->brandService->handleEditBrand($id);
            $segments = $this->segmentService->handleAllSegment();
            return view('master.brand.edit', ['brand' => $brand, 'segments' => $segments]);
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $brand = $this->brandService->handleUpdateBrand($request, $id);
        return redirect('/brand');
    }

    public function postDeactive($id)
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

    public function getAllBrandForSelect()
    {
        $category = $this->brandService->handleGetAllBrandForSelect();
        $result = [];
        foreach ($category as $item) {
            $result[] = $item->name;
        }
        return ResponseJSON($result,200);
    }
    
}
