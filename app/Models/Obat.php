<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    public $table = 'obat';

    public $fillable = [
        'nama'
    ];

    public function pemeriksaan()
    {
        return $this->hasMany(ObatPemeriksaan::class, 'obat_id', 'id');
    }
}
