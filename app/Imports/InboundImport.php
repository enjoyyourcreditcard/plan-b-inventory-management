<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\Part;
use App\Models\User;
use App\Models\Inbound;
use App\Models\Warehouse;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

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

    // private $warehouse;
    // private $part;

    // public function __construct()
    // {
    //     $this->part = User::select('id', 'name')->get();
    //     $this->warehouse = Warehouse::select('id', 'wh_name')->get();
    // }
    
    public function startRow(): int
    {
        return 2;
    }
    
    public function Model(array $row)
    {
        if (isset($row['part_id']) == false ) {
            $row['part_id'] = Part::where('name', $row['part'])->first('id')->id;
        }
        
        return new Inbound([
            'part_id'       => $row['1'],
            'sn_code'       => $row['3'],
            'orafin_code'   => $row['2'],
            'stock_tatus'   => $row['4'],
            'status'        => $row['5'],
        ]);
    }
}
