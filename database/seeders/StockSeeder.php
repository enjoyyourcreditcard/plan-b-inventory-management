<?php

namespace Database\Seeders;

use App\Models\Part;
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
        $warehouse_id = [1, 2];

        for ($j = 1; $j < 1420; $j++) {
            $part      = Part::find($j);
            $sn_status = (isset($part) ? $part->sn_status : null);
            
            if ($sn_status == 'SN' || $sn_status == 'sn') {
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
            } else {
                try {
                    Stock::create([
                        'part_id' => $j,
                        'warehouse_id' => $warehouse_id[array_rand($warehouse_id)],
                        'quantity' => 1000,
                        'good' => 1000,
                        'not_good' => 0,
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
