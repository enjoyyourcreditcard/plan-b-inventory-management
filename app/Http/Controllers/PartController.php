<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Part;
use App\Services\PartService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class PartController extends Controller
{
    public function __construct(PartService $partService)
    {
        $this->partService = $partService;
    }

    public function getAllPart()
    {
        return ResponseJSON($this->partService->handleAllPartApi(), 200);
    }
    
    public function index()
    {
        return $this->partService->handleAllPart();
    }

    public function show($id)
    {
        return $this->partService->handleShowPart($id);
    }

    public function store(Request $request)
    {
        $this->partService->handleStorePart($request);

        return redirect('/part');
    }

    public function update(Request $request, $id)
    {
        $this->partService->handleUpdatePart($request, $id);

        return redirect('/detail/part/'.$id);
    }

    public function getDeactivePart($id)
    {
        return ResponseJSON($this->partService->handleDeactivePart($id), 200);
    }
}
