<?php

namespace App\Services;

use App\Models\RequestForm;
use App\Models\Grf;
use App\Models\RequestStock;
use App\Models\Stock;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WarehouseTransactionService{

    public function __construct(RequestForm $requestForm, Grf $grf, Stock $stock, RequestStock $requestStock)
    {
        $this->requestForm = $requestForm;
        $this->grf = $grf;
        $this->stock = $stock;
        $this->requestStock = $requestStock;
    }

    // *: Get data untuk warehouse approv
    public function handleAllWhApproval()
    {
        $grfs = $this->grf->with('user')->where('status','ic_approved')->get();
        return ($grfs);
    }
    // *: Get data untuk warehouse return
    public function handleAllWhReturn()
    {
        $grfs = $this->grf->with('user')->where('status','return_ic_approved')->get();
        return ($grfs);
    }

    // *: Untuk show data sesuai id yang untuk tampil sesuai grfcode
    public function handleShowWhApproval($id)
    {
        $wherewh = str_replace('~', '/',$id);
        $whapproval = $this->grf->with('requestForms', 'user', 'warehouse')->where('grf_code', $wherewh)->first();
        $whapproval['quantity'] = 0;
        foreach ($whapproval->requestForms as $requestForm) {
            $whapproval['quantity'] += $requestForm->quantity;
        }
        return($whapproval);
    }

     // *: Untuk show data sesuai id yang untuk tampil sesuai grfcode return
     public function handleShowWhReturn($id)
     {
         $wherewh = str_replace('~', '/',$id);
         $whreturn = $this->grf->with('requestForms', 'user', 'warehouse')->where('grf_code', $wherewh)->first(); 
         $whreturn['quantity'] = 0;
         foreach ($whreturn->requestForms as $requestForm) {
             $whreturn['quantity'] += $requestForm->quantity;
         }
         return($whreturn);
     }

    // *: Untuk menggrouping banyak data menjadi 1 row
    public function handleGroubWhApproval()
    {
        $whapproval = $this->whapprov->all()->groupBy('grf_code');
        return ($whapproval);
    }

    // *: untuk input sn_code satuan
    public function handleStoreWhApproval($request)
    {
        foreach ($request->sn_code as $sn_code) {
            $this->requestStock->create([
                'request_form_id' => $request->request_form_id,
                'grf_id' => $request->grf_id,
                'part_id' => $request->part_id,
                'sn' => $sn_code,
            ]);
        }


        return('data stored!');
    }

    
    

    public function handlePostApproveWH($req, $transactionService)
    {
        $grf = $this->grf->find($req->id);
        $grf->status = "wh_approved";
        $grf->surat_jalan = $transactionService->handleGenerateSuratJalan(1);
        $grf->wh_approved_date = Carbon::now();
        $grf->save();
        return "success";
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
