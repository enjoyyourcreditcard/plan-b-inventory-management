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
            'wh_id' => 1,
            'condition' => 'good new',
            'expired_date' => '2022-10-01',
            'stock_status' => 'in',
            'status' => 'active',
        ]);

        Stock::create([
            'part_id' => 1,
            'wh_id' => 2,
            'condition' => 'good rekondisi',
            'expired_date' => '2022-12-01',
            'stock_status' => 'in',
            'status' => 'active',
        ]);

        Stock::create([
            'part_id' => 1,
            'wh_id' => 2,
            'condition' => 'good potongan',
            'expired_date' => '2022-12-05',
            'stock_status' => 'in',
            'status' => 'active',
        ]);

        Stock::create([
            'part_id' => 1,
            'wh_id' => 1,
            'condition' => 'not good',
            'expired_date' => '2022-07-03',
            'stock_status' => 'in',
            'status' => 'active',
        ]);

        Stock::create([
            'part_id' => 3,
            'wh_id' => 2,
            'sn_code' => 'qwertz',
            'condition' => 'good potongan',
            'expired_date' => '2022-12-05',
            'stock_status' => 'in',
            'status' => 'active',
        ]);

        Stock::create([
            'part_id' => 3,
            'wh_id' => 1,
            'sn_code' => 'qwerty',
            'condition' => 'not good',
            'expired_date' => '2022-07-03',
            'stock_status' => 'in',
            'status' => 'active',
        ]);
    }
}
