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
                'warehouse_id' => 1,
                'condition' => 'good new',
                'expired_date' => '2022-12-05',
                'stock_status' => 'in',
                'status' => 'active'
        ]);
        Inbound::create([  
                'part_id' => 12,
                'warehouse_id' => 1,
                'condition' => 'good new',
                'expired_date' => '2022-12-05',
                'stock_status' => 'in',
                'status' => 'active'
        ]);
        Inbound::create([  
                'part_id' => 23,
                'warehouse_id' => 1,
                'condition' => 'good new',
                'expired_date' => '2022-12-05',
                'stock_status' => 'in',
                'status' => 'active'
        ]);
        Inbound::create([  
                'part_id' => 34,
                'warehouse_id' => 1,
                'condition' => 'good new',
                'expired_date' => '2022-12-05',
                'stock_status' => 'in',
                'status' => 'active'
        ]);
        Inbound::create([ 
                'part_id' => 45,
                'warehouse_id' => 1,
                'condition' => 'good new',
                'expired_date' => '2022-12-05',
                'stock_status' => 'in',
                'status' => 'active'
        ]);
        Inbound::create([  
                'part_id' => 56,
                'warehouse_id' => 1,
                'condition' => 'good new',
                'expired_date' => '2022-12-05',
                'stock_status' => 'in',
                'status' => 'active'
        ]);
        
    }
}
