<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;
use App\Models\RequestForm;
use App\Models\Part;
use Illuminate\Http\Request;

class RequestFormService
{

    public function __construct(RequestForm $requestForm)
    {
        $this->requestForm = $requestForm;
    }

    // Request Form GET
    public function handleAllRequestForm()
    {
        $requestForm = $this->requestForm->all();
        return ($requestForm);
    }

    // Request Form SHOW
    public function handleShowRequestForm($grf_code)
    {
        $requestForm = $this->requestForm->with('part')->where('grf_code', str_replace('~', '/', strtoupper($grf_code)))->get();
        return ($requestForm);
    }

    // Request Form By User GRF
    public function handleGetByUserGrfRequestForm()
    {
        $requestForm = $this->requestForm->where('user_id', Auth::user()->id)->get()->groupBy('grf_code');
        return ($requestForm);
    }

    // Request Form STORE 
    public function handleStoreRequestForm($request)
    {
        $validatedData = $request->validate([
            'grf_code' => 'required',
            'user_id' => 'required',
        ]);
        $this->requestForm->create($validatedData);

        return ('Data has been stored');
    }

    // Request Form UPDATE 
    public function handleUpdateRequestForm($request)
    {
        $validatedData = $request->validate([
            'grf_code' => 'required',
            'user_id' => 'required',
            'warehouse_id' => 'required',
        ]);
        for ($i = 0; $i < count($request->part_id); $i++) {
            $validatedData['part_id'] = $request->part_id[$i];
            // $validatedData['brand_id'] = $request->brand_id[$i];
            $validatedData['quantity'] = $request->quantity[$i];
            if ($request->remarks[$i] == null) {
                $validatedData['remarks'] = '';
            }else{
                $validatedData['remarks'] = $request->remarks[$i];
            }
            $this->requestForm->create($validatedData);
        };
        return ('Data has been stored');
    }

    // Request Form Generate GRF CODE
    public function handleGenerateGrfCode()
    {
        $rawMonth = now()->format('m');
        $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $returnValue = '';
        while ($rawMonth > 0) {
            foreach ($map as $roman => $int) {
                if($rawMonth >= $int) {
                    $rawMonth -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }

        $attempt = Auth::user()->requestForms->groupBy('grf_code')->count() + 1;
        $name = str_replace(' ', '-', strtoupper(Auth::user()->name));
        $month = $returnValue;
        $year = now()->format('Y');

        if (Auth::user()->requestForms->groupBy('grf_code')->count() > 0) {
            if (Auth::user()->requestForms->groupBy('grf_code')->count() >= 9) {
                $grf_code = '0' . $attempt . '/' . $name . '/' . 'IB' . '/' . $month . '/' . $year;
            }else{
                $grf_code = '00' . $attempt . '/' . $name . '/' . 'IB' . '/' . $month . '/' . $year;
            }
        }else{
            $grf_code = '001' . '/' . $name . '/' . 'IB' . '/' . $month . '/' . $year;
        }
        
        return ($grf_code);
    }
}
