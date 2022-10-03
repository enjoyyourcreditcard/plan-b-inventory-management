<?php

namespace Database\Seeders;

use App\Models\Grf;
use Illuminate\Database\Seeder;

class GrfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grf::create([
            'grf_code' => '001/HAJIDALAKHTAR/IB/IX/2022',
            'user_id' => 1,
            'warehouse_id' => 1,
        ]);

    }
}
