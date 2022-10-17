<?php

namespace Database\Seeders;

use App\Models\Build;
use Illuminate\Database\Seeder;

class BuildSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Build::create([
            'name' => 'XPS 17',
            'part_id' => '1'
        ]);
        Build::create([
            'name' => 'X1 Carbon',
            'part_id' => '2'
        ]);
    }
}
