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
            'name' => 'hajidalakhtar',
            'role' => 'admin',
            'regional' => 'jakarta',
            'warehouse_id' => '1',
            // 'nik' => '',
            'no_telp' => '082993828824',
            'email' => 'hajidalakhtar@gmail.com',
            'password' => Hash::make('12345'),
            // 'status' => 'active',
        ]);

        User::create([
            'name' => 'Actor Number One',
            'role' => 'admin',
            'regional' => 'surabaya',
            'warehouse_id' => '1',
            // 'nik' => '',
            'no_telp' => '082993828824',
            'email' => 'actor@gmail.com',
            'password' => Hash::make('12345'),
            // 'status' => 'active',
        ]);

        User::create([
            'name' => 'Delivery Dude',
            'role' => 'admin',
            'regional' => 'jakarta',
            'warehouse_id' => '1',
            // 'nik' => '',
            'no_telp' => '082993828824',
            'email' => 'delivery@gmail.com',
            'password' => Hash::make('12345'),
            // 'status' => 'active',
        ]);
    }
}