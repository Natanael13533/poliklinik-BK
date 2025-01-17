<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Http\Requests\JadwalPeriksaRequest;
use App\Models\JadwalPeriksa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class JadwalPeriksaController extends Controller
{
    public function index()
    {
        $jadwal = JadwalPeriksa::where('id_dokter', Auth::user()->dokter->id)->paginate(10);
        return view('dokter.jadwal_periksa', ['jadwalList' => $jadwal]);
    }

    private function validateTimeGap($jam_mulai, $jam_selesai)
    {
        try {
            // Adjust the format to accept time with seconds
            $start = Carbon::createFromFormat('H:i:s', $jam_mulai);
            $end = Carbon::createFromFormat('H:i:s', $jam_selesai);

            $diffInMinutes = $start->diffInMinutes($end);

            return $diffInMinutes >= 60; // Return true if difference is 1 hour or more
        } catch (\Exception $e) {
            return false; // Fail validation on error
        }
    }

    public function store(JadwalPeriksaRequest $request)
    {
        // Normalize input time format
        $jam_mulai = $request->jam_mulai;
        $jam_selesai = $request->jam_selesai;

        // Append ':00' if no seconds are provided
        if (strlen($jam_mulai) == 5) {
            $jam_mulai .= ':00';
        }
        if (strlen($jam_selesai) == 5) {
            $jam_selesai .= ':00';
        }

        // Check for duplicates
        $isDuplicate = JadwalPeriksa::where('id_dokter', Auth::user()->dokter->id)->where('hari', $request->hari)->exists();

        if ($isDuplicate) {
            return back()->with('status', 'danger')
                        ->with('message', 'Jadwal tidak boleh sama');;
        }
        else if (!$this->validateTimeGap($request->jam_mulai, $request->jam_selesai)) {
            return back()->with('status', 'danger')
                         ->with('message', 'Minimal waktu praktek adalah 1 jam');
        }
        else {
            $jadwal = new JadwalPeriksa();

            $jadwal->hari = $request->hari;
            $jadwal->jam_mulai = $request->jam_mulai;
            $jadwal->jam_selesai = $request->jam_selesai;
            $jadwal->id_dokter = Auth::user()->dokter->id;

            $jadwal->save();

            if($jadwal) {
                Session::flash('status', 'success');
                Session::flash('message', 'Jadwal Periksa Berhasil Ditambahkan');
            }

            return redirect()->route('dokter.jadwal');
        }
    }

    public function update(JadwalPeriksaRequest $request, $id)
    {
        // Normalize input time format
        $jam_mulai = $request->jam_mulai;
        $jam_selesai = $request->jam_selesai;

        // Append ':00' if no seconds are provided
        if (strlen($jam_mulai) == 5) {
            $jam_mulai .= ':00';
        }
        if (strlen($jam_selesai) == 5) {
            $jam_selesai .= ':00';
        }

        $isDuplicate = JadwalPeriksa::where('id_dokter', Auth::user()->dokter->id)
                                    ->where('hari', $request->hari)
                                    ->where('id', '!=', $id)
                                    ->exists();

        if ($isDuplicate) {
            return back()->with('status', 'danger')
                        ->with('message', 'Jadwal tidak boleh sama');;
        }
        else if (!$this->validateTimeGap($request->jam_mulai, $request->jam_selesai)) {
            return back()->with('status', 'danger')
                         ->with('message', 'Minimal waktu praktek adalah 1 jam');
        }
        else {
            $jadwal = JadwalPeriksa::findOrFail($id);

            // Update jadwal fields
            $jadwal->update($request->validated());

            if($jadwal) {
                Session::flash('status', 'success');
                Session::flash('message', 'Jadwal Berhasil Diubah');
            }

            return redirect()->route('dokter.jadwal');
        }
    }
}
