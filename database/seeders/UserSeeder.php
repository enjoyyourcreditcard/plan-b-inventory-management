<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin Test',
            'role' => 'admin',
            'regional' => 'jakarta',
            'warehouse_id' => '1',
            // 'nik' => '',
            'no_telp' => '082993828824',
            'email' => 'admin@inVentree',
            'password' => Hash::make('12345'),
            // 'status' => 'active',
        ]);

        User::create([
            'name' => 'Gudang Test',
            'role' => 'warehouse',
            'regional' => 'surabaya',
            'warehouse_id' => '1',
            'no_telp' => '082993828824',
            'email' => 'gudang@inVentree',
            'password' => Hash::make('12345'),
            // 'status' => 'active',
        ]);

        User::create([
            'name' => 'Requester Vendor',
            'role' => 'requester',
            'regional' => 'jakarta',
            'warehouse_id' => '1',
            // 'nik' => '',
            'no_telp' => '082993828824',
            'email' => 'requester1@inVentree',
            'password' => Hash::make('12345'),
            // 'status' => 'active',
        ]);

        User::create([
            'name' => 'Requester InHouse',
            'role' => 'requester',
            'regional' => 'jakarta',
            'warehouse_id' => '1',
            // 'nik' => '',
            'no_telp' => '082993828824',
            'email' => 'requester2@inVentree',
            'password' => Hash::make('12345'),
            // 'status' => 'active',
        ]);

        User::create([
            'name' => 'Inventory Control Test',
            'role' => 'inventory_control',
            'regional' => 'jakarta',
            'warehouse_id' => '1',
            // 'nik' => '',
            'no_telp' => '082993828824',
            'email' => 'ic@inVentree',
            'password' => Hash::make('12345'),
            // 'status' => 'active',
        ]);
    }
}