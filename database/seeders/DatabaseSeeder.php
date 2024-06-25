<?php

namespace Database\Seeders;

use App\Models\Tourist;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin',
            'role' => "admin",
            'email' => 'admin@gmail.com',
            'password' => Hash::make("1")
        ]);

        Tourist::create([
            "name" => "Test Wisata 1",
            "address" => "Kecamatan 1",
            "image" => "images/1719228203.jpg",
            "lat" => "-4.729042246928916",
            "lon" => "123.05030822753908",
        ]);
    }
}
