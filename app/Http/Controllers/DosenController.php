<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DosenController extends Controller
{
    public function jadwal_dosen()
    {
        $jadwal = Jadwal::where('dosen_id', Auth::user()->id)->get();
        return view('dashboard.dosen.jadwal_dosen.jadwal', [
            'judul' => 'Jadwal Mengajar',
            'jadwal' => $jadwal,
        ]);
    }

    public function detail_ajar(string $id)
    {
        $jadwal = Jadwal::with(['matkul', 'absen', 'prodi'])->findOrFail($id);

        $absen = Absen::with('user')
                        ->where('jadwal_id', $id)
                        ->whereDate('tanggal', today())
                        ->get();

        return view('dashboard.dosen.jadwal_dosen.absensi', [
            'jadwal' => $jadwal,
            'absen' => $absen,
        ]);
    }

    public function delete(Request $request)
    {
        $ids = $request->input('absen_ids', []);
        $status = $request->input('status', []);

        $idYangAlpa = [];

        foreach ($ids as $id) {
            if (isset($status[$id])) {
                if ($status[$id] === 'alpa') {
                    $idYangAlpa[] = $id;
                } else {
                    // Update jadi hadir jika status bukan alpa
                    Absen::where('id', $id)->update(['status' => 'hadir']);
                }
            }
        }

        if (!empty($idYangAlpa)) {
            Absen::whereIn('id', $idYangAlpa)->delete(); // atau update jadi alpa
        }

        return back()->with('success', 'Absensi berhasil dikonfirmasi.');
    }
}
