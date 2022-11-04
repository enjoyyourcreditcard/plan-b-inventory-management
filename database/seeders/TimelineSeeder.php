<?php

namespace Database\Seeders;

use App\Models\Timeline;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TimelineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Timeline::create([
            "grf_id" => 2,
            'grf_inbound_id' => 0,
            "status" => "draft",
        ]);

        Timeline::create([
            "grf_id" => 0,
            'grf_inbound_id' => 1,
            "status" => "draft",
        ]);
    }
}
