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


        Part::where('name', 'like', '%INLINE CLOSURE%')->update([
            'segment_id' => 1
        ]);;

        Part::where('name', 'like', '%PATCH CORD SC/APC%')->update([
            'segment_id' => 2
        ]);;

        Part::where('name', 'like', '%CABLE DROP WIRE FIBER OPTIC%')->update([
            'segment_id' => 3
        ]);;

        Part::where('name', 'like', 'CONTACTOR%')->update([
            'segment_id' => 4
        ]);;

        Part::where('name', 'like', '%BREAKER 2 PHASE/LINE%')->update([
            'segment_id' => 5
        ]);;

        Part::where('name', 'like', '%CABLE DROP WIRE FIBER OPTIC SINGLE CORE%')->update([
            'segment_id' => 6
        ]);;


        Part::where('name', 'like', '%HEATSHRINK%')->update([
            'segment_id' => 7
        ]);;

        Part::where('name', 'like', '%ATTENUATOR FC/APC FEMALE%')->update([
            'segment_id' => 8
        ]);;

        Part::where('name', 'like', '%PIPA HDPE VINILON BLUE/YELLOW%')->update([
            'segment_id' => 9
        ]);;

        Part::where('name', 'like', '%ATTENUATOR FC FEMALE FIXED ATTENUATOR%')->update([
            'segment_id' => 10
        ]);;

        Part::where('name', 'like', '%COUPLER ADAPTER%')->update([
            'segment_id' => 11
        ]);;

        Part::where('name', 'like', '%CABLE FO DUCT SINGLE MODE%')->update([
            'segment_id' => 12
        ]);;

        Part::where('name', 'like', '%CABLE FO ADSS SHORT PAN SINGLE MODE%')->update([
            'segment_id' => 12
        ]);;

        Part::where('name', 'like', '%ONE CLICK CLEANER%')->update([
            'segment_id' => 12
        ]);;
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
