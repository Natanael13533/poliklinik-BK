{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

@extends('layouts.admin')

@section('title')
    Admin Dashboard
@endsection

@section('content')

<div class="row">
    <div class="col-12 col-lg-6 col-xxl-6 d-flex">
        <div class="card flex-fill">
            <div class="card-header">

                <h5 class="card-title mb-0">Tabel Pasien</h5>
            </div>
            <table class="table table-hover my-0">
                <thead>
                    <tr>
                        <th class="d-none d-xl-table-cell">No.</th>
                        <th class="d-none d-xl-table-cell">Nama</th>
                        <th class="d-none d-xl-table-cell">Alamat</th>
                        <th class="d-none d-xl-table-cell">No. KTP</th>
                        <th class="d-none d-md-table-cell">No. HP</th>
                        <th class="d-none d-md-table-cell">No. RM</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pasienList as $pasien)
                        <tr>
                            <th scope="row">{{$loop->iteration + $pasienList->firstItem() - 1}}</th>
                            <td>{{$pasien->nama}}</td>
                            <td class="d-none d-xl-table-cell">{{$pasien->alamat}}</td>
                            <td class="d-none d-xl-table-cell">{{$pasien->no_ktp}}</td>
                            <td class="d-none d-md-table-cell">{{$pasien->no_hp}}</td>
                            <td class="d-none d-md-table-cell">{{$pasien->no_rm}}</td>
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
                    @foreach ($poliList as $poli)
                        <tr>
                            <th scope="row">{{$loop->iteration + $poliList->firstItem() - 1}}</th>
                            <td>{{$poli->nama_poli}}</td>
                            <td class="d-none d-xl-table-cell">{{$poli->keterangan}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

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
                        <th class="d-none d-md-table-cell">No. HP</th>
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
                            <td class="d-none d-md-table-cell">{{Str::words($dokter->poli->keterangan, 10, '...')}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-12 col-lg-6 col-xxl-6 d-flex">
        <div class="card flex-fill">
            <div class="card-header">

                <h5 class="card-title mb-0">Tabel Obat</h5>
            </div>
            <table class="table table-hover my-0">
                <thead>
                    <tr>
                        <th class="d-none d-xl-table-cell">No.</th>
                        <th class="d-none d-xl-table-cell">Nama Obat</th>
                        <th class="d-none d-xl-table-cell">Kemasan</th>
                        <th class="d-none d-xl-table-cell">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($obatList as $obat)
                        <tr>
                            <th scope="row">{{$loop->iteration + $obatList->firstItem() - 1}}</th>
                            <td>{{$obat->nama_obat}}</td>
                            <td class="d-none d-xl-table-cell">{{$obat->kemasan}}</td>
                            <td class="d-none d-xl-table-cell">{{$obat->harga}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
