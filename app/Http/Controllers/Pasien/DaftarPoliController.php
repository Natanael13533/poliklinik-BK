<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use App\Http\Requests\DaftarPoliCreateRequest;
use App\Models\DaftarPoli;
use App\Models\JadwalPeriksa;
use App\Models\Poli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DaftarPoliController extends Controller
{
    public function index()
    {
        $daftar = DaftarPoli::with(['pasien', 'jadwal'])->paginate(5);
        $poli = Poli::select('id','nama_poli', 'keterangan')->get();
        return view('pasien.daftar_poli', ['daftarList' => $daftar, 'poli' => $poli]);
    }

    public function getSchedulesByPoli(Request $request)
    {
        $id_poli = $request->id_poli;

        // Fetch schedules where the doctor belongs to the selected Poli
        $schedules = JadwalPeriksa::whereHas('dokter', function ($query) use ($id_poli) {
            $query->where('id_poli', $id_poli);
        })->select('id', 'hari', 'jam_mulai', 'jam_selesai')->get();

        return response()->json($schedules);
    }

    public function store(DaftarPoliCreateRequest $request)
    {
        $daftar_count = DaftarPoli::count();
        $daftar = new DaftarPoli();

        $daftar->keluhan = $request->keluhan;
        $daftar->id_jadwal = $request->id_jadwal;
        $daftar->id_pasien = Auth::user()->pasien->id;
        $daftar->no_antrian = $daftar_count + 1;

        $daftar->save();

        if($daftar) {
            Session::flash('status', 'success');
            Session::flash('message', 'Pendaftaran Berhasil Ditambahkan');
        }

        return redirect()->route('pasien.daftar_poli');
    }
}
