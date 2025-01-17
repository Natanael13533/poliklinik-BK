<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;
use App\Models\DaftarPoli;
use Illuminate\Support\Facades\Auth;

class DokterController extends Controller
{
    public function index()
    {
        $dokter = Auth::user()->dokter;
        $dokterId = $dokter->id;
        $daftar = DaftarPoli::with(['jadwal', 'pasien'])
            ->where('status', '0')
            ->whereHas('jadwal.dokter', function ($query) use ($dokterId) {
                $query->where('id', $dokterId);
            })
            ->orderby('no_antrian', 'asc')
            ->paginate(5);
        return view('dokter.dashboard', compact('dokter', 'daftar'));
    }
}
