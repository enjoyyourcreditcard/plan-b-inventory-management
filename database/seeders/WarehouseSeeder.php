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

            "name" => "MNC Warehouse Depok" ,
            "regional" => "Jabodetabek",
            "city" => "depok",
            "location" => "Jl. Tugu Raya, Tugu, Kec. Cimanggis, Kota Depok, Jawa Barat 16451",
            "type" => "Gedung",
            "contract_status" => "Contract",
            "start_at" => "2022-08-03",
            "end_at" => "2022-08-03",
        ]);

        Warehouse::create([

            "name" => "MNC Warehouse Jakarta" ,
            "regional" => "Jakarta",
            "city" => "Jakarta",
            "location" => "Jalan Kebon Sirih No. 17-19, Kebon Sirih, Menteng, RT.15/RW.7, Kb. Sirih, Menteng, Kota Jakarta Pusat, ",
            "type" => "Ruko",
            "contract_status" => "Permanent",
            "start_at" => "2022-08-03",
            "end_at" => "2022-08-03",
        ]);
    }
}
