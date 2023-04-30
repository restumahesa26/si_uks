<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TerapiPemeriksaan extends Model
{
    use HasFactory;

    public $table = 'terapi_pemeriksaan';

    public $fillable = [
        'terapi_id', 'pemeriksaan_id'
    ];

    public function terapi()
    {
        return $this->hasOne(Terapi::class, 'id', 'terapi_id');
    }

    public function pemeriksaan()
    {
        return $this->hasOne(Pemeriksaan::class, 'id', 'pemeriksaan_id');
    }
}
