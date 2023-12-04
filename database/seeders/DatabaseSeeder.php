<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Pengaturan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Add Data User
        User::create([
            'name' => 'Jihadul Akbar',
            'email' => 'test@test.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
        // Add Data Pengaturan
        Pengaturan::create([
            'nama_app' => "Peta Lombok Tengah",
            'singkatan' => "PLT",
            'logo' => "logo-loteng.png",
            'latitude' => "-8.6631487",
            'longitude' => "116.2848176",
            'zoom' => "9",
        ]);


    }
}
