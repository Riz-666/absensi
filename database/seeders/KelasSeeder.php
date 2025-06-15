<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kelas')->insert([
            [
                'nama' => 'TI-1A',
                'angkatan' => 2022,
                'prodi_id' => 1,
                'wali_kelas_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'TI-1B',
                'angkatan' => 2022,
                'prodi_id' => 5,
                'wali_kelas_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'SI-1A',
                'angkatan' => 2023,
                'prodi_id' => 5,
                'wali_kelas_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
