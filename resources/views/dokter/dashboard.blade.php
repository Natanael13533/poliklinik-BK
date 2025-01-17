@extends('layouts.dokter')

@section('title')
    Dokter Dashboard
@endsection

@section('content')

<h1>Selamat Datang {{$dokter->nama}}</h1>

<br>

<h3>Berikut daftar pasien yang sudah mendaftar untuk di rawat, silahkan ke halaman periksa pasien, untuk memeriksa lebih lanjut</h3>

<br>

<div class="row">
    <div class="col-12 col-lg-12 col-xxl-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header">
                <h5 class="card-title mb-0">Tabel Pasien</h5>
            </div>
            <table class="table table-hover my-0">
                <thead>
                    <tr>
                        <th class="d-none d-xl-table-cell">No. Antrian</th>
                        <th class="d-none d-xl-table-cell">Keluhan</th>
                        <th class="d-none d-xl-table-cell">Nama</th>
                        <th class="d-none d-xl-table-cell">No. RM</th>
                        <th class="d-none d-md-table-cell">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($daftar as $daftar)
                        <tr>
                            <td class="d-none d-xl-table-cell">{{ $daftar->no_antrian }}</td>
                            <td>{{ $daftar->keluhan }}</td>
                            <td class="d-none d-xl-table-cell">{{ $daftar->pasien->nama }}</td>
                            <td class="d-none d-xl-table-cell">{{ $daftar->pasien->no_rm }}</td>
                            <td>
                                @if($daftar->status == 1)
                                    <span class="badge bg-success">Sudah Diperiksa</span>
                                @else
                                    <span class="badge bg-danger">Belum Diperiksa</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

