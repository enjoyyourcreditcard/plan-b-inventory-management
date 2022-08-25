<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use Illuminate\Http\Request;
use App\Services\AttachmentService;
use Illuminate\Support\Facades\Validator;
use App\helpers;


class AttachmentController extends Controller
{
    // view

    public function __construct(AttachmentService $attachmentService)
    {
        $this->attachmentService = $attachmentService;
    }

    public function index($id)
    {
        $data = $this->attachmentService->handleAllAttachment();

        return view('part.detail', [
            'data' => $data,
            'part_id' => $id,
        ]);

    }

    public function store(Request $request)
    {
        // $data = $this->attachmentService->handleStoreAttachment($request);

        // return view('part.detail', [
        //     'data' => $data,
        // ]);

        $this->attachmentService->handleStoreAttachment($request);

        return view('part.detail');

    }
    
    public function destroy($id)
    {
        // $data = $this->attachmentService->handleDeleteAttachment($id);

        // return view('part.detail', [
        //     'data' => $data,
        // ]);

        $this->attachmentService->hendleDeleteAttachment($id);

        return view('part.detail');

    }
    
    // API
    
    public function getAllAttachment()
    {
        return ResponseJSON($this->attachmentService->handleAllAttachment(), 200);
    }

    public function postStoreAttachment(Request $request)
    {
        return ResponseJSON($this->attachmentService->handleStoreAttachment($request), 200);
    }

    public function getDeleteAttachment($id)
    {
        return ResponseJSON($this->attachmentService->handleDeleteAttachment($id), 200);
    }
    
}
