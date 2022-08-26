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

    public function store(Request $request) {
        $this->categoryService->handleStoreCategory($request);

        return redirect('/part');
    }

    public function update(Request $request, $id) {
        $this->categoryService->handleUpdateCategory($request, $id);

        return redirect('/part');
    }

    public function delete($id) {
        $this->categoryService->handleDeleteCategory($id);

        return redirect('/part');
    }
}
