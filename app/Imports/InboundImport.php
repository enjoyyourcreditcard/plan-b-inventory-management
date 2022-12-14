<?php

namespace App\Imports;

use App\Models\Inbound;
use App\Models\Part;
use App\Models\User;
use App\Models\Warehouse;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Psy\Readline\Hoa\Console;

class InboundImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    
    /**
     * @return int
     */

    public function startRow(): int
    {
        return 2;
    }
    
    public function Model(array $row)
    {
        return new Inbound([]);
    }
}
