<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PoliCreateRequest;
use App\Models\Poli;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminPoliController extends Controller
{
    public function index()
    {
        $poli = Poli::select('id', 'nama_poli', 'keterangan')->paginate(5);

        return view('admin.poli', ['poliList' => $poli]);
    }

    public function store(PoliCreateRequest $request)
    {
        $poli = new Poli();

        $poli->nama_poli = $request->nama_poli;
        $poli->keterangan = $request->keterangan;

        $poli->save();

        if($poli) {
            Session::flash('status', 'success');
            Session::flash('message', 'Poli Berhasil Ditambahkan');
        }

        return redirect()->route('admin.poli');
    }

    public function update(PoliCreateRequest $request, $id)
    {
        $poli = Poli::findOrFail($id);

        // Update the poli data with the validated request data
        $poli->update($request->validated());

        if($poli) {
            Session::flash('status', 'success');
            Session::flash('message', 'Poli Berhasil Diubah');
        }

        return redirect()->route('admin.poli');
    }

    public function destroy($id)
    {
        $poli = Poli::findOrFail($id);

        $poli->delete();

        if ($poli) {
            Session::flash('status', 'success');
            Session::flash('message', 'Poli Berhasil Di Hapus');
        }

        return redirect()->route('admin.poli');
    }
}
