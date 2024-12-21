<?php

namespace App\Http\Controllers\Pasien;

use App\Http\Controllers\Controller;
use App\Http\Requests\PasienCreateRequest;
use App\Models\Pasien;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class PasienController extends Controller
{
    public function index()
    {
        $pasien = Pasien::with(['user'])->paginate(5);

        return view('admin.pasien', ['pasienList' => $pasien]);
    }

    public function store(PasienCreateRequest $request)
    {
        $pasien = new Pasien();

        $pasien->nama = $request->nama;
        $pasien->alamat = $request->alamat;
        $pasien->no_hp = $request->no_hp;
        $pasien->no_ktp = $request->no_ktp;

        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'pasien', // or whatever role
        ]);

        $user->save();

        $pasien->user_id = $user->id;

        $pasien->save();

         // Update the no_rm field with the desired format
        $yyyymm = Carbon::parse($pasien->created_at)->format('Ym');
        $pasien->no_rm = "{$yyyymm}-{$pasien->id}";

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

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'max:150|required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'no_ktp' => 'required',
            'email' => 'required|email',
            // 'password' validation is removed
        ]);

        $pasien = Pasien::findOrFail($id);
        $user = User::findOrFail($pasien->user_id);
        // dd($pasien, $user);

        // Update pasien fields
        $pasien->nama = $request->nama;
        $pasien->alamat = $request->alamat;
        $pasien->no_hp = $request->no_hp;
        $pasien->no_ktp = $request->no_ktp;

        // Update User fields (email and password if needed)
        $user->name = $request->nama;
        $user->email = $request->email;

        // Only update the password if it's provided
        // if ($request->password) {
        //     $user->password = bcrypt($request->password);
        // }

        // Save both pasien and User records

        $user->save();

        $pasien->save();

        if($pasien) {
            Session::flash('status', 'success');
            Session::flash('message', 'Pasien Berhasil Diubah');
        }

        return redirect()->route('admin.pasien');
    }

    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $user = User::findOrFail($pasien->user_id);

        $pasien->delete();

        $user->delete();

        if ($pasien && $user) {
            Session::flash('status', 'success');
            Session::flash('message', 'Pasien Berhasil Di Hapus');
        }

        return redirect()->route('admin.pasien');
    }
}
