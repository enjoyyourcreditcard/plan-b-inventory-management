<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Stock::create([
            'part_id' => 1,
            'warehouse_id' => 1,
            'condition' => 'GOOD NEW',
            'expired_date' => '2022-10-01',
            'stock_status' => 'in',
            'status' => 'active',
        ]);
        
        Stock::create([
            'part_id' => 1,
            'warehouse_id' => 1,
            'condition' => 'GOOD NEW',
            'expired_date' => '2022-10-01',
            'stock_status' => 'in',
            'status' => 'active',
        ]);

        Stock::create([
            'part_id' => 1,
            'warehouse_id' => 2,
            'condition' => 'GOOD NEW',
            'expired_date' => '2022-12-01',
            'stock_status' => 'in',
            'status' => 'active',
        ]);

        Stock::create([
            'part_id' => 1,
            'warehouse_id' => 2,
            'condition' => 'GOOD NEW',
            'expired_date' => '2022-12-05',
            'stock_status' => 'in',
            'status' => 'active',
        ]);

        Stock::create([
            'part_id' => 1,
            'warehouse_id' => 1,
            'condition' => 'GOOD NEW',
            'expired_date' => '2022-07-03',
            'stock_status' => 'in',
            'status' => 'active',
        ]);

        Stock::create([
            'part_id' => 3,
            'warehouse_id' => 2,
            'sn_code' => '77447497',
            'condition' => 'GOOD NEW',
            'expired_date' => '2022-12-05',
            'stock_status' => 'in',
            'status' => 'active',
        ]);

        Stock::create([
            'part_id' => 3,
            'warehouse_id' => 1,
            'sn_code' => '24969229',
            'condition' => 'GOOD NEW',
            'expired_date' => '2022-07-03',
            'stock_status' => 'in',
            'status' => 'active',
        ]);
    }
}
