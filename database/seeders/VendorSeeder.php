<?php

namespace Database\Seeders;

use App\Models\Vendor;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $endDate = Carbon::create(2024, 1, 1, 0, 0, 0);
        $vendors = [
            [
                'name' => 'Vendor1',
                'status' => 'active',
                'start_at' => Carbon::now(),
                'end_at' => $endDate,
            ],
            [
                'name' => 'Vendor2',
                'status' => 'active',
                'start_at' => Carbon::now(),
                'end_at' => $endDate,
            ],
        ];

        foreach ($vendors as $key => $v) {
            Vendor::create($v);
        }
    }
}
