<?php

namespace Database\Seeders;

use App\Models\Segment;
use Illuminate\Database\Seeder;

class SegmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Segment::create([
            'name' => 'segment assesories',
            'category_id' => 1,
        ]);

        Segment::create([
            'name' => 'segment cpe',
            'category_id' => 2,
        ]);

        Segment::create([
            'name' => 'segment material',
            'category_id' => 3,
        ]);
    }
}
