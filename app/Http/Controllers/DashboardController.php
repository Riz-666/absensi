<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index()
    {
        $mhs = auth()->user();
        $nmkls = $mhs->kelas->nama ?? null;
        $hariIni = Carbon::now()->translatedFormat('l');
        $jamSekarang = Carbon::now()->format('H:i');
        $jadwal = Jadwal::with(['matkul', 'dosen', 'prodi'])
            ->where('kelas', $nmkls)
            ->get();
        $absen = Jadwal::with(['matkul', 'dosen', 'prodi'])
            ->where('kelas', $mhs->kelas->nama)
            ->get()
            ->map(function ($j) use ($mhs, $hariIni, $jamSekarang) {
                $j->sudah_absen = Absen::where('user_id', $mhs->id)->where('jadwal_id', $j->id)->whereDate('tanggal', Carbon::today())->exists();

                $j->is_hari_ini = $j->hari === $hariIni;
                $j->is_dalam_jam = $jamSekarang >= $j->jam_mulai && $jamSekarang <= $j->jam_selesai;

                return $j;
            });
        $dosen = User::where('role', 'dosen')->get();

        Carbon::setLocale('id');
        $tglNow = Carbon::now()->translatedFormat('l,d F Y');
        return view('dashboard.dashboard', [
            'judul' => 'Dashboard',
            'jadwal' => $jadwal,
            'dosen' => $dosen,
            'tglNow' => $tglNow,
            'absen' => $absen,
        ]);
    }

    public function profile()
    {
        $users = Auth::user();
        return view('dashboard.profile', [
            'judul' => 'Profile',
            'user' => $users,
        ]);
    }

    public function update_profile(Request $request)
    {
        $user = Auth::user();
        $rules = ['name', 'email' => 'email:user', 'password'];

        $validateData = $request->validate($rules);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save($validateData);

        return redirect()->route('dashboard')->with('success', 'Profile Berhasil Di Perbarui');
    }
}
