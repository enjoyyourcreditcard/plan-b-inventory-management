<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HistoryPrice;

class HistoryPriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HistoryPrice::truncate();

        $historyprice = [
            [
                'part_id' => 1,
                'price' => '100000',
                'created_at' => '2022-08-23 10:53:17',
                'updated_at' => '2022-08-23 10:53:17',
            ],
           
        ];

        HistoryPrice::insert($historyprice);
    }
}
