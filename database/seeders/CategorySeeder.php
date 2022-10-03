<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Throwable;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'ASSESORIES',
            'description' => 'lorem ipsum dolor amogus',
            'uom' => 'meter, set, unit, each',
        ]);

        Category::create([
            'name' => 'CPE',
            'description' => 'lorem ipsum dolor amogus',
            'uom' => 'each, unit',
        ]);

        Category::create([
            'name' => 'MATERIAL',
            'description' => 'lorem ipsum dolor amogus',
            'uom' => 'ball, batang, each, kaleng, kg, kubic, lembar, liter, meter, pack, roll, sak, set, unit, zak',
        ]);
    }
}
