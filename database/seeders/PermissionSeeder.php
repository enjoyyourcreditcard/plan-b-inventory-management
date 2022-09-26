<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Psy\Readline\Hoa\Console;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [[
            'name' => 'part:view',
        ], [
            'name' => 'part:edit',
        ],[
            'name' => 'part:delete',
        ],[
            'name' => 'stock:view',
        ],[
            'name' => 'stock:edit',
        ],[
            'name' => 'stock:delete',
        ],[
            'name' => 'transaksi:request',
        ],[
            'name' => 'transaksi:approve_ic',
        ],[
            'name' => 'transaksi:approve_wh',
        ],[
            'name' => 'transaksi:edit_request',
        ]
    ];
        collect($permissions)->each(function ($category) {
            Permission::create($category);
        });
    }
}
