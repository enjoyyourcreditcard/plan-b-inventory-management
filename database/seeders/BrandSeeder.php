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
                'name' => 'Nokia',
                'status' => 'active',
                'created_at' => '2022-08-23 10:53:17',
                'updated_at' => '2022-08-23 10:53:17',
            ],
            [
                'status' => 'active',
                'name' => 'Samsung',
                'created_at' => '2022-08-23 10:53:17',
                'updated_at' => '2022-08-23 10:53:17',
            ],
            [
                'status' => 'active',
                'name' => 'Huawei',
                'created_at' => '2022-08-23 10:53:17',
                'updated_at' => '2022-08-23 10:53:17',
            ],
            [
                'status' => 'active',
                'name' => 'Oddo',
                'created_at' => '2022-08-23 10:53:17',
                'updated_at' => '2022-08-23 10:53:17',
            ]
        ];

        Brand::insert($brands);
    }
}
