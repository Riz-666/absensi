<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Mading;
use App\Models\Matkul;
use App\Models\Prodi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function users(){
        $user = User::with('kelas')
            ->orderBy('role','desc')
            ->get();
        return view('dashboard.admin.users.users',[
            'user' => $user,
            'judul' => 'Kelola User'
        ]);
    }

    public function tambah_user(){
        $user = User::with('kelas')->get();
        $kelas = Kelas::get();
        return view('dashboard.admin.users.add',[
            'user' => $user,
            'kelas' => $kelas,
            'judul' => 'Tambah User'
        ]);
    }
    public function tambah_user_aksi(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email|max:255',
            'password' => 'required|min:4',
            'role' => 'required',
            'nim',
            'nip',
            'semester',
            'kelas_id' => 'exists:kelas,id',
            'status' => 'required'
        ]);

        $users = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'nim' => $request->nim,
            'nip' => $request->nip,
            'semester' => $request->semester,
            'kelas_id' => $request->kelas_id,
            'status' => $request->status
        ]);

        return redirect()->route('users')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function edit_user(Request $request, string $id){
        $user = User::with('kelas')->findOrFail($id);
        $kelas = Kelas::get();
        return view('dashboard.admin.users.edit',[
            'edit' => $user,
            'kelas' => $kelas,
            'judul' => 'Edit User'
        ]);
    }

    public function update_user(Request $request, string $id){
        $user = User::findOrFail($id);
        $rules = [
            'name' => 'required',
            'password' => 'required|min:4',
            'role' => 'required',
            'nim',
            'nip',
            'semester',
            'kelas_id' => 'exists:kelas,id',
            'status' => 'required'
        ];
        if ($request->email != $user->email) {
            $rules['email'] = 'required|max:255|email|unique:users';
        }
        $validatedData = $request->validate($rules);

        $user->name = $request->name;
        $user->email = $request->email;
        if($request->filled('password')){
            $user->password = Hash::make($request->password);
        }
        $user->role = $request->role;
        $user->nim = $request->nim;
        $user->nip = $request->nip;
        $user->semester = $request->semester;
        $user->kelas_id = $request->kelas_id;
        $user->status = $request->status;

        $result = $user->save($validatedData);

        return redirect()->route('users')->with('success', 'Data Berhasil Di Ubah');
    }

    public function destroy_user(string $id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users')->with('success');
    }

    //UNTUK JADWAL

    public function jadwal(){
        $jadwal = Jadwal::with(['matkul', 'dosen', 'prodi'])->get();
        $dosen = User::where('role', 'dosen')->get();
        return view('dashboard.admin.jadwal.jadwal',[
            'jadwal' => $jadwal,
            'dosen' => $dosen,
            'judul' => 'Kelola Jadwal'
        ]);
    }
    public function tambah_jadwal(){
        $jadwal = Jadwal::with(['matkul', 'dosen', 'prodi'])->get();
        $matkul = Matkul::get();
        $prodi = Prodi::get();
        $dosen = User::where('role', 'dosen')->get();
        return view('dashboard.admin.jadwal.add',[
            'judul' => 'Tambah Jadwal',
            'jadwal' => $jadwal,
            'dosen' => $dosen,
            'matkul' => $matkul,
            'prodi' => $prodi
        ]);
    }
    public function tambah_jadwal_aksi(Request $request){
       $request->validate([
            'matkul_id' => 'exists:matkul,id',
            'dosen_id' => 'exists:users,id',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'ruang' => 'required',
            'kelas' => 'required',
            'prodi_id' => 'exists:prodi,id'
       ]);

       $jadwal = Jadwal::create([
        'matkul_id' => $request->matkul_id,
        'dosen_id' => $request->dosen_id,
        'hari' => $request->hari,
        'jam_mulai' => $request->jam_mulai,
        'jam_selesai' => $request->jam_selesai,
        'ruang' => $request->ruang,
        'kelas' => $request->kelas,
        'prodi_id' => $request->prodi_id,
       ]);

       return redirect()->route('jadwal')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function edit_jadwal(string $id){
        $jadwal = Jadwal::with(['matkul', 'dosen', 'prodi'])->findOrFail($id);
        $matkul = Matkul::get();
        $prodi = Prodi::get();
        $dosen = User::where('role', 'dosen')->get();
        return view('dashboard.admin.jadwal.edit',[
            'judul' => 'Edit Jadwal',
            'edit' => $jadwal,
            'dosen' => $dosen,
            'matkul' => $matkul,
            'prodi' => $prodi
        ]);
    }
    public function update_jadwal_aksi(Request $request, string $id){
        $jadwal = Jadwal::findOrFail($id);
        $rules = [
            'matkul_id' => 'exists:matkul,id',
            'dosen_id' => 'exists:users,id',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
            'ruang' => 'required',
            'kelas' => 'required',
            'prodi_id' => 'exists:prodi,id'
        ];

        $validatedData = $request->validate($rules);

        $jadwal->matkul_id = $request->matkul_id;
        $jadwal->dosen_id = $request->dosen_id;
        $jadwal->hari = $request->hari;
        $jadwal->jam_mulai = $request->jam_mulai;
        $jadwal->jam_selesai = $request->jam_selesai;
        $jadwal->ruang = $request->ruang;
        $jadwal->kelas = $request->kelas;
        $jadwal->prodi_id = $request->prodi_id;

        $result = $jadwal->save($validatedData);

        return redirect()->route('jadwal')->with('success','Data Berhasil Di Ubah');
    }

    public function destroy_jadwal(string $id){
        $jadwal = Jadwal::findOrFail($id);
        $jadwal->delete();
        return redirect()->route('jadwal')->with('success');
    }

    //UNTUK PRODI
    public function prodi(){
        $prodi = prodi::get();
        return view('dashboard.admin.prodi.prodi',[
            'prodi' => $prodi,
            'judul' => 'Kelola Prodi'
        ]);
    }
    public function tambah_prodi(){
        return view('dashboard.admin.prodi.add',[
            'judul' => 'Tambah Prodi',
        ]);
    }
    public function tambah_prodi_aksi(Request $request){
       $request->validate([
            'nama' => 'required',
            'fakultas' => 'required',
       ]);

       $prodi = Prodi::create([
        'nama' => $request->nama,
        'fakultas' => $request->fakultas,
       ]);

       return redirect()->route('prodi')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function edit_prodi(string $id){
        $prodi = Prodi::findOrFail($id);
        return view('dashboard.admin.prodi.edit',[
            'judul' => 'Edit Prodi',
            'edit' => $prodi
        ]);
    }
    public function update_prodi_aksi(Request $request, string $id){
        $prodi = Prodi::findOrFail($id);
        $rules = [
            'nama' => 'required',
            'fakultas' => 'required',
        ];

        $validatedData = $request->validate($rules);

        $prodi->nama = $request->nama;
        $prodi->fakultas = $request->fakultas;

        $result = $prodi->save($validatedData);

        return redirect()->route('prodi')->with('success','Data Berhasil Di Ubah');
    }

    public function destroy_prodi(string $id){
        $prodi = Prodi::findOrFail($id);
        $prodi->delete();
        return redirect()->route('prodi')->with('success');
    }

    //UNTUK KELAS
    public function kelas(){
        $kelas = Kelas::with(['prodi','wali'])->get();
        return view('dashboard.admin.kelas.kelas',[
            'kelas' => $kelas,
            'judul' => 'Kelola kelas'
        ]);
    }
    public function tambah_kelas(){
        $prodi = Prodi::get();
        $wali = User::where('role',"dosen")->get();
        return view('dashboard.admin.kelas.add',[
            'judul' => 'Tambah kelas',
            'prodi' => $prodi,
            'wali' => $wali
        ]);
    }
    public function tambah_kelas_aksi(Request $request){
       $request->validate([
            'nama' => 'required',
            'angkatan' => 'required',
            'prodi_id' => 'required',
            'wali_kelas_id' => 'required'
       ]);

       $kelas = kelas::create([
        'nama' => $request->nama,
        'angkatan' => $request->angkatan,
        'prodi_id' => $request->prodi_id,
        'wali_kelas_id' => $request->wali_kelas_id,
       ]);

       return redirect()->route('kelas')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function edit_kelas(string $id){
        $kelas = kelas::findOrFail($id);
        $prodi = Prodi::get();
        $wali = User::where('role',"dosen")->get();
        return view('dashboard.admin.kelas.edit',[
            'judul' => 'Edit kelas',
            'edit' => $kelas,
            'prodi' => $prodi,
            'wali' => $wali

        ]);
    }
    public function update_kelas_aksi(Request $request, string $id){
        $kelas = kelas::findOrFail($id);
        $rules = [
            'nama' => 'required',
            'angkatan' => 'required',
            'prodi_id' => 'exists:prodi,id',
            'wali_kelas_id' => 'exists:users,id'
        ];

        $validatedData = $request->validate($rules);

        $kelas->nama = $request->nama;
        $kelas->angkatan = $request->angkatan;
        $kelas->prodi_id = $request->prodi_id;
        $kelas->wali_kelas_id = $request->wali_kelas_id;

        $result = $kelas->save($validatedData);

        return redirect()->route('kelas')->with('success','Data Berhasil Di Ubah');
    }

    public function destroy_kelas(string $id){
        $kelas = kelas::findOrFail($id);
        $kelas->delete();
        return redirect()->route('kelas')->with('success');
    }

    //UNTUK MADING
    public function mading(){
        $mading = Mading::with(['user','kelas'])
        ->whereHas('user',function($query){
            $query->whereIn('role',['admin','dosen']);
        })->get();
        return view('dashboard.admin.mading.mading',[
            'mading' => $mading,
            'judul' => 'Kelola mading'
        ]);
    }
    public function tambah_mading(){
        $kelas = Kelas::get();
        $user = User::whereIn('role', ['admin', 'dosen'])->get();
        return view('dashboard.admin.mading.add',[
            'kelas' => $kelas,
            'user' => $user,
            'judul' => 'Tambah mading',
        ]);
    }
    public function tambah_mading_aksi(Request $request){
       $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'kelas_id' => 'required',
            'dibuat_oleh' => 'required'
       ]);

       $mading = Mading::create([
        'judul' => $request->judul,
        'isi' => $request->isi,
        'kelas_id' => $request->kelas_id,
        'dibuat_oleh' => $request->dibuat_oleh,
       ]);
       return redirect()->route('mading')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function edit_mading(string $id){
        $mading = Mading::findOrFail($id);
        $kelas = Kelas::get();
        $user = User::whereIn('role', ['admin', 'dosen'])->get();
        return view('dashboard.admin.mading.edit',[
            'kelas' => $kelas,
            'user' => $user,
            'judul' => 'Edit mading',
            'edit' => $mading
        ]);
    }
    public function update_mading_aksi(Request $request, string $id){
        $mading = mading::findOrFail($id);
        $rules = [
            'judul' => 'required',
            'isi' => 'required',
            'kelas_id' => 'required',
            'dibuat_oleh' => 'required'
        ];

        $validatedData = $request->validate($rules);

        $mading->judul = $request->judul;
        $mading->isi = $request->isi;
        $mading->kelas_id = $request->kelas_id;
        $mading->dibuat_oleh = $request->dibuat_oleh;

        $result = $mading->save($validatedData);

        return redirect()->route('mading')->with('success','Data Berhasil Di Ubah');
    }

    public function destroy_mading(string $id){
        $mading = mading::findOrFail($id);
        $mading->delete();
        return redirect()->route('mading')->with('success');
    }
    //UNTUK matkul
    public function matkul(){
        $matkul = Matkul::with('dosen', 'prodi')->get();
        return view('dashboard.admin.matkul.matkul',[
            'judul' => 'Kelola matkul',
            'matkul' => $matkul
        ]);
    }
    public function tambah_matkul(){
        $matkul = Matkul::with('prodi')->get();
        $user = User::where('role', 'dosen')->get();
        $prodi = Prodi::get();
        return view('dashboard.admin.matkul.add',[
            'matkul' => $matkul,
            'user' => $user,
            'prodi' => $prodi,
            'judul' => 'Tambah matkul',
        ]);
    }
    public function tambah_matkul_aksi(Request $request){
       $request->validate([
            'name' => 'required',
            'kode' => 'required',
            'dosen_id' => 'exists:users,id',
            'prodi_id' => 'exists:prodi,id',
            'semester' => 'required'
       ]);

       $matkul = Matkul::create([
        'name' => $request->name,
        'kode' => $request->kode,
        'dosen_id' => $request->dosen_id,
        'prodi_id' => $request->prodi_id,
        'semester' => $request->semester
       ]);
       return redirect()->route('matkul')->with('success', 'Data Berhasil Di Tambahkan');
    }

    public function edit_matkul(string $id){
        $matkul = Matkul::with('prodi')->findOrFail($id);
        $prodi = Prodi::get();
        $user = User::where('role', 'dosen')->get();
        return view('dashboard.admin.matkul.edit',[
            'user' => $user,
            'judul' => 'Edit matkul',
            'prodi' => $prodi,
            'edit' => $matkul
        ]);
    }
    public function update_matkul_aksi(Request $request, string $id){
        $matkul = matkul::findOrFail($id);
        $rules = [
            'name' => 'required',
            'kode' => 'required',
            'dosen_id' => 'exists:users,id',
            'prodi_id' => 'exists:prodi,id',
            'semester' => 'required'
       ];

        $validatedData = $request->validate($rules);

        $matkul->name = $request->name;
        $matkul->kode = $request->kode;
        $matkul->dosen_id = $request->dosen_id;
        $matkul->prodi_id = $request->prodi_id;
        $matkul->semester = $request->semester;

        $result = $matkul->save($validatedData);

        return redirect()->route('matkul')->with('success','Data Berhasil Di Ubah');
    }

    public function destroy_matkul(string $id){
        $matkul = Matkul::findOrFail($id);
        $matkul->delete();
        return redirect()->route('matkul')->with('success');
    }
}
