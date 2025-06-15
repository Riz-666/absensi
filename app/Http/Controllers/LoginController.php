<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        return view('index');
    }
    public function auth(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ],
    [
        'username.required' => 'NIM/NIP/Email Wajib Di isi',
        'password.required' => 'Password Wajib Di Isi'
    ]);

    $user = User::where('email',$request->username)
                ->orWhere('nim',$request->username)
                ->orWhere('nip',$request->username)
                ->first();

    if(!$user){
        return back()->withErrors(['username' => 'username Tidak Di Temukan'])->withInput();
    }

    if(!Hash::check($request->password, $user->password)){
        return back()->withErrors(['password' => 'Password Salah'])->withInput();
    }

    Auth::login($user);

        if($user->role === "admin"){
            return redirect()->route('dashboard')->with('status', Auth::user()->name);
        }elseif($user->role === "dosen"){
            return redirect()->route('dashboard')->with('status', Auth::user()->name);
        }elseif($user->role === "mahasiswa"){
            return redirect()->route('dashboard')->with('status', Auth::user()->name);
        }else{
            return redirect()->route('index')->withErrors('Data Yang Di Masukin Tidak Sesuai')->withInput();
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('index');
    }
}
