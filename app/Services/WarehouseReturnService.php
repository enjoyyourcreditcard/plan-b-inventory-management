<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Grf;
use App\Models\Stock;
use App\Models\RequestForm;
use App\Models\RequestStock;
use Illuminate\Validation\Rule;
use App\Imports\WarehouseReturn;
use Illuminate\Validation\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;

class WarehouseReturnService {

    public function __construct(Grf $grf, RequestStock $requestStock, Stock $stock, RequestForm $requestForm)
    {
        $this->grf = $grf;
        $this->requestStock = $requestStock;
        $this->requestForm = $requestForm;
        $this->stock = $stock;
    }

    public function handleGroupReturn(){
        $whreturn = $this->whapprov->all()->groupBy('grf_code');
        return ($whreturn);
    }

    public function handleStoreWhReturn($request, $id) {

        $validateData = $request->validate([
            'sn_code.*' => 'distinct|exists:request_stocks,sn|nullable|sometimes',
            'sn_code' => ['array', 'nullable', 'sometimes']
        ]);

        $requestStockPerPart = $this->requestStock->where('part_id', $request->part_id)->get();
        foreach ($request->sn_code as $key => $sn_code) {
            $requestStockPerPart[$key]->update([
                'sn_return' => $sn_code,
            ]);
        }

        // dd("okee");
        return('data stored');
    }

    public function hanldeImportWarehouseReturn($request) {
        $file = $request->file;
        $excel = Excel::toCollection(new WarehouseReturn, $file);
        $sn_code = [];
        foreach ($excel->first() as $row) {
            $sn_code[] = $row->first();
        }
        $request['sn_return'] = $sn_code;
        $validateData = $request->validate([
            'sn_return.*' => 'distinct', 
            'sn_return' => ['required', 'array'],
        ]);
        
        $reqStok = $this->requestStock->where([['grf_id', $request->grf_id], ['part_id', $request->part_id]])->get();
    
            foreach ($reqStok as $key => $reqStoks) {
                $reqStoks->update([
                    'sn_return' => $excel->first()[$key]->first(),
                ]);
            }
    
            return('data Stored!!');
    }

    public function handlePostApproveReturnWH($req, $transactionService)
    {
        $grf = $this->grf->with('requestStocks.stock')->find($req->id);
        
        foreach ($grf->requestStocks->where('sn', '!=', null)->where('condition', 'good') as $requestStock) {
            $this->stock->where('sn_code', $requestStock->sn_return)->update([
                'stock_status' => 'in', 
            ]);
        }

        foreach ($grf->requestStocks->where('sn', null)->where('condition', 'good') as $requestStock) {
            $stockIn = $this->stock->where([['part_id', $requestStock->part_id], ['warehouse_id', $grf->warehouse_id], ['sn_code', null], ['stock_status', 'in']])->first();
            // $stockOut = $this->stock->where([['part_id', $requestStock->part_id], ['warehouse_id', $grf->warehouse_id], ['sn_code', null], ['stock_status', 'out']])->first();
            $stockOut = $requestStock->stock;

            $stockIn->update([
                'good'      => $stockIn->good + $stockOut->good,
                'not_good'  => $stockIn->not_good + $stockOut->not_good
            ]);

            $stockIn->update([
                'quantity'  => $stockIn->good + $stockIn->not_good,
            ]);
            
            // $stockOut->update([
            //     'quantity' => $stockOut->quantity - $requestStock->quantity_return
            // ]);

            if ($stockOut->quantity < 1) {
                $stockOut->update([
                    'status' => 'non_active'
                ]);
            }
        }

        if ($grf->requestStocks->contains([['sn_return', null], ['condition', 'good']])) {
            null;
        } else {
            $grf->status = "closed";
        }
        
        $grf->surat_jalan = $transactionService->handleGenerateSuratJalan(1);
        $grf->save();
        return "success";
    }

    /*
    *--------------------------------------------------------------------------
    * return Non SN
    *--------------------------------------------------------------------------
    */
    public function handleReturnNonSnWhApproval($request)
    {
        $validatedData = $request->validate([
            'request_form_id' => 'required',
            'grf_id'          => 'required',
            'part_id'         => 'required',
            'quantity'        => 'nullable',
            'good'            => 'required',
            'not_good'        => 'required',
        ]);

        $requestStock = $this->requestStock->with('stock')->where([['request_form_id', $request->request_form_id], ['grf_id', $request->grf_id], ['part_id', $request->part_id]])->first();

        $requestStock->update([
            'quantity_return' => $request->quantity
        ]);

        $requestStock->stock->update([
            'good'     => $validatedData['good'],
            'not_good' => $validatedData['not_good'],
        ]);

        return ('data stored!');
    }
}