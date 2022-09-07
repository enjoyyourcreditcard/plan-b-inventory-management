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
            'user_id' => 1,
            'part_id' => 1,
            'quantity' => 70,
            'remarks' => 'Lorem ipsum dolor amogus moment'
        ]);

        RequestForm::create([
            'user_id' => 1,
            'part_id' => 2,
            'quantity' => 20,
            'remarks' => 'Lorem ipsum dolor amogus moment'
        ]);

        RequestForm::create([
            'user_id' => 1,
            'part_id' => 3,
            'quantity' => 10,
            'remarks' => 'Lorem ipsum dolor amogus moment'
        ]);

        RequestForm::create([
            'user_id' => 2,
            'part_id' => 2,
            'quantity' => 20,
            'remarks' => 'Lorem ipsum dolor amogus moment'
        ]);

        RequestForm::create([
            'user_id' => 2,
            'part_id' => 3,
            'quantity' => 40,
            'remarks' => 'Lorem ipsum dolor amogus moment'
        ]);
    }
}
