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
            'segment_id' => 1,
            'quantity' => 10,
            'remarks' => 'Lorem ipsum dolor amogus moment',
        ]);

        RequestForm::create([
            'grf_id' => 1,
            'segment_id' => 2,
            'quantity' => 40,
            'remarks' => 'This is a note!',
        ]);

    }
}
