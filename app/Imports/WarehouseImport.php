<?php

namespace App\Imports;

use App\Models\RequestStock;
use Maatwebsite\Excel\Concerns\ToModel;

class WarehouseImport implements ToModel
{
    /**
     * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // $importStock = Stock::where('id', session('sn_code'))->get();
        // for ($i=0; $i < count($importStock); $i++) { 
        //     if ($importStock[$i]) {
        //     }
        // }
        return new RequestStock([
            'request_form_id' => $row[1],
            'grf_id' => $row[2],
            'part_id' => $row[3],
            'sn' => $row[4],
        ]);
    }
}