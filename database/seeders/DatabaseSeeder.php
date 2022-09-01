<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\PartSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\HistoryPriceSeeder;
use Database\Seeders\BrandSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\BuildSeeder;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(UserPermissionSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(BrandSeeder::class);

        $this->call(PartSeeder::class);
        $this->call(HistoryPriceSeeder::class);
        $this->call(AttachmentSeeder::class);
        $this->call(BuildSeeder::class);
    }
}
