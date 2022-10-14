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
            'email' => 'hajidalakhtar@gmail.com',
            'name' => 'hajidalakhtar',
            'password' => Hash::make('12345'),
            'status' => 'aktif',
        ]);

        User::create([
            'email' => 'actor@gmail.com',
            'name' => 'Actor Number One',
            'password' => Hash::make('12345'),
            'status' => 'aktif',
        ]);

        User::create([
            'email' => 'delivery@gmail.com',
            'name' => 'Delivery Dude',
            'password' => Hash::make('12345'),
            'status' => 'aktif',
        ]);
    }
}