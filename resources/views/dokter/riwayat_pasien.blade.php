@extends('layouts.dokter')

@section('title')
    Riwayat Periksa Pasien
@endsection

@section('content')

<div class="row">
    <div class="col-12 col-lg-12 col-xxl-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header">
                <h5 class="card-title mb-0">Tabel Daftar Poli</h5>
            </div>
            <table class="table table-hover my-0">
                <thead>
                    <tr>
                        <th class="d-none d-xl-table-cell">Tanggal Periksa</th>
                        <th class="d-none d-xl-table-cell">Nama Pasien</th>
                        <th class="d-none d-xl-table-cell">Nomor Rekam Medis</th>
                        <th class="d-none d-xl-table-cell">No. HP Pasien</th>
                        <th class="d-none d-md-table-cell">Status</th>
                        <th class="d-none d-md-table-cell">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detailList as $pasienData)
                        @php
                            $pasien = $pasienData['patient_info'];
                            $tgl_terakhir = $pasienData['examinations']->first()->first();
                        @endphp
                        <tr>
                            <td class="d-none d-xl-table-cell">{{ $tgl_terakhir->periksa->tgl_periksa }}</td>
                            <td class="d-none d-xl-table-cell">{{ $pasien->nama }}</td>
                            <td class="d-none d-xl-table-cell">{{ $pasien->no_rm }}</td>
                            <td class="d-none d-xl-table-cell">{{ $pasien->no_hp }}</td>
                            <td>
                                <span class="badge bg-success">Sudah Diperiksa</span>
                            </td>
                            <td>
                                <button class="btn btn-info" data-bs-toggle="modal"
                                        data-bs-target="#detailModal-{{ $pasien->id }}">
                                    Detail Catatan
                                </button>
                                @include('dokter.partials.riwayat_pasien.detail_riwayat_pasien')
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
