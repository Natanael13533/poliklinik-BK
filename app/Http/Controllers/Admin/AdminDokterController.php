<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DokterCreateRequest;
use App\Models\Dokter;
use App\Models\Poli;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminDokterController extends Controller
{
    public function index()
    {
        $dokter = Dokter::with(['poli', 'user'])->paginate(5);
        $poli = Poli::select('id','nama_poli', 'keterangan')->get();

        return view('admin.dokter', ['dokterList' => $dokter, 'poli' => $poli]);
    }

    public function store(DokterCreateRequest $request)
    {
        $dokter = new Dokter();

        $dokter->nama = $request->nama;
        $dokter->alamat = $request->alamat;
        $dokter->no_hp = $request->no_hp;
        $dokter->id_poli = $request->id_poli;

        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'dokter', // or whatever role
        ]);

        $user->save();

        $dokter->user_id = $user->id;

        $dokter->save();

        if($dokter) {
            Session::flash('status', 'success');
            Session::flash('message', 'Dokter Berhasil Ditambahkan');
        }

        return redirect()->route('admin.dokter');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'max:150|required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'id_poli' => 'required',
            'email' => 'required|email',
            // 'password' validation is removed
        ]);

        $dokter = Dokter::findOrFail($id);
        $user = User::findOrFail($dokter->user_id);
        // dd($dokter, $user);

        // Update Dokter fields
        $dokter->nama = $request->nama;
        $dokter->alamat = $request->alamat;
        $dokter->no_hp = $request->no_hp;
        $dokter->id_poli = $request->id_poli;

        // Update User fields (email and password if needed)
        $user->name = $request->nama;
        $user->email = $request->email;

        // Only update the password if it's provided
        // if ($request->password) {
        //     $user->password = bcrypt($request->password);
        // }

        // Save both Dokter and User records

        $user->save();

        $dokter->save();

        if($dokter && $user) {
            Session::flash('status', 'success');
            Session::flash('message', 'Dokter Berhasil Diubah');
        }

        return redirect()->route('admin.dokter');
    }

    public function destroy($id)
    {
        $dokter = Dokter::findOrFail($id);
        $user = User::findOrFail($dokter->user_id);

        $user->delete();

        $dokter->delete();

        if ($dokter && $user) {
            Session::flash('status', 'success');
            Session::flash('message', 'Dokter Berhasil Di Hapus');
        }

        return redirect()->route('admin.dokter');
    }
}
