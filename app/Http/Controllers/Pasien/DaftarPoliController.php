<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use App\Http\Requests\DaftarPoliCreateRequest;
use App\Models\DaftarPoli;
use App\Models\DetailPeriksa;
use App\Models\JadwalPeriksa;
use App\Models\Periksa;
use App\Models\Poli;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DaftarPoliController extends Controller
{
    public function index()
    {
        // $daftar = DaftarPoli::with(['pasien', 'jadwal'])->paginate(5);
        $pasienId = Auth::user()->pasien->id;

        $daftar = DaftarPoli::with(['pasien', 'jadwal', 'periksa'])
        ->whereHas('pasien', function ($query) use ($pasienId) {
            $query->where('id', $pasienId);
        })
        ->paginate(10);

        // $detail = Periksa::where('id_daftar_poli', $daftar->id)->first();
        $poli = Poli::pluck('nama_poli', 'id');
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
        $daftar = new DaftarPoli();

        // Retrieve the current poli by its ID
        $poli = Poli::find($request->id_poli);

        // Check if the poli exists
        if (!$poli) {
            return redirect()->back()->withErrors(['error' => 'Poli not found']);
        }

        // Get the highest `no_antrian` for the selected poli from today's registrations
        $latest_antrian = DaftarPoli::with('jadwal.dokter.poli')->
                                    whereHas('jadwal.dokter', function ($query) use ($poli) {
                                        $query->where('id_poli', $poli->id);
                                    })->max('no_antrian');

        // Increment the queue number or start at 1 if no entries exist
        $no_antrian = $latest_antrian ? $latest_antrian + 1 : 1;

        $daftar->keluhan = $request->keluhan;
        $daftar->id_jadwal = $request->id_jadwal;
        $daftar->id_pasien = Auth::user()->pasien->id;
        $daftar->no_antrian = $no_antrian;

        $daftar->save();

        if($daftar) {
            Session::flash('status', 'success');
            Session::flash('message', 'Pendaftaran Berhasil Ditambahkan');
        }

        return redirect()->route('pasien.daftar_poli');
    }
}
