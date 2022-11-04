<?php

namespace App\Http\Controllers;

use App\Models\Segment;
use Illuminate\Http\Request;
use App\Services\SegmentService;
use App\Services\CategoryService;
use Illuminate\Support\Facades\Redirect;

class SegmentController extends Controller
{
    public function __construct(SegmentService $segmentService, CategoryService $categoryService)
    {
        $this->segmentService = $segmentService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        try {
            $segments = $this->segmentService->handleAllSegment();
            return view('master.segment.index', ['segments' => $segments]);
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    public function create()
    {
        try {
            $categories = $this->categoryService->handleGetAllCategory();
            return view('master.segment.create', ['categories' => $categories]);
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    public function store(Request $request)
    {   
        try {
            return $this->segmentService->handleStoreSegment($request);
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    public function show(Segment $segment)
    {
        //
    }

    public function edit($id)
    {        
        try {
            $categories = $this->categoryService->handleGetAllCategory();
            $segment = $this->segmentService->handleEditSegment($id);
            return view('master.segment.edit', ['segment' => $segment, 'categories' => $categories]);
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $this->segmentService->handleUpdateSegment($request, $id);
            return redirect('segment');
        } catch (\Exception $e) {
            return Redirect::back()->withError($e->getMessage());
        }
    }

    public function destroy(Segment $segment)
    {
        //
    }

    public function getAllSegment(Request $req)
    {
        return ResponseJSON($this->segmentService->handleAllSegmentApi($req), 200);
    }
}
