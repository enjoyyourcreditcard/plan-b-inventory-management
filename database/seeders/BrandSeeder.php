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
        Brand::truncate();
        $brands = [
            [
                'name' => 'Nokia',
                'status' => 'active'
            ],
            [
                'status' => 'active',
                'name' => 'Samsung'
            ],
            [
                'status' => 'active',
                'name' => 'Huawei'
            ],
            [
                'status' => 'active',
                'name' => 'Oddo'
            ]
        ];

        Brand::insert($brands);
    }
}
