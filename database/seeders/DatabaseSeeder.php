<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Opung Waffle Chinatown',
                'email' => 'opung@waffle.com',
                'profile_picture' => '1718672650.jpg',
                'phone' => '083254655443',
                'password' => Hash::make('opung12345'),
                'is_admin' => true
            ],
            [
                'id' => 2,
                'name' => "Jimmy Wira Arba'a",
                'email' => 'jimmy@gmail.com',
                'profile_picture' => '1717992293.png',
                'phone' => '085363298884',
                'password' => Hash::make('jimmy12345'),
                'is_admin' => false
            ],
            [
                'id' => 3,
                'name' => "Frenti Susta Julianti",
                'email' => 'frenti@gmail.com',
                'profile_picture' => null,
                'phone' => '084576437632',
                'password' => Hash::make('frenti12345'),
                'is_admin' => false
            ]
        ]);
    }
}
