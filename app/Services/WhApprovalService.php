<?php

namespace App\Services;

use App\Models\RequestForm;
use App\Models\Grf;
use Illuminate\Http\Request;

class WhApprovalService{

    public function __construct(RequestForm $requestForm, Grf $grf)
    {
        $this->requestForm = $requestForm;
        $this->grf = $grf;
    }

    // *: Untuk mengambil semua data dan tampil di views
    public function handleAllWhApproval()
    {
        $grfs = $this->grf->with('user')->get();
        return ($grfs);
    }

    // *: Untuk show data sesuai id yang untuk tampil sesuai grfcode
    public function handleShowWhApproval($id)
    {
        $wherewh = str_replace('~', '/',$id);
        $whapproval = $this->grf->with('requestForms', 'user', 'warehouse')->where('grf_code', $wherewh)->first();
        // dd ($whapproval);
        return ($whapproval);
    }

    // *: Untuk menggrouping banyak data menjadi 1 row
    public function handleGroubWhApproval()
    {
        $whapproval = $this->requestForm->all()->groupBy('grf_code');
        return ($whapproval);
    }

    public function inActive($id){
        $whapproval = $this->requestForm->find($id); 
        $data = []; 
        $data['status'] = 'inactive'; 
        $whapproval->update($data); 
        return('');
    }

    // *: untuk input sn_code yang ada di field 
    // public function handleUpdateWhApproval($request)
    // {
    //     $whapprov = $this->requestForm->where('grf_code', $request->grf_code)->get();
    //     for ($i = 0; $i < count($request['id']); $i++) {
    //         $whapprov->find($request['id'][$i])->update(['sn_code' => $request['sn_code'][$i]]);
    //     }
    //     return ($whapprov);
    // }
    

}