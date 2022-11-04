<?php

namespace Database\Seeders;

use App\Models\OrderInbound;
use Illuminate\Database\Seeder;

class InboundOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderInbound::create([
            'grf_inbound_id' => 1,
            'inbound_id' => 1,
        ]);
        OrderInbound::create([
            'grf_inbound_id' => 1,
            'inbound_id' => 2,
        ]);
        OrderInbound::create([
            'grf_inbound_id' => 1,
            'inbound_id' => 3,
        ]);
    }
}