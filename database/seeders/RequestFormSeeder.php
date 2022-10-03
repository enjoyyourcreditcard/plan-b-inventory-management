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
            'quantity' => 2,
            'remarks' => 'Lorem ipsum dolor amogus moment',
        ]);

        RequestForm::create([
            'grf_id' => 1,
            'part_id' => 2,
            'quantity' => 4,
            'remarks' => 'This is a note!',
        ]);

        RequestForm::create([
            'grf_id' => 2,
            'part_id' => 4,
            'quantity' => 2,
            'remarks' => 'This is a remark',
        ]);

        RequestForm::create([
            'grf_id' => 2,
            'part_id' => 5,
            'quantity' => 5,
            'remarks' => 'Lorem ipsum bruh',
        ]);
    }
}
