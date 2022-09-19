<?php

namespace Database\Seeders;

use App\Models\Request;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('db_requests')->insert([
            [
                'grf_code' => '001llNE0-GRr/lB/xl/2005', 
                'user_id' => 1, 
                'warehouse_id' => 1, 
                'part_id' => 5, 
                'quantity' => 500, 
                'remarks' => 'Lorem ipsum dolor bruh moment',
                'status' => 'active'
            ],    
            [
                'grf_code' => '002llNE0-GRr/lB/xl/1995', 
                'user_id' => 1, 
                'warehouse_id' => 2, 
                'part_id' => 100, 
                'quantity' => 400, 
                'remarks' => 'Lorem ipsum dolor bruh moment',
                'status' => 'active'
            ],    
            [
                'grf_code' => '003llNE0-GRr/lB/xl/1945', 
                'user_id' => 1, 
                'warehouse_id' => 1, 
                'part_id' => 10, 
                'quantity' => 2500, 
                'remarks' => 'Lorem ipsum dolor bruh moment',
                'status' => 'active'
            ],    
            [
                'grf_code' => '004llNE0-GRr/lB/xl/2022', 
                'user_id' => 1, 
                'warehouse_id' => 2, 
                'part_id' => 35, 
                'quantity' => 400, 
                'remarks' => 'Lorem ipsum dolor bruh moment',
                'status' => 'active'
            ],    
            [
                'grf_code' => '005llNE0-GRr/lB/xl/1998', 
                'user_id' => 1, 
                'warehouse_id' => 2, 
                'part_id' => 20, 
                'quantity' => 40, 
                'remarks' => 'Lorem ipsum dolor bruh moment',
                'status' => 'active'
            ],    
        ]);
    }
}
