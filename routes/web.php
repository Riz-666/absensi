<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;






/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::middleware(['guest'])->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('index');
});

//Login
Route::post('login/auth', [LoginController::class, 'auth'])->name('authLogin');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/home', [DashboardController::class, 'index']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    //REDIRECT
    Route::get('/redirect', function () {
        return view('redirect');
    });

    //ADMIN

    //Kelola Users
    Route::get('/users', [AdminController::class, 'users'])->middleware('role:admin')->name('users');
    Route::get('/users/add', [AdminController::class, 'tambah_user'])->middleware('role:admin')->name('add.users');
    Route::post('/users/add/redirect', [AdminController::class, 'tambah_user_aksi'])->middleware('role:admin')->name('add.users.action');
    Route::get('/users/edit{id}', [AdminController::class, 'edit_user'])->middleware('role:admin')->name('edit.users');
    Route::post('/users/edit/redirect{id}', [AdminController::class, 'update_user'])->middleware('role:admin')->name('edit.users.action');
    Route::post('/users/delete/redirect{id}', [AdminController::class, 'destroy_user'])->middleware('role:admin')->name('destroy.users.action');

    //Kelola Jadwal
    Route::get('/jadwal', [AdminController::class, 'jadwal'])->name('jadwal');
    Route::get('/jadwal/add', [AdminController::class, 'tambah_jadwal'])->middleware('role:admin')->name('add.jadwal');
    Route::post('/jadwal/add/redirect', [AdminController::class, 'tambah_jadwal_aksi'])->middleware('role:admin')->name('add.jadwal.action');
    Route::get('/jadwal/edit{id}', [AdminController::class, 'edit_jadwal'])->middleware('role:admin')->name('edit.jadwal');
    Route::post('/jadwal/edit/redirect{id}', [AdminController::class, 'update_jadwal_aksi'])->middleware('role:admin')->name('edit.jadwal.action');
    Route::post('/jadwal/delete/redirect{id}', [AdminController::class, 'destroy_jadwal'])->middleware('role:admin')->name('destroy.jadwal.action');

    //Kelola Mading
    Route::get('/mading', [AdminController::class, 'mading'])->name('mading');
    Route::get('/mading/add', [AdminController::class, 'tambah_mading'])->middleware('role:admin')->name('add.mading');
    Route::post('/mading/add/redirect', [AdminController::class, 'tambah_mading_aksi'])->middleware('role:admin')->name('add.mading.action');
    Route::get('/mading/edit{id}', [AdminController::class, 'edit_mading'])->middleware('role:admin')->name('edit.mading');
    Route::post('/mading/edit/redirect{id}', [AdminController::class, 'update_mading_aksi'])->middleware('role:admin')->name('edit.mading.action');
    Route::post('/mading/delete/redirect{id}', [AdminController::class, 'destroy_mading'])->middleware('role:admin')->name('destroy.mading.action');

    //Kelola Prodi
    Route::get('/prodi', [AdminController::class, 'prodi'])->middleware('role:admin')->name('prodi');
    Route::get('/prodi/add', [AdminController::class, 'tambah_prodi'])->middleware('role:admin')->name('add.prodi');
    Route::post('/prodi/add/redirect', [AdminController::class, 'tambah_prodi_aksi'])->middleware('role:admin')->name('add.prodi.action');
    Route::get('/prodi/edit{id}', [AdminController::class, 'edit_prodi'])->middleware('role:admin')->name('edit.prodi');
    Route::post('/prodi/edit/redirect{id}', [AdminController::class, 'update_prodi_aksi'])->middleware('role:admin')->name('edit.prodi.action');
    Route::post('/prodi/delete/redirect{id}', [AdminController::class, 'destroy_prodi'])->middleware('role:admin')->name('destroy.prodi.action');

    //Kelola Kelas
    Route::get('/kelas', [AdminController::class, 'kelas'])->middleware('role:admin')->name('kelas');
    Route::get('/kelas/add', [AdminController::class, 'tambah_kelas'])->middleware('role:admin')->name('add.kelas');
    Route::post('/kelas/add/redirect', [AdminController::class, 'tambah_kelas_aksi'])->middleware('role:admin')->name('add.kelas.action');
    Route::get('/kelas/edit{id}', [AdminController::class, 'edit_kelas'])->middleware('role:admin')->name('edit.kelas');
    Route::post('/kelas/edit/redirect{id}', [AdminController::class, 'update_kelas_aksi'])->middleware('role:admin')->name('edit.kelas.action');
    Route::post('/kelas/delete/redirect{id}', [AdminController::class, 'destroy_kelas'])->middleware('role:admin')->name('destroy.kelas.action');

    //Kelola matkul
    Route::get('/matkul', [AdminController::class, 'matkul'])->name('matkul');
    Route::get('/matkul/add', [AdminController::class, 'tambah_matkul'])->middleware('role:admin')->name('add.matkul');
    Route::post('/matkul/add/redirect', [AdminController::class, 'tambah_matkul_aksi'])->middleware('role:admin')->name('add.matkul.action');
    Route::get('/matkul/edit{id}', [AdminController::class, 'edit_matkul'])->middleware('role:admin')->name('edit.matkul');
    Route::post('/matkul/edit/redirect{id}', [AdminController::class, 'update_matkul_aksi'])->middleware('role:admin')->name('edit.matkul.action');
    Route::post('/matkul/delete/redirect{id}', [AdminController::class, 'destroy_matkul'])->middleware('role:admin')->name('destroy.matkul.action');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/user/jadwal', [MahasiswaController::class, 'jadwal'])->name('mahasiswa.jadwal');
    Route::get('/user/jadwal/check{id}', [MahasiswaController::class, 'cekJadwal'])->name('mahasiswa.cek.jadwal');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::post('/update/profile', [DashboardController::class, 'update_profile'])->name('edit.profile.action');
});
