<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function jadwal(){
        $mhs = auth()->user();
        $nmkls = $mhs->kelas->nama ?? null;
        $jadwal = Jadwal::with(['matkul', 'dosen', 'prodi'])
                        ->where('kelas', $nmkls)
                        ->get();
        $dosen = User::where('role', 'dosen')->get();

        return view('dashboard.mahasiswa.jadwal.jadwal',[
            'jadwal' => $jadwal,
            'dosen' => $dosen,
            'judul' => 'Jadwal Perkuliahan',
        ]);
    }
    public function cekJadwal(string $id){
        $cekJadwal = Jadwal::with(['matkul','dosen','prodi'])->findOrFail($id);
        $dosen = User::where('role', 'dosen')->get();

        return view('dashboard.mahasiswa.jadwal.cekJadwal',[
            'judul' => 'Detail Jadwal Perkuliahan',
            'cekJadwal' => $cekJadwal,
            'dosen' => $dosen
        ]);
    }
}
