<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    use HasFactory;

    public $table = 'pemeriksaan';

    public $fillable = [
        'petugas_id', 'nis', 'keluhan', 'keterangan', 'terapi', 'tanggal'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'petugas_id');
    }

    public function siswa()
    {
        return $this->hasOne(Siswa::class, 'nis', 'nis');
    }

    public function obat()
    {
        return $this->hasMany(ObatPemeriksaan::class, 'pemeriksaan_id', 'id');
    }
}
