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


    public function store(Request $request)
    {
        // dd($request);
        $this->attachmentService->handleStoreAttachment($request);
        // return redirect()->back();
        return redirectTab("tabs-attachments");


    }
    
    public function destroy($id)
    {
    
        $this->attachmentService->hendleDeleteAttachment($id);

        return view('master.part.detail');

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
