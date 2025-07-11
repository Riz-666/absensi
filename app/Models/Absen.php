<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $table = "absen";
    protected $fillable = [
        'user_id',
        'jadwal_id',
        'tanggal',
        'status',
        'keterangan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }
    public function matkul(){
        return $this->belongsTo(Matkul::class);
    }

}
