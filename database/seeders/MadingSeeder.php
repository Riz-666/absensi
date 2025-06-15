<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MadingSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('mading')->insert([
            [
                'judul' => 'Jadwal UTS Ganjil 2025',
                'isi' => 'Berikut jadwal UTS untuk semester ganjil tahun ajaran 2025. Silakan cek jadwal masing-masing.',
                'kelas_id' => 13, // bisa disesuaikan dengan kelas yang ada
                'dibuat_oleh' => 4, // id admin (pastikan user role-nya admin)
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'judul' => 'Pengumuman Libur Nasional',
                'isi' => 'Sehubungan dengan libur nasional, maka pada tanggal 17 Agustus 2025 seluruh kegiatan perkuliahan diliburkan.',
                'kelas_id' => null, // umum, tidak spesifik kelas
                'dibuat_oleh' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
