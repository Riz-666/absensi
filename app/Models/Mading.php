<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mading extends Model
{
    protected $table = 'mading';
    protected $fillable = [
        'judul',
        'isi',
        'kelas_id',
        'dibuat_oleh'
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'dibuat_oleh');
    }
}
