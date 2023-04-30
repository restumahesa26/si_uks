<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Siswa::create([
            'nis' => 123456,
            'nama' => 'Danurifa',
            'jenis_kelamin' => 'L',
            'angkatan' => 2020,
            'no_hp' => '08117482512',
            'email' => 'danurifa@gmail.com',
        ]);
    }
}
