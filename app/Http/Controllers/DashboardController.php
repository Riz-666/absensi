<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index(){
        $mhs = auth()->user();
        $nmkls = $mhs->kelas->nama ?? null;
        $jadwal = Jadwal::with(['matkul', 'dosen', 'prodi'])
                        ->where('kelas', $nmkls)
                        ->get();
        $dosen = User::where('role', 'dosen')->get();

        Carbon::setLocale('id');
        $tglNow = Carbon::now()->translatedFormat('l,d F Y');
        return view('dashboard.dashboard',[
            'judul' => 'Dashboard',
            'jadwal' => $jadwal,
            'dosen' => $dosen,
            'tglNow' => $tglNow
        ]);
    }

    public function profile(){
        $users = Auth::user();
        return view('dashboard.profile',[
            'judul' => 'Profile',
            'user' => $users
        ]);
    }

    public function update_profile(Request $request){
        $user = Auth::user();
        $rules = [
            'name',
            'email' => 'email:user',
            'password',
        ];

        $validateData = $request->validate($rules);

        $user->name = $request->name;
        $user->email = $request->email;
        if($request->filled('password')){
            $user->password = Hash::make($request->password);
        }
        $user->save($validateData);

        return redirect()->route('dashboard')->with('success', 'Profile Berhasil Di Perbarui');
    }
}
