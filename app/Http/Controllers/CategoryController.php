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

        return redirectTab("tabs-category");
    }

    public function update(Request $request) {
        $this->categoryService->handleUpdateCategory($request);
        return redirectTab("tabs-category");
    }

    public function delete($id) {
        $this->categoryService->handleDeactiveCategory($id);
        return redirectTab("tabs-category");
    }
}
