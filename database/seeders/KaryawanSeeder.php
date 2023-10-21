<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Golongan;
use App\Models\Karyawan;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // 1 bulan hari kerja efektif adalah 22 hari
        $efektif_hari_kerja = 22;
        //1 hari kerja adalah 8.5 jam
        $efektif_jam_kerja = 8.5;

        $golongan_ids = Golongan::pluck('id')->toArray();
        
        foreach (range(1, 20) as $index) {
            $golongan_id = $golongan_ids[array_rand($golongan_ids)];
            $golongan = Golongan::findOrFail($golongan_id);

            $jumlah_kehadiran = $faker->numberBetween(18, 22);
            $jumlah_cuti = $faker->numberBetween(0, 10);
            $jumlah_lembur = $faker->numberBetween(0, 10);
            
            // Uang Lembur per Jam = Gaji Pokok / (1 Hari Kerja * 1 Bulan Hari Kerja Efektif)
            $total_uang_lembur = 0;
            if ($jumlah_lembur > 0) {
                $uang_lembur_perjam = $golongan->gaji_pokok / ($efektif_jam_kerja * $efektif_hari_kerja);
                $total_uang_lembur = round($uang_lembur_perjam, -3) * $jumlah_lembur;
            }

            // total_uang_kehadiran = Jumlah Kehadiran x Uang Kehadiran
            // Uang Kehadiran = 21 Hari x 100.000
            $total_uang_kehadiran = $jumlah_kehadiran * $golongan->uang_kehadiran;

            // Potongan = gaji pokok dipotong sebesar gaji pokok sesuai golongan karyawan dibagi 1 bulan hari kerja efektif per hari
            $total_potongan = 0;
            if ($jumlah_kehadiran < 22 && $jumlah_cuti < 1) {
                $potongan_per_hari = $golongan->gaji_pokok / $efektif_hari_kerja;
                $total_potongan = round($potongan_per_hari, -3) * (22 - $jumlah_kehadiran);
            }
            
            // THP = Gaji Pokok + Total Uang Kehadiran + Total Uang Lembur - Total Potongan
            $thp = $golongan->gaji_pokok + $total_uang_kehadiran + $total_uang_lembur - $total_potongan;
            
            Karyawan::create([
                'nama_karyawan' => $faker->name,
                'nik' => $faker->numerify('############'),
                'jumlah_kehadiran' => $jumlah_kehadiran,
                'jumlah_cuti' => $jumlah_cuti,
                'jumlah_lembur' => $jumlah_lembur,
                'total_uang_kehadiran' => $total_uang_kehadiran,
                'total_uang_lembur' => $total_uang_lembur,
                'total_potongan_absen' => $total_potongan,
                'thp' => $thp,
                'golongan_id' => $golongan_id,
            ]);
        }
    }
}
