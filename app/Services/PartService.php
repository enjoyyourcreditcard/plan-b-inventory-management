<?php

namespace App\Services;

use App\Models\Part;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PartService
{

    public function __construct(Part $part, Category $category)
    {
        $this->part = $part;
        $this->category = $category;
    }

    // API Part GET
    public function handleAllPartApi()
    {
        $parts = $this->part->with('category')->paginate(10);

        return($parts);
    }

    // Part GET
    public function handleAllPart()
    {
        $parts = $this->part->all();
        $categories = $this->category->with('parts')->get();

        return view('part.part', [
            'parts' => $parts,
            'categories' => $categories
        ]);
    }

    // Part SHOW
    public function handleShowPart($id)
    {
        return view('part.detail', [
            'part' => $this->part->find($id),
            'categories' => $this->category->all()
        ]);
    }

    // Part STORE 
    public function handleStorePart($request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:parts',
            'category_id' => 'required',
            'brand' => 'required',
            'uom' => 'required',
            'sn_status' => 'required',
            'color' => 'required',
            'size' => 'required',
            'description' => 'required|max:255',
            'note' => 'max:255',
            'img' => 'image|file|max:5120'
        ]);

        if ($request->file('img'))
        {
            $validatedData['img'] = $request->file('img')->store('images/part');
        }else{
            $validatedData['img'] = 'images/part/default.jpg';
        }

        $validatedData['status'] = 'active';

        Part::create($validatedData);

        return('Data has been stored');
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
            'brand' => $request->brand,
            'uom' => $request->uom,
            'sn_status' => $request->sn_status,
            'color' => $request->color,
            'size' => $request->size,
            'description' => $request->description,
            'note' => $request->note,
        ]);
        
        return('Data has been updated');
    }

    // Part DELETE
    public function handleDeactivePart($id)
    {
        $part = $this->part->find($id);
        $data = [];
        $data['status'] = 'inactive';
        $data['ended'] = now();

        $part->update($data);

        return('Data has been deactivated');
    }
}
