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
use App\Services\KaryawanService;

class KaryawanController extends Controller
{    
    protected $karyawanService;

    public function __construct(KaryawanService $karyawanService)
    {
        $this->karyawanService = $karyawanService;
    }

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
        
        // Save Data
        $this->karyawanService->saveData($request);
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