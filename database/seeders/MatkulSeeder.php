<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatkulSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('matkul')->insert([
            [
                'name' => 'Pemrograman Web',
                'kode' => 'IF101',
                'dosen_id' => 5,
                'prodi_id' => 1,
                'semester' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Basis Data',
                'kode' => 'IF102',
                'dosen_id' => 5,
                'prodi_id' => 1,
                'semester' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Analisis Sistem Informasi',
                'kode' => 'SI201',
                'dosen_id' => 5,
                'prodi_id' => 2,
                'semester' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
