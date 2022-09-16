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
            'grf_code' => '001/HAJIDALAKHTAR/IB/IX/2022',
            'user_id' => 1,
            'warehouse_id' => 1,
            'part_id' => 1,
            'quantity' => 70,
            'remarks' => 'Lorem ipsum dolor amogus moment',
            'warehouse_check' => false
        ]);

        RequestForm::create([
            'grf_code' => '001/HAJIDALAKHTAR/IB/IX/2022',
            'user_id' => 1,
            'warehouse_id' => 1,
            'part_id' => 2,
            'quantity' => 20,
            'remarks' => 'Lorem ipsum dolor amogus moment',
            'warehouse_check' => false
        ]);

        RequestForm::create([
            'grf_code' => '001/HAJIDALAKHTAR/IB/IX/2022',
            'user_id' => 1,
            'warehouse_id' => 1,
            'part_id' => 3,
            'quantity' => 10,
            'remarks' => 'Lorem ipsum dolor amogus moment',
            'warehouse_check' => false
        ]);

        RequestForm::create([
            'grf_code' => '001/ACTOR-NUMBER-ONE/IB/IX/2022',
            'user_id' => 2,
            'warehouse_id' => 1,
            'part_id' => 2,
            'quantity' => 20,
            'remarks' => 'Lorem ipsum dolor amogus moment',
            'warehouse_check' => false
        ]);

        RequestForm::create([
            'grf_code' => '001/ACTOR-NUMBER-ONE/IB/IX/2022',
            'user_id' => 2,
            'warehouse_id' => 1,
            'part_id' => 3,
            'quantity' => 40,
            'remarks' => 'Lorem ipsum dolor amogus moment',
            'warehouse_check' => false
        ]);
    }
}
