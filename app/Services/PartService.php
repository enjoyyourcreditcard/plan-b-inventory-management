<?php

namespace App\Services;

use App\Models\Part;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PartService
{

    public function __construct(Part $part)
    {
        $this->part = $part;
    }

    // API Part GET
    public function handleAllPartApi()
    {
        $parts = $this->part->with('category')->paginate(10);

        return ($parts);
    }

    // Part GET
    public function handleAllPart()
    {
        $part = $this->part->all();
        return ($part);
    }
    

    // Part SHOW
    public function handleShowPart($id)
    {
        // 'part' => ,
        return $this->part->with('category')->find($id);
        
        // return view('part.detail', [
        // 'part' => $this->part->find($id),
        //     'categories' => $this->category->all()
        // ]);
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

        dd($request->file('img'));
        if ($request->file('img')) {
            $request->file('img')->move('images/part', $request->file('img')->getClientOriginalName());
            $validatedData['img'] = "images/part/".$request->file('img')->getClientOriginalName();
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
            'brand' => $request->brand,
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
}
