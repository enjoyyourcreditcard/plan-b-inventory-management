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

        $validatedData['started'] = now();
        $validatedData['status'] = 'active';

        $this->category->create($validatedData);

        return('Data has been stored');
    }

    // Category UPDATE 
    public function handleUpdateCategory($request, $id)
    {
        $this->category->find($id)->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        
        return('Data has been updated');
    }

    // category DELETE
    public function handleDeleteCategory($id)
    {
        $category = $this->category->find($id);
        $data = [];
        $data['status'] = 'inactive';
        $data['ended'] = now();

        $category->update($data);

        return('Data has been deactivated');
    }
}
