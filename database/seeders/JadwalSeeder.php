<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('jadwal')->insert([
            [
                'matkul_id' => 4,
                'dosen_id' => 5,
                'hari' => 'Senin',
                'jam_mulai' => '08:00:00',
                'jam_selesai' => '09:40:00',
                'ruang' => 'A1',
                'kelas' => 'TI-1A',
                'prodi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'matkul_id' => 5,
                'dosen_id' => 5,
                'hari' => 'Rabu',
                'jam_mulai' => '10:00:00',
                'jam_selesai' => '11:40:00',
                'ruang' => 'B2',
                'kelas' => 'TI-1B',
                'prodi_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
