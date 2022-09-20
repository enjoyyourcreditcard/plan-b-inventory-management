<?php

namespace App\Services;

use App\Models\Grf;
use App\Models\RequestForm;
use Illuminate\Http\Request;

class WhApprovalService{

    public function __construct(RequestForm $requestForm, Grf $grf)
    {
        $this->whapprov = $requestForm;
        $this->grf = $grf;
    }

    // *: Untuk mengambil semua data dan tampil di views
    public function handleAllWhApproval()
    {
        $whapproval = $this->whapprov->all();
        return ($whapproval);
    }

    // *: Untuk show data sesuai id yang untuk tampil sesuai grfcode
    public function handleShowWhApproval($id)
    {
        $grf_code = str_replace('~', '/',$id);
        $data = $this->grf->where('grf_code',$grf_code)->with("requestForms")->get();
        // dd($data);
        // dd()
        // dd($wherewh);


        // $whapproval = $this->whapprov->where('grf_code', $wherewh)->get();
        return ($data);
    }

    // *: Untuk menggrouping banyak data menjadi 1 row
    public function handleGroubWhApproval()
    {
        $whapproval = $this->whapprov->all()->groupBy('grf_code');
        return ($whapproval);
    }

    public function inActive($id){
        $whapproval = $this->whapprov->find($id); 
        $data = []; 
        $data['status'] = 'inactive'; 
        $whapproval->update($data); 
        return('');
    }

    // *: untuk input sn_code yang ada di field 
    // public function handleUpdateWhApproval($request)
    // {
    //     $whapprov = $this->whapprov->where('grf_code', $request->grf_code)->get();
    //     for ($i = 0; $i < count($request['id']); $i++) {
    //         $whapprov->find($request['id'][$i])->update(['sn_code' => $request['sn_code'][$i]]);
    //     }
    //     return ($whapprov);
    // }
    

}