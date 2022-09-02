<?php

namespace App\Services;

use App\Models\Part;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PartService
{

    public function __construct(Part $part, Category $category, Brand $brand)
    {
        $this->part = $part;
        $this->brand = $brand;
        $this->category = $category;
    }

    // API Part GET
    public function handleAllPartApi()
    {
        $parts = $this->part->with('category')->with('brand')->paginate(10);
        return ($parts);
    }

    // Part SHOW
    public function handleShowPart($id)
    {
        return $this->part->with('category')->find($id);
    }

    // Part STORE 
    public function handleStorePart($request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:parts',
            'category_id' => 'required',
            'brand_id' => 'required',
            'uom' => 'required',
            'sn_status' => 'required',
            'color' => 'required',
            'size' => 'required',
            'description' => 'required|max:255',
            'note' => 'max:255',
            'img' => 'image|file|max:5120'
        ]);

        if ($request->file('img')) {
            $validatedData['img'] = $request->file('img')->store('images/part');
        } else {
            $validatedData['img'] = 'images/part/default.jpg';
        }

        Part::create($validatedData);

        return ('Data has been stored');
    }

    // Part UPDATE 
    public function handleUpdatePart($request, $id)
    {
        if ($request->file('img')) {
            if ($request->oldImg != "images/part/default.jpg") {
                Storage::delete($request->oldImg);
            }
            $newImg = $request->file('img')->store('images/part');
            $this->part->find($id)->update([
                'img' => $newImg
            ]);
        }

        $this->part->find($id)->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'uom' => $request->uom,
            'sn_status' => $request->sn_status,
            'color' => $request->color,
            'size' => $request->size,
            'description' => $request->description,
            'note' => $request->note,
        ]);

        return ('Data has been updated');
    }

    // Part DELETE
    public function handleDeactivePart($id)
    {
        $part = $this->part->find($id);
        $data = [];
        $data['status'] = 'inactive';
        $data['ended'] = now();

        $part->update($data);

        return ('Data has been deactivated');
    }

    // Part SN Status
    public function handleSnPart($id)
    {
        if ($this->part->find($id)->sn_status == "sn") {
            $ifSn = true;
        }else{
            $ifSn = false;
        }
        return($ifSn);
    }

    public function handleShowUomGroupByCategory($id)
    {
        $uomString = $this->part->find($id)->category->uom;
        $uomArray = explode(', ', $uomString);
        return($uomArray);
    }

    public function handleShowBrandGroupByCategory($id)
    {
        $category_id = $this->part->find($id)->category_id;
        $brandsPerCategory = $this->brand->where('category_id', $category_id)->get();
        $brands = $this->brand->all()->groupBy('category_id');
        $brand = [];
        foreach($brandsPerCategory as $brandPerCategory)
        {
            $brand['name'][] = $brandPerCategory->name;
            $brand['id'][] = $brandPerCategory->id;
        }
        foreach ($brands as $key => $data)
        {
            foreach ($data as $item)
            {
                $brand['nameString'][$key][] = $item->name;
                $brand['idString'][$key][] = $item->id;
            }
            $brand['nameString'][$key] = implode(', ', $brand['nameString'][$key]);
            $brand['idString'][$key] = implode(', ', $brand['idString'][$key]);
        }
        return($brand);
    }
}
