<?php

namespace Database\Seeders;

use App\Models\RequestForm;
use Illuminate\Database\Seeder;

class RequestFormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RequestForm::create([
            'grf_id' => 1,
            'part_id' => 1,
            'quantity' => 10,
            'remarks' => 'Lorem ipsum dolor amogus moment',
        ]);

        RequestForm::create([
            'grf_id' => 1,
            'part_id' => 2,
            'quantity' => 40,
            'remarks' => 'This is a note!',
        ]);

        RequestForm::create([
            'grf_id' => 2,
            'part_id' => 4,
            'quantity' => 200,
            'remarks' => 'This is a remark',
        ]);

        RequestForm::create([
            'grf_id' => 2,
            'part_id' => 5,
            'quantity' => 500,
            'remarks' => 'Lorem ipsum bruh',
        ]);

        RequestForm::create([
            'grf_id' => 3,
            'part_id' => 7,
            'quantity' => 70,
            'remarks' => 'Lorem ipsum bruh',
        ]);

        RequestForm::create([
            'grf_id' => 4,
            'part_id' => 10,
            'quantity' => 120,
            'remarks' => 'Lorem ipsum gemink',
        ]);
    }
}
