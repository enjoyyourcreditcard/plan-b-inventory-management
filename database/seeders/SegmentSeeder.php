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
            'category_id' => 1,
            'name' => 'Cable',
        ]);

        Segment::create([
            'category_id' => 2,
            'name' => 'Tire',
        ]);
    }
}
