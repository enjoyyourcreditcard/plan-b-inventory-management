<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Throwable;
use Faker\Factory as Faker;

class CategorySeeder extends Seeder
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
                    Category::create([
                        'name' => $data[23],
                        'description' => 'none',
                        'uom' => 'set, unit, each'
                       
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



        
        // Category::create([
        //     'name' => 'MATERIAL',
        //     'description' => 'none',
        //     'uom' => 'set, unit, each'
        // ]);
        // Category::create([
        //     'name' => 'CPE',
        //     'description' => 'none',
        //     'uom' => 'set, unit, each'
        // ]);
        // Category::create([
        //     'name' => 'ASSESORIES',
        //     'description' => 'none',
        //     'uom' => 'set, unit, each'
        // ]);
}
