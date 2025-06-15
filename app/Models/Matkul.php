<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    protected $table = "matkul";
    protected $fillable = [
        'name',
        'kode',
        'dosen_id',
        'jam_mulai',
        'prodi_id',
        'semester'
    ];

   public function dosen()
    {
        return $this->belongsTo(User::class, 'dosen_id');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id');
    }

    public function jadwal()
    {
        return $this->hasMany(Jadwal::class);
    }
}
