<?php

namespace App\Services;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandService
{
    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }

    public function handleAllBrand()
    {
        $brands = $this->brand->paginate(5);
        return($brands);
    }

    public function handleStoreBrand(Request $request)
    {
        $brand = $this->brand->create($request->all());
        return($brand);
    }

    public function handleUpdateBrand(Request $request, $id)
    {
        $brand = $this->brand->find($id)->update($request->all());
        return($brand);
    }

    public function handleDeactiveBrand($id)
    {
        $brand = $this->brand->find($id);
        $brand->status = 'inactive';
        $brand->save();
        return($brand);
    }
}