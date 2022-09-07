<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

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
            'name' => 'Mechanical/Enclosures',
            'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestiae hic nulla quis vitae, eveniet, sunt quidem eaque quae, non quisquam quaerat delectus beatae vero soluta dolores! Est praesentium perspiciatis neque!',
            'uom' => 'set, unit, each'
        ]);
        
        Category::create([
            'name' => 'Electronics/Connectors/Pin Headers',
            'description' => 'sunt quidem eaque quae, non quisquam quaerat delectus beatae vero soluta dolores! Est praesentium perspiciatis neque Lorem ipsum dolor sit amet consectetur, adipisicing elit. Molestiae hic nulla quis vitae, eveniet,!',
            'uom' => 'meter, roll, batang'
        ]);

        
        // Category::create([
        //     'name' => 'MATERIAL',
        //     'description' => 'none',
        //     'uom' => 'set, unit, each'
        // ]);
        // Category::create([
        //     'name' => 'CPE',
        //     'description' => 'none',
        //     'uom' => 'set, unit, each'
        // ]);
        // Category::create([
        //     'name' => 'ASSESORIES',
        //     'description' => 'none',
        //     'uom' => 'set, unit, each'
        // ]);
     
    }
}
