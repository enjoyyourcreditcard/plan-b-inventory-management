<?php

namespace App\Http\Controllers;

use App\Models\Segment;
use Illuminate\Http\Request;
use App\Services\SegmentService;
use App\Services\CategoryService;

class SegmentController extends Controller
{
    public function __construct(SegmentService $segmentService, CategoryService $categoryService)
    {
        $this->segmentService = $segmentService;
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $segments = $this->segmentService->handleAllSegment();
        // dd($segments);
        return view('master.segment', ['segments' => $segments]);
    }

    public function create()
    {
        $categories = $this->categoryService->handleGetAllCategory();
        return view('part.create-segment', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        // dd($request);
        return $this->segmentService->handleStoreSegment($request);
    }

    public function show(Segment $segment)
    {
        //
    }

    public function edit($id)
    {
        $categories = $this->categoryService->handleGetAllCategory();
        $segment = $this->segmentService->handleEditSegment($id);
        return view('part.edit-segment', ['segment' => $segment, 'categories' => $categories]);
    }

    public function update(Request $request, $id)
    {
        $this->segmentService->handleUpdateSegment($request, $id);
        return redirect('segment');
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
