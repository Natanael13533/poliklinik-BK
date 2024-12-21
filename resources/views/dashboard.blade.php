@extends('layouts.pasien')

@section('title')
    Pasien Dashboard
@endsection

@section('content')

<div class="row">
    <div class="col-12 col-lg-6 col-xxl-6 d-flex">
        <div class="card flex-fill">
            <div class="card-header">

                <h5 class="card-title mb-0">Tabel Dokter</h5>
            </div>
            <table class="table table-hover my-0">
                <thead>
                    <tr>
                        <th class="d-none d-xl-table-cell">No.</th>
                        <th class="d-none d-xl-table-cell">Nama</th>
                        <th class="d-none d-xl-table-cell">Alamat</th>
                        <th class="d-none d-xl-table-cell">No. HP</th>
                        <th class="d-none d-md-table-cell">Poli</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dokterList as $dokter)
                        <tr>
                            <th scope="row">{{$loop->iteration + $dokterList->firstItem() - 1}}</th>
                            <td>{{$dokter->nama}}</td>
                            <td class="d-none d-xl-table-cell">{{$dokter->alamat}}</td>
                            <td class="d-none d-md-table-cell">{{$dokter->no_hp}}</td>
                            <td class="d-none d-md-table-cell">{{$dokter->poli->nama_poli}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-12 col-lg-6 col-xxl-6 d-flex">
        <div class="card flex-fill">
            <div class="card-header">

                <h5 class="card-title mb-0">Tabel Poli</h5>
            </div>
            <table class="table table-hover my-0">
                <thead>
                    <tr>
                        <th class="d-none d-xl-table-cell">No.</th>
                        <th class="d-none d-xl-table-cell">Nama Poli</th>
                        <th class="d-none d-xl-table-cell">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dokterList as $dokter)
                        <tr>
                            <th scope="row">{{$loop->iteration + $dokterList->firstItem() - 1}}</th>
                            <td>{{$dokter->poli->nama_poli}}</td>
                            <td class="d-none d-xl-table-cell">{{Str::words($dokter->poli->keterangan, 10, '...')}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

