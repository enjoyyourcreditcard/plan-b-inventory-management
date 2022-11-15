<?php

namespace App\Services;

use App\Models\Grf;
use App\Models\Part;
use App\Models\RequestForm;
use App\Models\Timeline;
use App\Models\Warehouse;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TransactionService
{

    public function __construct(Timeline $timeline, Grf $grf, Part $part, RequestForm $requestForm, Warehouse $warehouse)
    {
        $this->warehouse = $warehouse;
        $this->timeline = $timeline;
        $this->grf = $grf;
        $this->part = $part;
        $this->requestForm = $requestForm;
    }


    public function handlePostApproveIC($req)
    {
        $parts = explode(',', $req->part);
        $quantity = explode(',', $req->quantity);
        $brand = explode(',', $req->brand);
        $grf = $this->grf->find($req->id);
        $grf->status = "ic_approved";
        $grf->save();
        $timeline = $this->timeline::create(['grf_id' => $req->id, 'status' => 'ic_approved']);

        for ($i = 0; $i < count($parts); $i++) {
            $segment_id = $this->part->find($parts[$i])->segment_id;
            $brand_id = $this->part->find($parts[$i])->brand_id;
            $requestForm = $this->requestForm->where('grf_id', $req->id)->where('segment_id', $segment_id)->whereNull('part_id')->first();
            if ($requestForm !== null) {
                $requestForm->part_id = $parts[$i];
                $requestForm->quantity = $quantity[$i];
                $requestForm->brand_id = $brand[$i];
                $requestForm->save();
            } else {
                $requestForm = new RequestForm();
                $requestForm->grf_id = $req->id;
                $requestForm->segment_id = $segment_id;
                $requestForm->brand_id = $brand[$i];
                $requestForm->part_id = $parts[$i];
                $requestForm->quantity = $quantity[$i];
                $requestForm->remarks = "asdasd";
                $requestForm->save();
            }
        }

        return "success";
    }

    public function handlePostRejectIC($id)
    {
        // dd($id);
        $grf = $this->grf->find($id);
        $grf->status = "reject";
        $grf->save();
        // $id
        $timeline = $this->timeline->create([
            "grf_id" => $id,
            "status" => "reject",
        ]);

        return $timeline;



        // dd($grf);
    }

    public function handlePostApproveSJ($req)
    {
        $grf = $this->grf->find($req->id);
        $grf->status = "delivery_approved";
        $grf->surat_jalan = $this->handleGenerateSuratJalan($grf->warehouse_id);
        $grf->delivery_approved_date = Carbon::now();
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

    public function handleTimer()
    {
        if (Auth::user()->is_vendor) {
            $deliveryApprovedDates = $this->grf->with('timelines')->where([['user_id', Auth::user()->id], ['status', '!=', 'draft'], ['status', '!=', 'return'], ['surat_jalan', '!=', null]])->get();

            $deliveryApprovedDates->map(function ($deliveryApprovedDate) {
                $deliveryApprovedDate['ended'] = Carbon::create($deliveryApprovedDate->timelines->where('status', 'delivery_approved')->last()->created_at->addDays(7)->toDateTimeString());
                if (now() > $deliveryApprovedDate['ended']) {
                    $deliveryApprovedDate['ended'] = 'Melewati batas waktu';
                } else {
                    $deliveryApprovedDate['ended'] = $deliveryApprovedDate['ended']->diffforhumans();
                }
            });

            return $deliveryApprovedDates;
        } else {
            $deliveryApprovedDates = $this->grf->with('timelines')->where([['user_id', Auth::user()->id], ['status', '!=', 'draft'], ['status', '!=', 'return'], ['surat_jalan', '!=', null]])->get();

            $deliveryApprovedDates->map(function ($deliveryApprovedDate) {
                $deliveryApprovedDate['ended'] = Carbon::create($deliveryApprovedDate->timelines->where('status', 'delivery_approved')->last()->created_at->addDay()->toDateTimeString());
                if (now() > $deliveryApprovedDate['ended']) {
                    $deliveryApprovedDate['ended'] = 'Melewati batas waktu';
                } else {
                    $deliveryApprovedDate['ended'] = $deliveryApprovedDate['ended']->diffforhumans();
                }
            });

            return $deliveryApprovedDates;
        }
    }
}
