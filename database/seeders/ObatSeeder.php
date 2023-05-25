<?php

namespace Database\Seeders;

use App\Models\Obat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Obat::create([
            'nama' => 'Paracetamol'
        ]);

        Obat::create([
            'nama' => 'Ranitidin'
        ]);

        Obat::create([
            'nama' => 'FG Troches'
        ]);

        Obat::create([
            'nama' => 'Amoxilin'
        ]);
    }
}
