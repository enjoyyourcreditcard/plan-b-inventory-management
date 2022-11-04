<?php

namespace Database\Seeders;

use App\Models\Inbound;
use Illuminate\Database\Seeder;

class InboundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Inbound::create([ 
                'part_id' => 1,
                'orafin_code' => '123',
                'sn_code' => '14045100',
                'status' => 'active',
                'is_select' => 1,
        ]);
        Inbound::create([  
                'part_id' => 12,
                'orafin_code' => '124',
                'sn_code' => '14045101',
                'status' => 'active',
                'is_select' => 1,
        ]);
        Inbound::create([  
                'part_id' => 23,
                'orafin_code' => '125',
                'sn_code' => '14045102',
                'status' => 'active',
                'is_select' => 1,
        ]);
        Inbound::create([  
                'part_id' => 34,
                'orafin_code' => '126',
                'sn_code' => '14045103',
                'status' => 'active'
        ]);
        Inbound::create([ 
                'part_id' => 45,
                'orafin_code' => '127',
                'sn_code' => '14045104',
                'status' => 'active'
        ]);
        Inbound::create([  
                'part_id' => 56,
                'orafin_code' => '128',
                'sn_code' => '14045105',
                'status' => 'active'
        ]);
        
    }
}
