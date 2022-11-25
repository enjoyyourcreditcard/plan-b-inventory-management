<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Attachment;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AttachmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Attachment::create([
            'comment'       => 'Halo Dunia',
            'part_id'       => 1,
            'file'          => 'test.jpg',
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
