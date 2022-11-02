<?php

namespace Database\Seeders;

use App\Models\RequestForm;
use Illuminate\Database\Seeder;

class RequestFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RequestForm::create([
            "grf_id" => 1,
            "segment_id" => 2,
            "brand_id" => 14,
            "part_id" => null,
            "quantity" => 10,
        ]);

       
        RequestForm::create([
            "grf_id" => 1,
            "segment_id" => 1,
            "brand_id" => 14,
            "part_id" => null,
            "quantity" => 10,
        ]);

        RequestForm::create([
            "grf_id" => 2,
            "segment_id" => 2,
            "brand_id" => 14,
            "part_id" => 796,
            "quantity" => 2,
        ]);

        RequestForm::create([
            "grf_id" => 2,
            "segment_id" => 1,
            "brand_id" => 92,
            "part_id" => 1093,
            "quantity" => 4,
        ]);
    }
}
