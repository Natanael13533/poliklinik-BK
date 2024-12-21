@extends('layouts.dokter')

@section('title')
    Periksa Pasien
@endsection

@section('content')

@if (session('message'))
    <div class="alert alert-{{ session('status') }}">
        {{ session('message') }}
    </div>
@endif

<div class="row">
    <div class="col-12 col-lg-12 col-xxl-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header">
                <h5 class="card-title mb-0">Tabel Daftar Poli</h5>
            </div>
            <table class="table table-hover my-0">
                <thead>
                    <tr>
                        <th class="d-none d-xl-table-cell">No. Antrian</th>
                        <th class="d-none d-xl-table-cell">Keluhan</th>
                        <th class="d-none d-xl-table-cell">Nama</th>
                        <th class="d-none d-xl-table-cell">No. RM</th>
                        <th class="d-none d-md-table-cell">Status</th>
                        <th class="d-none d-md-table-cell">Periksa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($daftarList as $daftar)
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
                            <td>
                                <a data-bs-toggle="modal" data-bs-target="#tambahPeriksa-{{ $daftar->id }}">
                                    <button class="btn btn-success">Periksa Pasien</button>
                                </a>
                                @include('dokter.partials.periksa.tambah_periksa')
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const selectObat = document.getElementById('id_obat');
        const biayaPeriksaInput = document.getElementById('biaya_periksa');
        const fixedAmount = 150000;

        selectObat.addEventListener('change', function () {
            const selectedOption = this.options[this.selectedIndex];
            const obatHarga = parseInt(selectedOption.getAttribute('data-harga')) || 0;

            // Calculate total biaya periksa
            const total = obatHarga + fixedAmount;

            // Update the biaya_periksa input
            biayaPeriksaInput.value = `Rp.${total.toLocaleString('id-ID')},00`;
        });
    });

</script>
@endsection
