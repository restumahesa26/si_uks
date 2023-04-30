<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    public $table = 'siswa';
    protected $primaryKey = 'nis';
    public $incrementing = false;
    protected $keyType = 'string';

    public $fillable = [
        'nis', 'nama', 'jenis_kelamin', 'angkatan', 'no_hp', 'email'
    ];

    public function pemeriksaan()
    {
        return $this->hasMany(Pemeriksaan::class, 'nis', 'nis');
    }
}
