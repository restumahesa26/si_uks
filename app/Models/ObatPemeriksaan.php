<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObatPemeriksaan extends Model
{
    use HasFactory;

    public $table = 'obat_pemeriksaan';

    public $fillable = [
        'obat_id', 'pemeriksaan_id'
    ];

    public function obat()
    {
        return $this->hasOne(Obat::class, 'id', 'obat_id');
    }

    public function pemeriksaan()
    {
        return $this->hasOne(Pemeriksaan::class, 'id', 'pemeriksaan_id');
    }
}
