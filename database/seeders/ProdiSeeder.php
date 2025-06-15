<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdiSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('prodi')->insert([
            [
                'nama' => 'Teknik Informatika',
                'fakultas' => 'Fakultas Ilmu Komputer',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Sistem Informasi',
                'fakultas' => 'Fakultas Ilmu Komputer',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Teknik Mesin',
                'fakultas' => 'Fakultas Teknik',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Teknik Elektro',
                'fakultas' => 'Fakultas Teknik',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
