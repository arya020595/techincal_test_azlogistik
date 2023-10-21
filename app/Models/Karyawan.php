<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_karyawan',
        'jumlah_kehadiran',
        'jumlah_cuti',
        'jumlah_lembur',
        'total_uang_kehadiran',
        'total_uang_lembur',
        'total_potongan_absen',
        'thp'
    ];

    public function golongan()
    {
        return $this->belongsTo(Golongan::class);
    }
}
