<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use App\Models\Obat;
use App\Models\Pasien;
use App\Models\Poli;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $pasien = Pasien::select('nama', 'alamat', 'no_ktp', 'no_hp', 'no_rm')->paginate(5);
        $poli = Poli::select('nama_poli', 'keterangan')->paginate(5)->through(function ($item) {
                                                                                $item->keterangan = Str::words($item->keterangan, 10, '...');
                                                                                return $item;
                                                                            });;
        $dokter = Dokter::with('poli')->paginate(5);
        $obat = Obat::select('nama_obat', 'kemasan', 'harga')->paginate(5);
        return view('admin.dashboard', ['pasienList' => $pasien, 'poliList' => $poli, 'dokterList' => $dokter, 'obatList' => $obat]);
    }
}
