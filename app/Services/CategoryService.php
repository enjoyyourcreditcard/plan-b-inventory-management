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

        $validatedData['uom'] = implode(', ', $request->uom);
        $validatedData['started'] = now();
        $validatedData['status'] = 'active';
        $this->category->create($validatedData);
        return('Data has been stored');
    }

    // Category INDEX
    public function handleGetAllCategory()
    {
        return $this->category::with('parts')->get();
    }

    // Category SHOW
    public function handleShowCategory($id)
    {
        return $this->category->with('parts')->with('brands')->find($id);
    }

    // Category UPDATE 
    public function handleUpdateCategory($request)
    {
        $this->category->find($request->id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'uom' => implode(', ', $request->uom),
        ]);
        return('Data has been updated');
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
