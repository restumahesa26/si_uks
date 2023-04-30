<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terapi extends Model
{
    use HasFactory;

    public $table = 'terapi';

    public $fillable = [
        'nama'
    ];

    public function pemeriksaan()
    {
        return $this->hasMany(TerapiPemeriksaan::class, 'terapi_id', 'id');
    }
}
