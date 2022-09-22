<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            [
                'name' => 'HUAWEI',
                'status' => 'active',
                'segment_id' => 1,
                'created_at' => '2022-08-23 10:53:17',
                'updated_at' => '2022-08-23 10:53:17',
            ],
            [
                'name' => 'SPOTELINDO MITRA UTAMA',
                'status' => 'active',
                'segment_id' => 2,
                'created_at' => '2022-08-23 10:53:17',
                'updated_at' => '2022-08-23 10:53:17',
            ],
            [
                'name' => 'ZTE',
                'status' => 'active',
                'segment_id' => 2,
                'created_at' => '2022-08-23 10:53:17',
                'updated_at' => '2022-08-23 10:53:17',
            ],
            [
                'name' => 'POWER CELL',
                'status' => 'active',
                'segment_id' => 1,
                'created_at' => '2022-08-23 10:53:17',
                'updated_at' => '2022-08-23 10:53:17',
            ]
        ];

        Brand::insert($brands);
    }
}
