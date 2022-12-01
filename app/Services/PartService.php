<?php

namespace App\Services;

use App\Models\Part;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Grf;
use App\Models\RequestForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PartService
{

    public function __construct(Part $part, Category $category, Brand $brand,RequestForm $requestForm)
    {
        $this->part = $part;
        $this->brand = $brand;
        $this->category = $category;
        $this->requestForm = $requestForm;
    }

    // API Part GET
    public function handleAllPartApi($req)
    {
        $category_id = $req->category_id;
        $parts = $this->part->with('segment.category', 'brand')->withCount('stocks')->when($category_id, function ($query) use ($category_id) {
                return $query->whereHas('segment', function ($query) use ($category_id) {
                    $query->where('category_id', $category_id);
                });
            })->where('status','active')->orderByDesc('id')->get();
        return ($parts);
    }

    // Part GET
    public function handleAllPart()
    {
        $parts = $this->part->all();
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
            'segment_id' => 'required',
            'brand_id' => 'required',
            'uom' => 'required',
            'sn_status' => 'required',
            'color' => 'required',
            'size' => 'required',
            'description' => 'required|max:255',
            'note' => 'max:255',
            'img' => 'nullable|file|max:5120'
        ]);

        $validatedData['brand_name'] = $this->brand->find($validatedData['brand_id'])->name;

        if ($request->file('img')) {
            $validatedData['img'] = 'storage/' . $request->file('img')->store('images/part');
        } else {
            $validatedData['img'] = 'images/part/default.jpg';
        }

        Part::create($validatedData);

        return ('Data has been stored');
    }

    // Show Data Part For Edit Page
    public function handleTampilanPart($id)
    {
        $parts = $this->part->with("category", "brand", "requestForms")->find($id);
        return($parts);
        
    }

    // Part UPDATE 
    public function handleUpdatePart($request, $id)
    {
        if ($request->file('img')) {
            if ($request->oldImg != "images/part/default.jpg") {
                Storage::delete($request->oldImg);
            }
            $newImg = 'storage/' . $request->file('img')->store('images/part');
            $this->part->find($id)->update([
                'img' => $newImg
            ]);
        }

        $this->part->find($id)->update([
            'name' => $request->name,
            'segment_id' => $request->segment_id,
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
    public function handleDeactivePart($req)
    {

        $validatedData = $req->validate([
            'id' => 'required'
        ]);
        $part = $this->part->find($validatedData['id']);
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
        } else {
            $ifSn = false;
        }
        return ($ifSn);
    }

    public function handleShowUomGroupByCategory($id)
    {
        $uomString = $this->part->with('segment.category')->find($id)->segment->category->uom;
        $uomArray = explode(', ', $uomString);
        return ($uomArray);
    }


    public function handleGetAllPartsByGRF($id)
    {
        $result = collect();
        $requestForm = $this->requestForm->where('grf_id',$id)->get();
        dd($requestForm);

        // $this->requestForm
    }



    public function handleGetAllPartsBySegment($id)
    {
        $parts = $this->part->where("segment_id",$id)->get();
        return ($parts);
    }

    public function handleShowBrandGroupByCategory($id)
    {
        $segment_id = $this->part->with('segment.category')->find($id)->segment->id;
        $brandsPerCategory = $this->brand->where('segment_id', $segment_id)->get();
        $brands = $this->brand->all()->groupBy('segment_id');
        $brand = [];
        foreach ($brandsPerCategory as $brandPerCategory) {
            $brand['name'][] = $brandPerCategory->name;
            $brand['id'][] = $brandPerCategory->id;
        }
        foreach ($brands as $key => $data) {
            foreach ($data as $item) {
                $brand['nameString'][$key][] = $item->name;
                $brand['idString'][$key][] = $item->id;
            }
            $brand['nameString'][$key] = implode(', ', $brand['nameString'][$key]);
            $brand['idString'][$key] = implode(', ', $brand['idString'][$key]);
        }
        return ($brand);
    }

    public function handleNameIdPart()
    {
        $parts = $this->part->with('requestForms')->get(['id', 'name as text', 'im_code', 'uom']);
        return ($parts);
    }

    
}
