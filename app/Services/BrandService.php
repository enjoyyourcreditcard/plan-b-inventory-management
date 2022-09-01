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

    public function handleGetAllBrand()
    {
        $brands = $this->brand->all();
        return ($brands);
    }

    public function handleAllBrand()
    {
        $brands = $this->brand->paginate(5);
        return ($brands);
    }

    public function handleStoreBrand(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'name' => 'required|unique:brands',
            'category_id' => 'required',
        ]);

        $validatedData['status'] = 'active';

        $this->brand->create($validatedData);
        return ('Data has been stored');
    }

    public function handleUpdateBrand(Request $request, $id)
    {
        $brand = $this->brand->find($id)->update($request->all());
        return ($brand);
    }

    public function handleDeactiveBrand($id)
    {
        $brand = $this->brand->find($id);
        $brand->status = 'inactive';
        $brand->save();
        return ($brand);
    }
}
