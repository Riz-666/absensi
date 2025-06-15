<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AbsenSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('absen')->insert([
            [
                'user_id' => 4, // pastikan ini mahasiswa
                'jadwal_id' => 5,
                'tanggal' => now()->toDateString(),
                'status' => 'hadir',
                'keterangan' => 'Tepat waktu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 5, // mahasiswa lain
                'jadwal_id' => 6,
                'tanggal' => now()->toDateString(),
                'status' => 'izin',
                'keterangan' => 'Ada keperluan keluarga',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
