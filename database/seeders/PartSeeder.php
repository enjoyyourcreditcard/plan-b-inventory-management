<?php

namespace Database\Seeders;

use App\Models\Part;
use Illuminate\Database\Seeder;

class PartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Part::create([
            'category_id' => 1,
            'name' => '1551ABK',
            'description' => 'Small plastic enclosure, black',
            'note' => 'This is a note 1',
            'img' => 'images/part/default.jpg',
            'started' => now(),
            'status' => 'active',
        ]);
        
        Part::create([
            'category_id' => 2,
            'name' => '1551ACLR',
            'description' => 'Small plastic enclosure, clear',
            'note' => 'This is a note 2',
            'img' => 'images/part/default.jpg',
            'started' => now(),
            'status' => 'active',
        ]);
        
        Part::create([
            'category_id' => 1,
            'name' => '1551AGY',
            'description' => 'Plastic enclosure, grey',
            'note' => 'This is a note 3',
            'img' => 'images/part/default.jpg',
            'started' => now(),
            'status' => 'active',
        ]);
    }
}
