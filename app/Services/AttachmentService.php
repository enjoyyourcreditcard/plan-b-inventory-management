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

    public function __construct(Attachment $attachments)
    {
        $this->attachment = $attachments;
    }

    public function indexData()
    {
        $data = $this->attachment->all();

        return view('part.detail', [
                'data' => $data
            ]);

        // return new AttachmentResource(true, 'List Attachment Posts', $data);

        // return view('part.detail', [
        //     'data' => $data
        // ]);
    }

    // public function createData()
    // {
        
    //     return view('addattachment', [
    //         "title" => "Add Data Attachment",
    //         'dataattachment' => $dataattachment
            
    //     ]);
    // }

    public function storeData(Request $request)
    {

        $data = $this->attachment::create($request->all());
        if ($request->hasFile('file')) {
            $request->file('file')->move('file', $request->file('file')->getClientOriginalName());
            $data->file = $request->file('file')->getClientOriginalName();
            $data->save();
        }
    
        return redirect()->route('index');
        
    }

    public function destroyData($id)
    {
        $datas = $this->attachment::find($id);
        $datas->delete();

        return redirect('/detail/part');
    }



    
}