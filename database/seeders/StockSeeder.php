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
        $part_id = [796, 811, 881, 1093];
        $warehouse_id = [1, 2];

        Stock::create([
            'part_id' => 796,
            'warehouse_id' => 1,
            'sn_code' => 12345,
            'condition' => 'GOOD NEW',
            'expired_date' => '2025-11-02',
            'stock_status' => 'in',
            'status' => 'active',
        ]);
        
        Stock::create([
            'part_id' => 796,
            'warehouse_id' => 1,
            'sn_code' => 23456,
            'condition' => 'GOOD NEW',
            'expired_date' => '2025-11-02',
            'stock_status' => 'in',
            'status' => 'active',
        ]);

        Stock::create([
            'part_id' => 1093,
            'warehouse_id' => 1,
            'sn_code' => 34567,
            'condition' => 'GOOD NEW',
            'expired_date' => '2025-11-02',
            'stock_status' => 'in',
            'status' => 'active',
        ]);

        Stock::create([
            'part_id' => 1093,
            'warehouse_id' => 1,
            'sn_code' => 45678,
            'condition' => 'GOOD NEW',
            'expired_date' => '2025-11-02',
            'stock_status' => 'in',
            'status' => 'active',
        ]);

        Stock::create([
            'part_id' => 1093,
            'warehouse_id' => 1,
            'sn_code' => 56789,
            'condition' => 'GOOD NEW',
            'expired_date' => '2025-11-02',
            'stock_status' => 'in',
            'status' => 'active',
        ]);

        Stock::create([
            'part_id' => 1093,
            'warehouse_id' => 1,
            'sn_code' => 67890,
            'condition' => 'GOOD NEW',
            'expired_date' => '2025-11-02',
            'stock_status' => 'in',
            'status' => 'active',
        ]);

        Stock::create([
            'part_id' => 811,
            'warehouse_id' => 1,
            'sn_code' => 98765,
            'condition' => 'GOOD NEW',
            'expired_date' => '2025-11-02',
            'stock_status' => 'in',
            'status' => 'active',
        ]);

        for ($i=0; $i < 100; $i++) { 
            Stock::create([
                'part_id' => $part_id[array_rand($part_id)],
                'warehouse_id' => $warehouse_id[array_rand($warehouse_id)],
                'sn_code' => '14045'.$i,
                'condition' => 'GOOD NEW',
                'expired_date' => '2025-11-02',
                'stock_status' => 'in',
                'status' => 'active',
            ]);
        }
    }
}
