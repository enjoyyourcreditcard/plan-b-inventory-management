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

        $validateData = $request->validate([
            'sn_code.*' => 'distinct|exists:request_stocks,sn_return',
            'sn_code' => ['required', 'array']
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
        $grf = $this->grf->find($req->id);
        $grf->status = "closed";
        $grf->surat_jalan = $transactionService->handleGenerateSuratJalan(1);
        $grf->save();
        return "success";
    }
}