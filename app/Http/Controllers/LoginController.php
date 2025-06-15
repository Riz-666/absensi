<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    Auth::login($user);

        if($user->role === "admin"){
            return redirect()->route('dashboard');
        }elseif($user->role === "dosen"){
            return redirect()->route('dashboard');
        }elseif($user->role === "mahasiswa"){
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('index')->withErrors('Data Yang Di Masukin Tidak Sesuai')->withInput();
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('index');
    }
}
