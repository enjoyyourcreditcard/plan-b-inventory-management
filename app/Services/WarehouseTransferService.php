<?php

namespace App\Services;

use App\Models\Irf;
use App\Models\Part;
use App\Models\Timeline;
use App\Models\TransferForm;
use App\Models\TransferStock;
use Illuminate\Support\Facades\Auth;

class WarehouseTransferService
{
    public function __construct(Irf $irf, Timeline $timeline, TransferForm $transferForm, TransferStock $transferStock, Part $part)
    {
        $this->irf           = $irf;
        $this->part          = $part;
        $this->timeline      = $timeline;
        $this->transferForm  = $transferForm;
        $this->transferStock = $transferStock;
    }
    
    /*
    *--------------------------------------------------------------------------
    * IC: generate IRF code
    *--------------------------------------------------------------------------
    */
    public function handleGenerateIrfCode()
    {
        $allIrfs     = count($this->irf->all());
        $irfs        = count($this->irf->where('status', '!=', 'closed')->get());
        $rawMonth    = now()->format('m');
        $map         = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
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

        $attempt = $allIrfs + 1;
        $name    = str_replace(' ', '-', strtoupper(Auth::user()->name));
        $month   = $returnValue;
        $year    = now()->format('Y');

        if ($allIrfs > 0) {
            if ($allIrfs >= 9) {
                $irfCode = '0' . $attempt . '/' . $name . '/' . 'INVENTREE' . '/' . $month . '/' . $year;
            } else {
                $irfCode = '00' . $attempt . '/' . $name . '/' . 'INVENTREE' . '/' . $month . '/' . $year;
            }
        } else {
            $irfCode = '001' . '/' . $name . '/' . 'INVENTREE' . '/' . $month . '/' . $year;
        }

        return ($irfCode);
    }
    
    /*
    *--------------------------------------------------------------------------
    * IC: Get all IRF
    *--------------------------------------------------------------------------
    */
    public function handleAllIrf()
    {
        $irfs = $this->irf->with('transferForms')->get();

        $irfs->map(function ($irf) {
            $irf['total_stock'] = 0;

            $irf->transferForms->map(function ($transferForm) use ($irf) {
                $irf['total_stock'] += $transferForm->quantity;
            });
        });

        return ($irfs);
    }
    
    /*
    *--------------------------------------------------------------------------
    * IC: Store IRF
    *--------------------------------------------------------------------------
    */
    public function handleStoreIrf($request)
    {
        $validatedData = $request->validate([
            'irf_code' => 'required',
            'type'     => 'required',
        ]);

        $validatedData['status'] = 'draft';

        $createdData = $this->irf->create($validatedData);

        $this->timeline->create([
            "status" => "draft",
            "irf_id" => $createdData->id,
        ]);

        return ('Data has been stored');
    }

    /*
    *|--------------------------------------------------------------------------
    *| IC: Get the current IRF
    *|--------------------------------------------------------------------------
    */
    public function handleGetCurrentIrf($code)
    {
        return $this->irf->with('timelines', 'transferForms', 'transferStocks')->where('irf_code', '=', str_replace('~', '/', $code))->first();
    }

    /*
    *|--------------------------------------------------------------------------
    *| IC: Get TransferForm / IRF
    *|--------------------------------------------------------------------------
    */
    public function handleGetTransferFormPerIrf($code)
    {
        return $this->irf->with('transferForms.part', 'transferForms.transferStocks')->where([['irf_code', '=', str_replace('~', '/', $code)], ['status', '!=', 'closed']])->first()->transferForms;
    }

    /*
    *|--------------------------------------------------------------------------
    *| IC: Store item to transfer form
    *|--------------------------------------------------------------------------
    */
    public function handleStoreWarehouseForm($request, $id)
    {
        if ($request->warehouse_id != null && $request->warehouse_destination != null) {
            $validatedWarehouseId = $request->validate([
                'warehouse_id'          => 'required',
                'warehouse_destination' => 'required',
            ]);

            $this->irf->find($id)->update($validatedWarehouseId);
        }

        $validatedData = $request->validate([
            'part_id'  => 'required',
            'quantity' => 'required',
        ]);

        $validatedData['irf_id'] = $id;

        $transferCreated = $this->transferForm->create($validatedData);
        $sn_status       = $this->part->find($validatedData['part_id'])->sn_status;

        return ('Stored');
    }
}