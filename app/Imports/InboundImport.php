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
        // dd(Carbon::parse($row['expired_date']));
        if (isset($row['part_id']) == false ) {
            $row['part_id'] = Part::where('name', $row['part'])->first('id')->id;
            if (isset($row['warehouse_id']) == false) {
                $row['warehouse_id'] = Warehouse::where('wh_name', $row['warehouse'])->first('id')->id;
            }
        }
        return new Inbound([
            'part_id'       => $row['part_id'], 
            'warehouse_id'  => $row['warehouse_id'],
            'sn_code'       => $row['sn_code'],
            'orafin_code'   => $row['orafin_code'],
            'condition'     => $row['condition'],
            // 'expired_date'  => $row['expired_date'],
            'expired_date'  => Carbon::parse($row['expired_date']),
            'stock_tatus'   => $row['stock_status'],
            'status'        => $row['status'],
        ]);
    }

    // protected $part = 'part';
    // protected $warehouse = 'warehouse';
    // public function __construct()
    // {
      // QUERY UNTUK MENGAMBIL SELURUH DATA USER
    //     $this->part = Part::select('id', 'name')->get();
    //     $this->warehouse = Warehouse::select('id', 'wh_name');
    // }

    // public function model(array $row)
    // {
    //     $part = $this->part->where('name', $row['name'])->first();
    //     $warehouse = $this->warehouse->where('wh_name', $row['wh_name'])->first();
    //     return new Inbound([
    //         'part_id' => $part->id ?? NULL,
    //         'warehouse_id' => $warehouse->id ?? NULL,
    //         'sn_code' => $row[0],
    //         'condition' => $row[3],
    //         'inbound_status' => $row[4],
    //         'inbound_date' => $row[5],
    //     ]);
    // }
}
