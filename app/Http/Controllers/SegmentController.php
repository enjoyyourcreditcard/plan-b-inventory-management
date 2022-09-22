<?php

namespace App\Http\Controllers;

use App\Models\Segment;
use Illuminate\Http\Request;
use App\Services\SegmentService;

class SegmentController extends Controller
{
    public function __construct (SegmentService $segmentService)
    {
        $this->segmentService = $segmentService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request)
    {
        return $this->segmentService->handleStoreSegment($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Segment  $segment
     * @return \Illuminate\Http\Response
     */
    public function show(Segment $segment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Segment  $segment
     * @return \Illuminate\Http\Response
     */
    public function edit(Segment $segment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Segment  $segment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Segment $segment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Segment  $segment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Segment $segment)
    {
        //
    }

    /**
     * Show JSON from storage.
     *
     * @param  \App\Models\Segment  $segment
     * @return \Illuminate\Http\Response
     */
    public function getAllSegment(Request $req)
    {
        return ResponseJSON($this->segmentService->handleAllSegmentApi($req), 200);
    }
}
