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
        return ResponseJSON($this->partService->handleAllPart(), 200);
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

    public function getDeletePart($id)
    {
        return ResponseJSON($this->partService->handleDeletePart($id), 200);
    }
}
