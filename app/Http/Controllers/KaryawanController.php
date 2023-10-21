<?php

namespace App\Http\Controllers;

//import Model "Karyawan"
use App\Models\Karyawan;
//import Model "Golongan"
use App\Models\Golongan;

use Illuminate\Http\Request;

//return type View
use Illuminate\View\View;

//return type redirectResponse
use Illuminate\Http\RedirectResponse;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;
use SebastianBergmann\CodeCoverage\Driver\XdebugDriver;

class KaryawanController extends Controller
{    

    public function index(): View
    {
        //get karyawans
        $karyawans = Karyawan::with('golongan')->latest()->paginate(10);

        //render view with karyawans
        return view('karyawans.index', compact('karyawans'));
    }

    public function create(): View
    {
        $karyawans = Karyawan::all();
        return view('karyawans.create', compact('karyawans'));
    }
 
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $this->validate($request, [
            'jumlah_kehadiran'     => 'required',
            'karyawan_id'     => 'required',
            'jumlah_cuti'     => 'required',
            'jumlah_lembur'   => 'required'
        ]);

        // 1 bulan hari kerja efektif adalah 22 hari
        $efektif_hari_kerja = 22;
        //1 hari kerja adalah 8.5 jam
        $efektif_jam_kerja = 8.5;

        //get karyawan by ID
        $karyawan = Karyawan::findOrFail($request->karyawan_id);

        $jumlah_kehadiran = $request->jumlah_kehadiran;
        $jumlah_cuti = $request->jumlah_cuti;
        $jumlah_lembur = $request->jumlah_lembur;
        
        // Uang Lembur per Jam = Gaji Pokok / (1 Hari Kerja * 1 Bulan Hari Kerja Efektif)
        $total_uang_lembur = 0;
        if ($jumlah_lembur > 0) {
            $uang_lembur_perjam = $karyawan->golongan->gaji_pokok / ($efektif_jam_kerja * $efektif_hari_kerja);
            $total_uang_lembur = round($uang_lembur_perjam, -3) * $jumlah_lembur;
        }

        // total_uang_kehadiran = Jumlah Kehadiran x Uang Kehadiran
        // Uang Kehadiran = 21 Hari x 100.000
        $total_uang_kehadiran = $jumlah_kehadiran * $karyawan->golongan->uang_kehadiran;

        // Potongan = gaji pokok dipotong sebesar gaji pokok sesuai golongan karyawan dibagi 1 bulan hari kerja efektif per hari
        $total_potongan = 0;
        if ($jumlah_kehadiran < 22 && $jumlah_cuti < 1) {
            $potongan_per_hari = $karyawan->golongan->gaji_pokok / $efektif_hari_kerja;
            $total_potongan = round($potongan_per_hari, -3) * (22 - $jumlah_kehadiran);
        }
        
        // THP = Gaji Pokok + Total Uang Kehadiran + Total Uang Lembur - Total Potongan
        $thp = $karyawan->golongan->gaji_pokok + $total_uang_kehadiran + $total_uang_lembur - $total_potongan;

        $karyawan->update([
            'jumlah_kehadiran' => $request->jumlah_kehadiran,
            'jumlah_cuti' => $request->jumlah_cuti,
            'jumlah_lembur' => $request->jumlah_lembur,
            'total_uang_kehadiran' => $total_uang_kehadiran,
            'total_uang_lembur' => $total_uang_lembur,
            'total_potongan_absen' => $total_potongan,
            'thp' => $thp
        ]);
        //redirect to index
        return redirect()->route('karyawans.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function gajiForm()
    {
        $karyawans = Karyawan::all();
        return view('slip_gajis.create', compact('karyawans'));
    }

    public function showSlipGaji($karyawanId)
    {
        $karyawan = Karyawan::with('golongan')->find($karyawanId);

        return view('slip_gajis.show', compact('karyawan'));
    }
}