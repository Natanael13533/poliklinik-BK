<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Http\Requests\PeriksaCreateRequest;
use App\Models\DaftarPoli;
use App\Models\DetailPeriksa;
use App\Models\Obat;
use App\Models\Periksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PeriksaController extends Controller
{
    public function index()
    {
        $dokterId = Auth::user()->dokter->id;

        $daftar = DaftarPoli::with(['jadwal', 'pasien'])
            ->where('status', '0')
            ->whereHas('jadwal.dokter', function ($query) use ($dokterId) {
                $query->where('id', $dokterId);
            })
            ->orderby('no_antrian', 'asc')
            ->paginate(5);
        $obat = Obat::select('id', 'nama_obat', 'kemasan', 'harga')->get();
        return view('dokter.periksa', ['obat' => $obat, 'daftarList' => $daftar]);
    }

    public function store(PeriksaCreateRequest $request, $id)
    {

        // Fetch selected `obat` details
        $obatIds = $request->id_obat; // This is an array of `id_obat`
        $obatDetails = Obat::whereIn('id', $obatIds)->get();

        // Calculate total cost (sum of obat prices + fixed fee)
        $totalHargaObat = $obatDetails->sum('harga');
        $biayaPeriksa = $totalHargaObat + 150000; // Add fixed fee

        $daftar = DaftarPoli::findOrFail($id);

        $periksa = new Periksa();
        $periksa->id_daftar_poli = $daftar->id;
        $periksa->tgl_periksa = now()->format('Y-m-d');
        $periksa->catatan = $request->catatan;
        $periksa->biaya_periksa = $biayaPeriksa;

        $periksa->daftar->status = '1';
        $periksa->daftar->save();

        $periksa->save();

         // Create DetailPeriksa for each selected obat
         foreach ($obatDetails as $obat) {
            $detail = new DetailPeriksa();
            $detail->id_obat = $obat->id;
            $detail->id_periksa = $periksa->id;
            $detail->save();
        }

        if($periksa && $detail) {
            Session::flash('status', 'success');
            Session::flash('message', 'Periksa Pasien Berhasil');
        }

        return redirect()->route('dokter.periksa');
    }

    public function riwayat()
    {
        $dokterId = Auth::user()->dokter->id;

        // Get all patients with their examination details
        $detail = DetailPeriksa::with(['periksa.daftar.pasien', 'obat'])
            ->whereHas('periksa.daftar', function ($query) {
                $query->where('status', '1');
            })
            ->whereHas('periksa.daftar.jadwal.dokter', function ($query) use ($dokterId) {
                $query->where('id', $dokterId);
            })
            ->get()
            ->groupBy('periksa.daftar.pasien.id')
            ->map(function ($patientDetails) {
                // Group examinations by periksa_id to maintain all details
                $examinations = $patientDetails->groupBy('id_periksa');
                return [
                    'patient_info' => $patientDetails->first()->periksa->daftar->pasien,
                    'examinations' => $examinations
                ];
            });

        return view('dokter.riwayat_pasien', ['detailList' => $detail]);
    }
}
