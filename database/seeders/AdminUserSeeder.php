<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         User::create([
            'name' => 'Admin Utama',
            'email' => 'admin@example.com',
            'role' => 'Admin',
            'password' => Hash::make('password123'), // ganti sesuai password yang kamu mau
        ]);
    }
}
