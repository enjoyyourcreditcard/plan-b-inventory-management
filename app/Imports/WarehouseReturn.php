<?php

namespace App\Imports;

use App\Models\RequestStock;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class WarehouseReturn implements ToModel
{
     /**
     * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new RequestStock([
            '' => $row[0],
        ]);
    }
}