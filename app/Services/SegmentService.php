<?php

namespace App\Services;

use App\Models\Segment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SegmentService
{

    public function __construct(Segment $segment)
    {
        $this->segment = $segment;
    }

    // Segment GET
    public function handleAllSegment()
    {
        $segments = $this->segment->with('category')->withCount('parts')->get();
        return ($segments);
    }

    // Segment STORE 
    public function handleStoreSegment($request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:segments',
            'category_id' => 'required',
        ]);
        $data = $this->segment->create($validatedData);
        if ($request->isAjax == 'yep') {
            return ResponseJSON($data, 200);
        }else{
            return redirectTab("tabs-segment");
        }
    }

    // API Segment GET
    public function handleAllSegmentApi($req)
    {
        $segments = $this->segment->with('category')->withCount('parts')->get();
        return ($segments);
    }
}
