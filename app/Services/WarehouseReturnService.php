<?php

namespace App\Services;

use App\Imports\WarehouseReturn;
use App\Models\Grf;
use App\Models\RequestStock;
use App\Models\Stock;
use Illuminate\Support\Facades\Request;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

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
        $requestStockPerPart = $this->requestStock->where([['grf_id', $request->grf_id], ['part_id', $request->part_id]])->get();

        foreach ($request->sn_code as $key => $sn_code) {
            $requestStockPerPart[$key]->update([
                'sn_return' => $sn_code,
            ]);
        }

        return('data stored');
    }

    public function hanldeImportWarehouseReturn($request) {
        $reqStok = $this->requestStock->where([['grf_id', $request->grf_id], ['part_id', $request->part_id]])->get();

        $excel = Excel::toCollection(new WarehouseReturn, $request->file);

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
        $grf->status = "closed";
        $grf->surat_jalan = $transactionService->handleGenerateSuratJalan(1);
        $grf->save();
        return "success";
    }
}