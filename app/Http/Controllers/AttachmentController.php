<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use Illuminate\Http\Request;
use App\Services\AttachmentService;


class AttachmentController extends Controller
{
    public function __construct(AttachmentService $attachmentService)
    {
        $this->attachmentService = $attachmentService;
    }

    public function index()
    {
        // return $this->attachmentService->indexData();

        $data = Attachment::all();
        return view('part.detail', [
            'data' => $data
        ]);

        // return ResponseJSON($data, 200);
        
    }

    public function store(Request $request)
    {
        
        return $this->attachmentService->storeData($request);
        
    }

    public function destroy($id)
    {
        return $this->attachmentService->destroyData($id);
    }
    
}
