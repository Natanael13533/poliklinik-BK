<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Http\Requests\JadwalPeriksaRequest;
use App\Models\JadwalPeriksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class JadwalPeriksaController extends Controller
{
    public function index()
    {
        $jadwal = JadwalPeriksa::where('id_dokter', Auth::user()->dokter->id)->paginate(5);
        return view('dokter.jadwal_periksa', ['jadwalList' => $jadwal]);
    }

    public function store(JadwalPeriksaRequest $request)
    {
        // Check for duplicates
        $isDuplicate = JadwalPeriksa::where('hari', $request->hari)
                                        ->where('jam_mulai', $request->jam_mulai)
                                        ->where('jam_selesai', $request->jam_selesai)
                                        ->exists();

        if ($isDuplicate) {
            return back()->withErrors(['duplicate' => 'The combination of day and time already exists.'])
                        ->with('status', 'danger')
                        ->with('message', 'Jadwal tidak boleh sama');;
        }

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

    public function update(JadwalPeriksaRequest $request, $id)
    {
        $jadwal = JadwalPeriksa::findOrFail($id);

        // Update jadwal fields
        $jadwal->update($request->validated());

        if($jadwal) {
            Session::flash('status', 'success');
            Session::flash('message', 'Jadwal Berhasil Diubah');
        }

        return redirect()->route('dokter.jadwal');
    }

    // public function destroy($id)
    // {
    //     $jadwal = JadwalPeriksa::findOrFail($id);

    //     $jadwal->delete();

    //     if ($jadwal) {
    //         Session::flash('status', 'success');
    //         Session::flash('message', 'Jadwal Berhasil Di Hapus');
    //     }

    //     return redirect()->route('dokter.jadwal');
    // }
}
