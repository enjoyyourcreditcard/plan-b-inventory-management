<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\Part;
use App\Models\User;
use App\Models\Inbound;
use App\Models\Warehouse;
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
            $row['part_id'] = Part::where('name', $row['part'])->where('brand_name',$row['brand'])->first('id')->id;
            if (isset($row['warehouse_id']) == false) {
                $row['warehouse_id'] = Warehouse::where('name', $row['warehouse'])->first('id')->id;
            }
        }

        return new Inbound([
            'part_id'       => $row['1'],
            'orafin_code'   => $row['2'],
            'sn_code'       => $row['3'],
            'stock_tatus'   => $row['4'],
            'quantity'      => $row['5'],
            'status'        => $row['6'],
            'warehouse'     => $row['7'],
            'brand'         => $row['brand']
        ]);
    }
}
