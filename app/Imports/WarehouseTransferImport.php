<?php

namespace App\Imports;


use App\Models\TransferStock;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

class WarehouseTransferImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(Array $row)
    {
        return new TransferStock([
            '' => $row[0],
        ]);
    }
}
