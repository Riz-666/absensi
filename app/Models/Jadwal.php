<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = "jadwal";
    protected $fillable = [
        'matkul_id',
        'dosen_id',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'ruang',
        'kelas',
        'prodi_id'
    ];

    public function matkul()
    {
        return $this->belongsTo(Matkul::class);
    }

    public function dosen()
    {
        return $this->belongsTo(User::class, 'dosen_id');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function absen()
    {
        return $this->hasMany(Absen::class);
    }
}
