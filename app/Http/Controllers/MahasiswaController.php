<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Jadwal;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function jadwal()
    {
        $user = auth()->user();
        $hariIni = Carbon::now()->translatedFormat('l');
        $jamSekarang = Carbon::now()->format('H:i');

        $jadwal = Jadwal::with(['matkul', 'dosen', 'prodi'])
            ->where('kelas', $user->kelas->nama)
            ->get()
            ->map(function ($j) use ($user, $hariIni, $jamSekarang) {
                $j->sudah_absen = Absen::where('user_id', $user->id)->where('jadwal_id', $j->id)->whereDate('tanggal', Carbon::today())->exists();

                $j->is_hari_ini = $j->hari === $hariIni;
                $j->is_dalam_jam = $jamSekarang >= $j->jam_mulai && $jamSekarang <= $j->jam_selesai;

                return $j;
            });

        return view('dashboard.mahasiswa.jadwal.jadwal', [
            'judul' => 'Jadwal Kuliah',
            'jadwal' => $jadwal,
        ]);
    }

    public function cekJadwal(string $id)
    {
        $cekJadwal = Jadwal::with(['matkul', 'dosen', 'prodi'])->findOrFail($id);
        $dosen = User::where('role', 'dosen')->get();

        return view('dashboard.mahasiswa.jadwal.cekJadwal', [
            'judul' => 'Detail Jadwal Perkuliahan',
            'cekJadwal' => $cekJadwal,
            'dosen' => $dosen,
        ]);
    }

    public function absen(Request $request, $jadwalId)
{
    $user = auth()->user(); // Huruf kecil 'auth()' lebih baik
    $jadwal = Jadwal::findOrFail($jadwalId);

    $now = now(); // Gunakan helper global `now()`
    $tgl = $now->toDateString(); // Tidak perlu $jadwalId di sini

    // Perbaiki: gunakan field yang benar dari tabel `jadwal`
    $mulai = Carbon::createFromFormat('H:i:s', $jadwal->jam_mulai);
    $selesai = Carbon::createFromFormat('H:i:s', $jadwal->jam_selesai);

    // Cek apakah sudah absen hari ini
    $sudah = Absen::where('user_id', $user->id)
        ->where('jadwal_id', $jadwalId)
        ->whereDate('tanggal', $tgl)
        ->exists();

    if ($sudah) {
        return back()->with('absen_info', 'Kamu sudah absen hari ini.');
    }

    // Jika sekarang berada di antara jam_mulai dan jam_selesai
    if ($now->between($mulai, $selesai)) {
        Absen::create([
            'user_id' => $user->id,
            'jadwal_id' => $jadwalId,
            'tanggal' => $tgl, 
            'status' => 'hadir',
            'keterangan' => null
        ]);

        return back()->with('absen_success', 'Absen Berhasil!');
    }

    return back()->with('absen_error', 'Absen hanya bisa dilakukan antara jam ' . $jadwal->jam_mulai . ' dan ' . $jadwal->jam_selesai);
}

}
