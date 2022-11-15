<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Grf;
use App\Models\Notification;
use App\Models\Part;
use App\Models\RequestForm;
use App\Models\RequestStock;
use App\Models\Stock;
use App\Models\Timeline;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class RequestFormService
{

    public function __construct(RequestForm $requestForm, RequestStock $requestStock, Grf $grf, Timeline $timeline, Notification $notification, Stock $stock)
    {
        $this->grf = $grf;
        $this->stock = $stock;
        $this->requestForm = $requestForm;
        $this->requestStock = $requestStock;
        $this->timeline = $timeline;
        $this->notification = $notification;
    }

    // Request Form SHOW
    public function handleShowRequestForm($code)
    {
        $requestForms = $this->grf->with('requestForms.segment')->with('requestForms.segment.parts')->where([['grf_code', '=', str_replace('~', '/', strtoupper($code))], ['status', '!=', 'closed']])->first()->requestForms;
        return ($requestForms);
    }

    // Request Form SHOW
    public function handleAllRequestFormInbound()
    {
        $requestForms = $this->grf->where('status', '!=', 'draft')->with('user')->with('warehouse')->get();
        return ($requestForms);
    }

    public function handleAllRequestFormOutbound()
    {
        $requestForms = $this->grf->where('status', '=', 'return')->get();
        return ($requestForms);
    }



    /*
    *|--------------------------------------------------------------------------
    *| Get all grf requester data by it's user
    *|--------------------------------------------------------------------------
    */
    public function handleGetAllGrfByUser()
    {
        $grfs = $this->grf->where([['user_id', Auth::user()->id], ['type', 'request']])->with('requestForms', 'timelines')->get();

        $grfs->map(function ($grf) {
            $grf['ended'] = ($grf->delivery_approved_date == null ? null : Carbon::create($grf->delivery_approved_date)->addDay()->toDateTimeString());

            $grf['total_quantity'] = 0;

            $grf->requestForms->map(function ($requestForm) use ($grf) {
                $grf['total_quantity'] += $requestForm->quantity;
            });
        });

        return ($grfs);
    }



    /*
    *|--------------------------------------------------------------------------
    *| Get all warehouse transfer grf data by it's user
    *|--------------------------------------------------------------------------
    */
    public function handleGetAllWarehouseTransferGrfByUser()
    {
        $grfs = $this->grf->where([['user_id', Auth::user()->id], ['type', "!=", 'request']])->with('transferForms', "timelines" )->get();

        $grfs->map(function ($grf) {
            $grf['total_stock'] = 0;

            $grf->transferForms->map(function ($transferForm) use ($grf) {
                $grf['total_stock'] += $transferForm->quantity;
            });
        });

        return ($grfs);
    }



    /*
    *|--------------------------------------------------------------------------
    *| Get the current user's GRF
    *|--------------------------------------------------------------------------
    */
    public function handleGetCurrentGrf($code)
    {
        $grf = $this->grf->with('timelines', 'user')->where('grf_code', '=', str_replace('~', '/', strtoupper($code)))->first();

        return ($grf);
    }

    // Request Form Has GRF_Code
    public function handleRequestFormHasGrf($code)
    {
        $exist = Arr::has($this->requestForm->where([['user_id', '=', Auth::user()->id], ['status', '!=', 'closed']])->get()->groupBy('grf_code'), str_replace('~', '/', strtoupper($code)));
        return ($exist);
    }



    /*
    *|--------------------------------------------------------------------------
    *| Store a requested item into the list 
    *|--------------------------------------------------------------------------
    */
    public function handleStore($request, $id)
    {
        if (isset($request->warehouse_id)) {
            $validatedWarehouse_id = $request->validate([
                'warehouse_id' => 'required',
            ]);

            $this->grf->find($id)->update($validatedWarehouse_id);
        }

        $validatedData = $request->validate([
            'brand_id' => 'nullable',
            'segment_id' => 'required',
            'quantity' => 'required|integer',
            'remarks' => 'nullable',
        ]);

        $validatedData['grf_id'] = $this->grf->find($id)->id;

        $data = $this->requestForm->create($validatedData);

        return ($data);
    }



    /*
    *|--------------------------------------------------------------------------
    *| Change the warehouse id in GRF table
    *|--------------------------------------------------------------------------
    */
    public function handleChangeWarehouseLocation($request, $id)
    {
        $validatedData = $request->validate(["warehouse_id" => "required"]);
        $this->requestForm->where("grf_id", $id)->get()->map(function ($itemList) {
            $itemList->delete();
        });

        $this->grf->find($id)->update($validatedData);

        // return ($data);
    }



    /*
    *|--------------------------------------------------------------------------
    *| Store a new GRF to GRF table
    *|--------------------------------------------------------------------------
    */
    public function handleStoreGrf($request)
    {
        $validatedData = $request->validate([
            'grf_code' => 'required',
            'warehouse_id' => 'nullable',
            'type' => 'nullable',
        ]);

        $validatedData['user_id'] = Auth::user()->id;

        $createdData = $this->grf->create($validatedData);

        $timeLine = [
            "status" => "draft",
            "grf_id" => $createdData->id,
        ];

        $this->timeline->create($timeLine);

        return ('Data has been stored');
    }



    /*
    *|--------------------------------------------------------------------------
    *| Store a new emergency GRF to GRF table
    *|--------------------------------------------------------------------------
    */
    public function handleStoreGrfEmergency($request)
    {
        $validatedData = $request->validate([
            'grf_code' => 'required',
            'warehouse_id' => 'nullable',
            'type' => 'nullable',
        ]);
        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['is_emergency'] = 1 ;
        $createdData = $this->grf->create($validatedData);

        $timeline =[
            'status' => 'draft',
            'grf_id' => $createdData->id,
        ];

        $this->timeline->create($timeline);

        return ('Data has been stored');
    }



    /*
    *|--------------------------------------------------------------------------
    *| Change the GRF status to submited
    *|--------------------------------------------------------------------------
    */
    public function handleUpdateRequestForm($request, $id)
    {
        $data = [
            "grf_id" => $id,
            "status" => "submited",
        ];

        $this->grf->find($id)->update($data);

        $this->timeline->create($data);

        return ('Data has been updated');
    }



    /*
    *|--------------------------------------------------------------------------
    *| Get request chart data by user
    *|--------------------------------------------------------------------------
    */
    public function handleChartDatas()
    {
        $requestStocks = $this->requestStock->with("grf")->whereHas("grf", function (Builder $query) {
            $query->where("user_id", Auth::user()->id);
        })->get();

        function chart ( $condition, $requestStocks ) {
            if ( count( $condition ) > 0 && count( $requestStocks ) > 0 ) {
                $calc = count( $condition ) / count( $requestStocks );
                return ( $calc * 100 );
            } else {
                return 0;
            }
        }

        $chartDatas = [
            "good" => chart( $requestStocks->where( "condition", "good"), $requestStocks ),
            "not_good" => chart( $requestStocks->where( "condition", "not good"), $requestStocks ),
            "used" => chart( $requestStocks->where( "condition", "used"), $requestStocks ),
            "replace" => chart( $requestStocks->where( "condition", "replace"), $requestStocks ),
            "requestStocks" => $requestStocks
        ];

        if ($chartDatas['good'] == 0 && $chartDatas['not_good'] == 0 && $chartDatas['used'] == 0 && $chartDatas['replace'] == 0) {
            return (false);
        } else {
            return ($chartDatas);
        }
    }

    // Request Form DELETE 
    public function handleDeleteRequestForm($id)
    {
        $requestForm = $this->requestForm->find($id)->delete();
        return ResponseJSON($requestForm, 200);
    }

    // Timeline for GRF
    public function handleTimelineGrf($grf)
    {
        //
    }

    // Request Form Generate GRF CODE
    public function handleGenerateGrfCode()
    {
        $allGrfs = count($this->grf->where('user_id', '=', Auth::user()->id)->get());
        $grfs = count($this->grf->where([['user_id', '=', Auth::user()->id], ['status', '!=', 'closed'], ['type', 'request'], ['is_emergency', 0]])->get());
        $emergency = $this->grf->where([['user_id', '=', Auth::user()->id], ['status', '!=', 'closed'], ['type', 'request'], ['is_emergency', 1]])->get();

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
        } else if ($emergency) {
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
        }
         else {
            $grf_code = null;
        }
        return ($grf_code);
    }



    /*
    *|--------------------------------------------------------------------------
    *| Close the GRF if it more than three day
    *|--------------------------------------------------------------------------
    */
    public function handleCloseThreeDay($grfs)
    {
        $grfsDelivery = $grfs->where('status', 'delivery_approved');
        $grfsDelivery->map(function ($grfDelivery) {
            if (now() > $grfDelivery->timelines->where('status', 'delivery_approved')->first()->created_at->addDays(1)) {
                $this->notification->create([
                    'user_id' => Auth::id(),
                    'title' => 'Pick up your item!',
                    'content' => 'We inform you to pickup your item',
                    'status' => 'unread',
                    'created_at' => now(),
                ]);
            }
            if (now() > $grfDelivery->timelines->where('status', 'delivery_approved')->first()->created_at->addDays(2)) {
                $grf = $this->grf->with('requestStocks')->find($grfDelivery->id);
                
                $grf->update([
                    'status' => 'closed'
                ]);

                foreach ($grf->requestStocks as $requestStock) {
                    $this->stock->where('sn_code', $requestStock->sn)->update(['stock_status' => 'in']);
                }

                $this->timeline->create([
                    'grf_id' => $grfDelivery->id,
                    'status' => 'closed',
                    'created_at' => now(),
                ]);
            }
        });
    }



    /*
    *|--------------------------------------------------------------------------
    *| Post Emergency GRF Document
    *|--------------------------------------------------------------------------
    */
    public function handleDocumentEmergencyGRF($request, $id)
    {
        $validatedData = $request->validate([
            'file' => 'required|max:5000'
        ]);

        if ($request->file('file')) {
            $validatedData['file'] = $request->file('file')->getClientOriginalName();
        } else {
            $validatedData['img'] = null;
        }

        $this->grf->where('id', $id)->update($validatedData);

        return('Data has been stored');

    }



    /*
    *|--------------------------------------------------------------------------
    *| Change the grf status to pickup
    *|--------------------------------------------------------------------------
    */
    public function handlePostApprovePickup($id)
    {
        $currentGrf = $this->grf->with('requestStocks')->find($id);
        
        foreach ($currentGrf->requestStocks as $requestStocks) {
            $this->stock->where('sn_code', $requestStocks->sn)->update(['stock_status' => 'out']);
        }

        $currentGrf->status = "user_pickup";
        $currentGrf->save();

        $this->timeline->create([
            'grf_id' => $id,
            'status' => 'user_pickup',
            'created_at' => now(),
        ]);

        // $grf->surat_jalan = $this->handleGenerateSuratJalan($grf->warehouse_id);
        // $grf->save();

        return "success";
    }



    /*
    *|--------------------------------------------------------------------------
    *| Delete emergency request file
    *|--------------------------------------------------------------------------
    */
    public function handleDeleteRequestDocument($id)
    {
        $this->grf->find($id)->update([
            "file" => null
        ]);

        return('File has benn deleted');
    }
}

// pada saat surat jalan terprint itu sudah harus 
