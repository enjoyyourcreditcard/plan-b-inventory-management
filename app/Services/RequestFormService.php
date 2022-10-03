<?php

namespace App\Services;

use App\Models\Grf;
use App\Models\Part;
use App\Models\RequestForm;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestFormService
{

    public function __construct(RequestForm $requestForm, Grf $grf)
    {
        $this->requestForm = $requestForm;
        $this->grf = $grf;
    }

    // Request Form SHOW
    public function handleShowRequestForm($code)
    {
        // dd($code);
        $requestForms = $this->grf->with('requestForms.segment')->where([['grf_code', '=', str_replace('~', '/', strtoupper($code))], ['status', '!=', 'closed']])->first()->requestForms;
        return ($requestForms);
    }

    // Request Form SHOW
    public function handleAllRequestFormInbound()
    {
        $requestForms = $this->grf->where('status','=','submited')->orWhere('status','=','ic_approved')->orWhere('status','=','wh_approved')->orWhere('status','=','delivery_approved')->orWhere('status','=','user_pickup')->get();
        return ($requestForms);
    }

    public function handleAllRequestFormOutbound()
    {
        $requestForms = $this->grf->where('status','=','return')->get();
        return ($requestForms);
    }

    // public function handleAllRequestFormExceptStatus($status)
    // {
    //     $requestForms = $this->grf->where('status','!=',$status)->get();
    //     return ($requestForms);
    // }

    // Request Form By User
    public function handleGetByUserRequestForm()
    {
        $requestForms = $this->grf->where([['user_id', '=', Auth::user()->id], ['status', '!=', 'closed']])->with('requestForms')->get();
        return ($requestForms);
    }

    // Request Form Current GRF
    public function handleGetCurrentGrf($code)
    {
        $grf = $this->grf->where('grf_code', '=', str_replace('~', '/', strtoupper($code)))->first();
        return ($grf);
    }

    // Request Form Has GRF_Code
    public function handleRequestFormHasGrf($code)
    {
        $exist = Arr::has($this->requestForm->where([['user_id', '=', Auth::user()->id], ['status', '!=', 'closed']])->get()->groupBy('grf_code'), str_replace('~', '/', strtoupper($code)));
        return ($exist);
    }

    // Request Form STORE 
    public function handleStore($request, $id)
    {
        if ($this->grf->find($id)->warehouse_id != $request->warehouse_id) {
            $validatedWarehouse_id = $request->validate([
                'warehouse_id' => 'required',
            ]);
            $this->grf->find($id)->update($validatedWarehouse_id);
        }
        $validatedData = $request->validate([
            'segment_id' => 'required',
            'quantity' => 'required|integer',
            'remarks' => 'required',
        ]);
        $validatedData['grf_id'] = $this->grf->find($id)->id;
        $this->requestForm->create($validatedData);

        return ('Data has been stored');
    }

    // Request Form STORE 
    public function handleStoreGrf($request)
    {
        $validatedData = $request->validate([
            'grf_code' => 'required',
            'warehouse_id' => 'nullable',
        ]);
        $validatedData['user_id'] = Auth::user()->id;
        $this->grf->create($validatedData);

        return ('Data has been stored');
    }

    // Request Form UPDATE 
    public function handleUpdateRequestForm($request, $id)
    {
        $validatedData = $request->validate([
            'status' => 'required'
        ]);
        $this->grf->find($id)->update($validatedData);
        return ('Data has been updated');
    }

    // Request Form DELETE 
    public function handleDeleteRequestForm($id)
    {
        $requestForm = $this->requestForm->find($id)->delete();
        return ResponseJSON($requestForm, 200);
    }

    // Request Form Generate GRF CODE
    public function handleGenerateGrfCode()
    {
        $allGrfs = count($this->grf->where('user_id', '=', Auth::user()->id)->get());
        $grfs = count($this->grf->where([['user_id', '=', Auth::user()->id], ['status', '!=', 'closed']])->get());
        if ($grfs < 3) {
            $rawMonth = now()->format('m');
            $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
            $returnValue = '';
            while ($rawMonth > 0) {
                foreach ($map as $roman => $int) {
                    if ($rawMonth >= $int) {
                        $rawMonth -= $int;
                        $returnValue .= $roman;
                        break;
                    }
                }
            }

            $attempt = $allGrfs + 1;
            $name = str_replace(' ', '-', strtoupper(Auth::user()->name));
            $month = $returnValue;
            $year = now()->format('Y');

            if ($allGrfs > 0) {
                if ($allGrfs >= 9) {
                    $grf_code = '0' . $attempt . '/' . $name . '/' . 'IB' . '/' . $month . '/' . $year;
                } else {
                    $grf_code = '00' . $attempt . '/' . $name . '/' . 'IB' . '/' . $month . '/' . $year;
                }
            } else {
                $grf_code = '001' . '/' . $name . '/' . 'IB' . '/' . $month . '/' . $year;
            }
        } else {
            $grf_code = null;
        }
        return ($grf_code);
    }

    
}
