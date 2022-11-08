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
        $validatedData['name'] = strtoupper($request->name);
        $data = $this->segment->create($validatedData);
        if ($request->isAjax == 'yep') {
            return ResponseJSON($data, 200);
        } else {
            // return redirectTab("tabs-segment");
            return redirect('segment');
        }
    }

    public function handleEditSegment($id)
    {
        $data = $this->segment->find($id);
        return $data;
    }

    public function handleUpdateSegment($request, $id)
    {
        $data = $this->segment->find($id)->update([
            'name' => strtoupper($request->name),
            'category_id' => $request->category_id,
        ]);

        // return('Data has been updated');
        return $data;
    }

    // API Segment GET
    public function handleAllSegmentApi($req)
    {
        $segments = $this->segment->with('category')->withCount('parts')->get();
        return ($segments);
    }

    public function handleAllSegmentByCategory($id)
    {
        return $this->segment->where('category_id', $id)->select('id','name')->get();
    }
}
