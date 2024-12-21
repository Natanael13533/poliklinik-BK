<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use App\Models\Poli;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $dokter = Dokter::with('poli')->paginate(5);
        return view('dashboard', ['dokterList' => $dokter]);
    }
}
