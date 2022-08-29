<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notifications')->insert([
            [
                'user_id' => 1,
                'title' => 'Halo User',
                'content' => 'berhasil',
                'status' => 'read',
            ],

            
        ]);
    }
}
