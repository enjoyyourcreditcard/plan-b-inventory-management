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
            'im_code' => 'RM126-57.009.036.00',
            'inventory_code' => '12345678',
            'orafin_code' => '87654321',
            'name' => '1551ABK',
            'brand_id' => 2,
            'uom' => 'unit',
            'sn_status' => 'non sn',
            'color' => 'black',
            'size' => '1',
            'description' => 'Small plastic enclosure, black',
            'note' => 'This is a note 1',
            'img' => 'images/part/default.jpg',
            'status' => 'active',
        ]);
        
        Part::create([
            'category_id' => 2,
            'im_code' => 'OM119-07.211.407.00',
            'inventory_code' => '09876543',
            'orafin_code' => '34567890',
            'name' => '1551ACLR',
            'brand_id' => 1,
            'uom' => 'unit',
            'sn_status' => 'non sn',
            'color' => 'nn',
            'size' => '1',
            'description' => 'Small plastic enclosure, clear',
            'note' => 'This is a note 2',
            'img' => 'images/part/default.jpg',
            'status' => 'active',
        ]);
        
        Part::create([
            'category_id' => 1,
            'im_code' => 'HP118-01.106.093.00',
            'inventory_code' => '0qwerty',
            'orafin_code' => 'ytrewq0',
            'name' => 'ODC (OPTIC DISTRIBUTION CABINET) WITH SPLITTER CAPACITY 576 CORE PEDESTAL (ZTE)',
            'brand_id' => 2,
            'uom' => 'set',
            'sn_status' => 'sn',
            'color' => 'grey',
            'size' => '1',
            'description' => 'Small plastic enclosure, grey',
            'note' => 'This is a note 3',
            'img' => 'images/part/default.jpg',
            'status' => 'active',
        ]);
    }
}
