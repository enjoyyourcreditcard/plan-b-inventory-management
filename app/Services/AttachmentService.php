<?php

namespace App\Services;

use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\AttachmentResource;
use Illuminate\Support\Facades\Validator;

class AttachmentService
{

    public function __construct(Attachment $attachment)
    {
        $this->attachment = $attachment;
    }

    public function handleAllAttachment()
    {
        $data = $this->attachment->paginate(10);

        return($data);

    }
    
    
    public function handleStoreAttachment(Request $request)
    {
        
        $data = $this->attachment::create($request->all());
        // add file
        if ($request->hasFile('file')) {
            $request->file('file')->move('file', $request->file('file')->getClientOriginalName());
            $data->file = $request->file('file')->getClientOriginalName();
            $data->save();
        }
        
        return($data);
        
    }
    
    public function handleDeleteAttachment($id)
    {
        $data = $this->attachment::find($id);
        $data->delete();


        return($data);

    }
    
}