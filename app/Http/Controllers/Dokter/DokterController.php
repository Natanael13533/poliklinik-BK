<?php

namespace App\Http\Controllers\Dokter;

use App\Http\Controllers\Controller;

class DokterController extends Controller
{
    public function index()
    {
        return view('dokter.dashboard');
    }
}
