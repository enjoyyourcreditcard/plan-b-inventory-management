<?php

namespace App\Services;

use App\Models\Grf;
use App\Models\RequestForm;
use App\Models\Warehouse;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TransactionService
{

    public function __construct(Grf $grf, RequestForm $requestForm,Warehouse $warehouse)
    {
        $this->warehouse = $warehouse;
        $this->grf = $grf;
        $this->requestForm = $requestForm;
    }


    public function handlePostApproveIC($req)
    {
        $grf = $this->grf->find($req->id);
        $grf->status = "ic_approved";
        $grf->ic_approved_date = Carbon::now();
        $grf->save();
        return "success";
    }


    // Request Form Generate GRF CODE
    public function handleGenerateSuratJalan($whId)
    {

        $warehouse = $this->warehouse->find($whId)->first();
        $allGrfs = count($this->grf->where('warehouse_id', '=', $whId)->get());
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
        $name = str_replace(' ', '-', strtoupper($warehouse->name));
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

        return ($grf_code);

    }
    
    public function handleTimer ()
    {
        $deliveryApprovedDates = $this->grf->where([['user_id', Auth::user()->id], ['status', '!=', 'draft'], ['surat_jalan', '!=', null]])->get();
        $deliveryApprovedDates->map(function ($deliveryApprovedDate) {
            $deliveryApprovedDate['ended'] = Carbon::create($deliveryApprovedDate->delivery_approved_date)->addDay()->toDateTimeString();
        });

        return $deliveryApprovedDates;
    }
}
