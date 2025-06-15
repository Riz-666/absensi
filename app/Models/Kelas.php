<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = "kelas";
    protected $fillable = [
        'nama',
        'angkatan',
        'prodi_id',
        'wali_kelas_id'
    ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }

    public function wali()
    {
        return $this->belongsTo(User::class, 'wali_kelas_id');
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
