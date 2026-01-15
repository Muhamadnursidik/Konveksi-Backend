<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin Konveksi',
            'email' => 'admin@konveksi.test',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'photo' => 'null',
            'is_active' => true
        ]);

        User::create([
            'name' => 'Pemotong',
            'email' => 'pemotong@konveksi.test',
            'password' => Hash::make('password'),
            'role' => 'pemotong',
            'photo' => 'null',
            'is_active' => true
        ]);

        User::create([
            'name' => 'Penjahit',
            'email' => 'penjahit@konveksi.test',
            'password' => Hash::make('password'),
            'role' => 'penjahit',
            'photo' => 'null',
            'is_active' => true
        ]);

        User::create([
            'name' => 'Finishing',
            'email' => 'finishing@konveksi.test',
            'password' => Hash::make('password'),
            'role' => 'finishing',
            'photo' => 'null',
            'is_active' => true
        ]);
    }
}
