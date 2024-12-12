<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasienCreateRequest;
use App\Models\Pasien;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;

class PasienController extends Controller
{
    public function index()
    {
        $pasien = Pasien::select('id','nama', 'alamat', 'no_ktp', 'no_hp', 'no_rm')->paginate(5);

        return view('admin.pasien', ['pasienList' => $pasien]);
    }

    public function store(PasienCreateRequest $request)
    {
        $pasien = new Pasien();

        $pasien->nama = $request->nama;
        $pasien->alamat = $request->alamat;
        $pasien->no_hp = $request->no_hp;
        $pasien->no_ktp = $request->no_ktp;
        $pasien->no_rm = $request->no_rm;

        $pasien->save();

        if($pasien) {
            Session::flash('status', 'success');
            Session::flash('message', 'Pasien Berhasil Ditambahkan');
        }

        return redirect()->route('admin.pasien');
    }

    public function edit($id): View
    {
        $pasien = Pasien::findOrFail($id);

        return view('admin.partials.edit_pasien', compact('pasien'));
    }

    public function update(PasienCreateRequest $request, $id)
    {
        $pasien = Pasien::findOrFail($id);

        // Update the Pasien data with the validated request data
        $pasien->update($request->validated());

        if($pasien) {
            Session::flash('status', 'success');
            Session::flash('message', 'Pasien Berhasil Diubah');
        }

        return redirect()->route('admin.pasien');
    }

    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);

        $pasien->delete();

        if ($pasien) {
            Session::flash('status', 'success');
            Session::flash('message', 'Pasien Berhasil Di Hapus');
        }

        return redirect()->route('admin.pasien');
    }
}
