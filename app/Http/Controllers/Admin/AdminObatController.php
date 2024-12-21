<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ObatCreateRequest;
use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminObatController extends Controller
{
    public function index()
    {
        $obat = Obat::select('id', 'nama_obat', 'kemasan', 'harga')->paginate(10);

        return view('admin.obat', ['obatList' => $obat]);
    }

    public function store(ObatCreateRequest $request)
    {
        $obat = new Obat();

        $obat->nama_obat = $request->nama_obat;
        $obat->kemasan = $request->kemasan;
        $obat->harga = $request->harga;

        $obat->save();

        if($obat) {
            Session::flash('status', 'success');
            Session::flash('message', 'Obat Berhasil Ditambahkan');
        }

        return redirect()->route('admin.obat');
    }

    public function update(ObatCreateRequest $request, $id)
    {
        $obat = Obat::findOrFail($id);

        // Update the obat data with the validated request data
        $obat->update($request->validated());

        if($obat) {
            Session::flash('status', 'success');
            Session::flash('message', 'Obat Berhasil Diubah');
        }

        return redirect()->route('admin.obat');
    }

    public function destroy($id)
    {
        $obat = Obat::findOrFail($id);

        $obat->delete();

        if ($obat) {
            Session::flash('status', 'success');
            Session::flash('message', 'Obat Berhasil Di Hapus');
        }

        return redirect()->route('admin.obat');
    }
}
