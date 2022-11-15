<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Brand;
use Throwable;
use Faker\Factory as Faker;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $csvFile = fopen(base_path("public/seeder_data/part.csv"), "r");
        $no = 0;
        $faker = Faker::create('id_ID');

        while (!feof($csvFile)) {
            $data = explode(';', fgetcsv($csvFile)[0]);
            if ($no != 0 && $no <= 116) {
                try {
                    Brand::create([
                        'segment_id' => rand(0,10),
                        'name' => $data[23],
                        'status' => 'active',
                    ]);
                } catch (Throwable $e) {
                    report($e);
                }
            }

            $no++;
        }

        fclose($csvFile);
    }
}
