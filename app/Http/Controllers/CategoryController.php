<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PartService;
use App\Services\CategoryService;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function __construct(CategoryService $categoryService, PartService $partService)
    {
        $this->categoryService = $categoryService;
        $this->partService = $partService;
    }
    public function index()
    {
        try {
            return view('master.category.index');   
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $category = $this->categoryService->handleShowCategory($id);
            $count = $this->categoryService->handlePartCount($id);
            $uom = explode(', ', $category->uom);
            return view('category.detail', [
                'category' => $category,
                'uom' => $uom,
                'count' => $count,
            ]);
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    public function create()
    {
        try {
            return view('master.category.create');
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            $status = $this->categoryService->handleStoreCategory($request);
            return ($status);
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $category = $this->categoryService->handleEditCategory($id);
            return view('master.category.edit', ['category' => $category]);
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $this->categoryService->handleUpdateCategory($request, $id  );
            return redirect('category');
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    public function delete($id)
    {
        try {
            $this->categoryService->handleDeactiveCategory($id);
            return redirect()->back();
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
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
