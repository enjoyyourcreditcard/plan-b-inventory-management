<?php

namespace Database\Seeders;

use Database\Seeders\GrfSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\PartSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\BrandSeeder;
use Database\Seeders\BuildSeeder;
use Database\Seeders\StockSeeder;
use Database\Seeders\InboundSeeder;
use Database\Seeders\SegmentSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\TimelineSeeder;
use Database\Seeders\PermissionSeeder;
use Database\Seeders\RequestFormSeeder;
use Database\Seeders\HistoryPriceSeeder;
use Database\Seeders\InboundOrderSeeder;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *  
     * @return void
     */
    public function run()
    {
        $this->call(WarehouseSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(UserPermissionSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SegmentSeeder::class);
        $this->call(BrandSeeder::class);
        $this->call(NotificationSeeder::class);
        $this->call(PartSeeder::class);
        $this->call(StockSeeder::class);
        $this->call(HistoryPriceSeeder::class);
        $this->call(AttachmentSeeder::class);
        $this->call(BuildSeeder::class);
        $this->call(GrfSeeder::class);
        $this->call(RequestFormSeeder::class);
        $this->call(TimelineSeeder::class);
        $this->call(RequestStockSeeder::class);
        $this->call(InboundGrfSeeder::class);
        $this->call(InboundOrderSeeder::class);
        $this->call(InboundSeeder::class);
    }
}