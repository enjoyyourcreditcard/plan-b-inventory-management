<?php

namespace Database\Seeders;

use App\Models\Part;
use Illuminate\Database\Seeder;
use Throwable;
use Faker\Factory as Faker;

class PartSeeder extends Seeder
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
            if ($no != 0) {
                try {
                    Part::create([
                        'segment_id' => 2,
                        'brand_id' => 1,
                        'im_code' => $data[2],
                        'inventory_code' => $data[3],
                        'orafin_code' => $data[4],
                        'name' => $data[5],
                        'uom' => $data[7],
                        'sn_status' => $data[8],
                        'color' => $data[9],
                        'size' => 1,
                        'description' => $faker->text(100),
                        'note' => $data[12],
                        'img' => $data[13],
                        'status' => 'active',
                    ]);
                } catch (Throwable $e) {
                    report($e);
                    // dd($e);
                }
            }

            $no++;

        }
        fclose($csvFile);
    }



    // print($csvFile);
    //     $no = 0;
    //     $firstline = true;
    //     // $data_raw = fgetcsv($csvFile, 2000, ",");
    //     while (($data_raw = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
    //     $data = explode(';',$data_raw[0]);
    //    dd($data_raw);
    //     // print($data_raw[0]);

    //     }




}
