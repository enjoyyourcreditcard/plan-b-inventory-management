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
        // $part_id = [796, 12, 881, 1093];
        $warehouse_id = [1, 2];

        // Stock::create([
        //     'part_id' => 1419,
        //     'warehouse_id' => 1,
        //     'sn_code' => 12345,
        //     'condition' => 'GOOD NEW',
        //     'expired_date' => '2025-11-02',
        //     'stock_status' => 'in',
        //     'status' => 'active',
        // ]);

        // Stock::create([
        //     'part_id' => 1419,
        //     'warehouse_id' => 1,
        //     'sn_code' => 23456,
        //     'condition' => 'GOOD NEW',
        //     'expired_date' => '2025-11-02',
        //     'stock_status' => 'in',
        //     'status' => 'active',
        // ]);

        // Stock::create([
        //     'part_id' => 1419,
        //     'warehouse_id' => 1,
        //     'sn_code' => 34567,
        //     'condition' => 'GOOD NEW',
        //     'expired_date' => '2025-11-02',
        //     'stock_status' => 'in',
        //     'status' => 'active',
        // ]);

        // Stock::create([
        //     'part_id' => 1419,
        //     'warehouse_id' => 1,
        //     'sn_code' => 45678,
        //     'condition' => 'GOOD NEW',
        //     'expired_date' => '2025-11-02',
        //     'stock_status' => 'in',
        //     'status' => 'active',
        // ]);

        // Stock::create([
        //     'part_id' => 1419,
        //     'warehouse_id' => 1,
        //     'sn_code' => 56789,
        //     'condition' => 'GOOD NEW',
        //     'expired_date' => '2025-11-02',
        //     'stock_status' => 'in',
        //     'status' => 'active',
        // ]);

        // Stock::create([
        //     'part_id' => 1093,
        //     'warehouse_id' => 1,
        //     'sn_code' => 67890,
        //     'condition' => 'GOOD NEW',
        //     'expired_date' => '2025-11-02',
        //     'stock_status' => 'in',
        //     'status' => 'active',
        // ]);

        // part.
        for ($j = 1; $j < 1420; $j++) {
            for ($i = 0; $i < 10; $i++) {
                try {
                    Stock::create([
                        'part_id' => $j,
                        'warehouse_id' => $warehouse_id[array_rand($warehouse_id)],
                        'sn_code' => '14045' . $i.$j,
                        'condition' => 'GOOD NEW',
                        'expired_date' => '2025-11-02',
                        'stock_status' => 'in',
                        'status' => 'active',
                    ]);
                } catch (\Throwable $th) {
                    continue;
                }
                
              
            }
        }
    }
}
