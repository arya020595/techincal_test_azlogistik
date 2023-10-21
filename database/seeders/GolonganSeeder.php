<?php

namespace Database\Seeders;
use App\Models\Golongan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GolonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Golongan::create([
            'nama_golongan' => 'A',
            'gaji_pokok' => 4800000,
            'uang_kehadiran' => 50000,
        ]);

        Golongan::create([
            'nama_golongan' => 'B',
            'gaji_pokok' => 5550000,
            'uang_kehadiran' => 100000,
        ]);


        Golongan::create([
            'nama_golongan' => 'C',
            'gaji_pokok' => 6400000,
            'uang_kehadiran' => 150000,
        ]);
    }
}