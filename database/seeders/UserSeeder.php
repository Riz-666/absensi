<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin Utama',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'nim' => null,
                'nip' => null,
                'kelas_id' => null,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dosen Informatika',
                'email' => 'dosen@example.com',
                'password' => Hash::make('password'),
                'role' => 'dosen',
                'nim' => null,
                'nip' => '1987654321',
                'kelas_id' => null,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Mahasiswa Satu',
                'email' => 'mahasiswa1@example.com',
                'password' => Hash::make('password'),
                'role' => 'mahasiswa',
                'nim' => '2201001',
                'nip' => null,
                'semester'=> 3,
                'kelas_id' => 2, // pastikan kelas dengan ID 1 sudah ada
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
