<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function show($id)
    {
        $category = $this->categoryService->handleShowCategory($id);
        $uom = explode(', ', $category->uom);
        return view('category.detail', [
            'category' => $category,
            'uom' => $uom,
        ]);
    }

    public function store(Request $request)
    {
        $status = $this->categoryService->handleStoreCategory($request);
        return ($status);
    }

    public function update(Request $request)
    {
        $this->categoryService->handleUpdateCategory($request);
        return redirectTab("tabs-category");
    }

    public function delete($id)
    {
        $this->categoryService->handleDeactiveCategory($id);
        return redirectTab("tabs-category");
    }

    public function getAllCategory()
    {
        return ResponseJSON($this->categoryService->handleGetAllCategory(), 200);
    }

    public function getAllCategoryForSelect()
    {
        $category = $this->categoryService->handleGetAllCategoryForSelect();
        $result = [];
        foreach ($category as $item) {
            $result[] = $item->name;
        }
        return ResponseJSON($result,200);
    }




    // public function getCategoryById($id)
    // {
    //     return ResponseJSON($this->categoryService->handleShowCategory($id), 200);
    // }
}