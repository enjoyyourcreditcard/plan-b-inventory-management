<?php

namespace Database\Seeders;

use App\Models\GrfInbound;
use Illuminate\Database\Seeder;

class InboundGrfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GrfInbound::create([
            'inbound_grf_code' => '001/HAJIDALAKHTAR/Inbound/X/2022',
            'user_id' => 1,
        ]);
    }
}