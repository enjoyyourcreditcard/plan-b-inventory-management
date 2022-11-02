<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryService
{

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    // Category STORE 
    public function handleStoreCategory($request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:categories',
            'description' => 'required|max:255',
        ]);

        $validatedData['name'] = strtoupper($request->name);
        $validatedData['uom'] = implode(', ', $request->uom);
        $validatedData['started'] = now();
        $validatedData['status'] = 'active';
        $data = $this->category->create($validatedData);
        if ($request->isAjax == 'yep') {
            return ResponseJSON($data, 200);
        }else{
            // return redirectTab("tabs-category");
            return redirect("/category");
        }
    }

    // Category INDEX
    public function handleGetAllCategory()
    {
        return $this->category::with('segments.parts')->get();
    }

    // Category Name Only
    public function handleGetAllCategoryForSelect()
    {
        return $this->category->select("name")->get();
    }

    // Category SHOW
    public function handleShowCategory($id)
    {
        return $this->category->with('segments.parts')->with('segments.brands')->find($id);
    }

    // Counting Part by Category
    public function handlePartCount($id)
    {
        $category = $this->category->with('segments.parts')->with('segments.brands')->find($id);
        $count = ['parts' => 0, 'brands' => 0];
        foreach ($category->segments as $segment) {
            $count['parts'] += count($segment->parts);
            $count['brands'] += count($segment->brands);
        }
        return $count;
    }

    // Category EDIT
    public function handleEditCategory($id)
    {
        $data = $this->category->find($id);
        $data['uom'] = explode(', ', $data->uom);
        // dd($data->uom);
        return $data;
    }

    // Category UPDATE 
    public function handleUpdateCategory($request, $id)
    {
        $data = $this->category->find($id)->update([
            'name' => strtoupper($request->name),
            'description' => $request->description,
            'uom' => implode(', ', $request->uom),
        ]);
        // return('Data has been updated');
        return $data;
    }

    // category DELETE
    public function handleDeactiveCategory($id)
    {
        $category = $this->category->find($id);
        $category->status = 'inactive';
        $category->ended = now();
        $category->save();
        return('Data has been deactivated');
    }
}
