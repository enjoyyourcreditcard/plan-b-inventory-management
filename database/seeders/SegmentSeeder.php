<?php

namespace Database\Seeders;

use App\Models\Part;
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
            'name' => 'INLINE CLOSURE',
        ]);

     
        Segment::create([
            'name' => 'segment cpe',
            'category_id' => 2,
            'name' => 'PATCH CORD SC/APC',
        ]);

        Segment::create([
            'category_id' => 2,
            'name' => 'CABLE DROP WIRE FIBER OPTIC',
        ]);
        Segment::create([
            'category_id' => 2,
            'name' => 'CONTACTOR',
        ]);
        Segment::create([
            'category_id' => 2,
            'name' => 'BREAKER 2 PHASE/LINE',
        ]);
        Segment::create([
            'category_id' => 2,
            'name' => 'CABLE DROP WIRE FIBER OPTIC SINGLE CORE',
        ]);
        Segment::create([
            'category_id' => 2,
            'name' => 'HEATSHRINK',
        ]);
        Segment::create([
            'category_id' => 2,
            'name' => 'ATTENUATOR FC/APC FEMALE',
        ]);
        Segment::create([
            'category_id' => 2,
            'name' => 'PIPA HDPE VINILON BLUE/YELLOW',
        ]);

        Segment::create([
            'category_id' => 2,
            'name' => 'ATTENUATOR FC FEMALE FIXED ATTENUATOR',
        ]);
        Segment::create([
            'category_id' => 2,
            'name' => 'COUPLER ADAPTER',
        ]);
        Segment::create([
            'category_id' => 2,
            'name' => 'CABLE FO DUCT SINGLE MODE',
        ]);
        Segment::create([
            'category_id' => 2,
            'name' => 'CABLE FO ADSS SHORT PAN SINGLE MODE',
        ]);
        Segment::create([
            'category_id' => 2,
            'name' => 'ONE CLICK CLEANER',
        ]);





    }
}
