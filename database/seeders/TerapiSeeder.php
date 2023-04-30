<?php

namespace Database\Seeders;

use App\Models\Terapi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TerapiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Terapi::create([
            'nama' => 'Minyak Kayu Putih'
        ]);

        Terapi::create([
            'nama' => 'Balsem'
        ]);

        Terapi::create([
            'nama' => 'Teh Panas'
        ]);

        Terapi::create([
            'nama' => 'Roti'
        ]);
    }
}
