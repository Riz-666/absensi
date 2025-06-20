<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'nim',
        'nip',
        'semester',
        'kelas_id',
        'status',
    ];
    public function kelas(){
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function absensi()
    {
        return $this->hasMany(Absen::class, 'mahasiswa_id');
    }

    public function jadwalDosen()
    {
        return $this->hasMany(Jadwal::class, 'dosen_id');
    }

    public function berita()
    {
        return $this->hasMany(Berita::class, 'admin_id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
