<?php

namespace App\Services;

use App\Imports\WarehouseReturn;
use App\Models\Grf;
use App\Models\RequestStock;
use App\Models\Stock;
use Illuminate\Support\Facades\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class WarehouseReturnService {

    public function __construct(Grf $grf, RequestStock $requestStock, Stock $stock)
    {
        $this->grf = $grf;
        $this->requestStock = $requestStock;
        $this->stock = $stock;    
    }

    public function handleGroupReturn(){
        $whreturn = $this->whapprov->all()->groupBy('grf_code');
        return ($whreturn);
    }

    public function handleStoreWhReturn($request, $id) {
        // $request['sn_code'] = array_filter($request->sn_code);

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
        $grf = $this->grf->with('requestStocks')->find($req->id);
        
        foreach ($grf->requestStocks as $requestStock) {
            $this->stock->where('sn_code', $requestStock->sn_return)->update([
                'stock_status' => 'in', 
            ]);
        }

        if ($grf->requestStocks->contains('sn_return', null)) {
            null;
        } else {
            $grf->status = "closed";
        }
        
        $grf->surat_jalan = $transactionService->handleGenerateSuratJalan(1);
        $grf->save();
        return "success";
    }
}