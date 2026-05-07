<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; 
use Illuminate\Support\Facades\Hash; 

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Kedai
        User::create([
            'name'     => 'CAFE Pemasok',
            'email'    => 'kedai@gmail.com',
            'password' => Hash::make('pw123'), // Hasilnya akan jadi kode hash di DB
            'role'     => 'kedai',
        ]);

        // Pengolah
        User::create([
            'name'     => 'Berkah Briket',
            'email'    => 'pengolah@gmail.com',
            'password' => Hash::make('pw123'),
            'role'     => 'pengolah',
        ]);

        // UMKM
        User::create([
            'name'     => 'UMKM Sate Edi',
            'email'    => 'umkm@gmail.com',
            'password' => Hash::make('pw123'),
            'role'     => 'umkm',
        ]);
    }
}