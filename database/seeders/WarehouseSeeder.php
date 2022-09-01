<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Warehouse;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Warehouse::create([

            "wh_name" => "warehouse Depok" ,
            "regional" => "Depok",
            "kota" => "depok",
            "location" => "depok",
            "wh_type" => "sewa",
            "contract_status" => "sewa",
            "start_at" => "2022-08-03",
            "end_at" => "2022-08-03",
        ]);

        Warehouse::create([

            "wh_name" => "warehouse Jakarta" ,
            "regional" => "Depok",
            "kota" => "depok",
            "location" => "depok",
            "wh_type" => "sewa",
            "contract_status" => "sewa",
            "start_at" => "2022-08-03",
            "end_at" => "2022-08-03",
        ]);
    }
}
