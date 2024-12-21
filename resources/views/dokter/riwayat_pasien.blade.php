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
                        <th class="d-none d-xl-table-cell">tanggal Periksa</th>
                        <th class="d-none d-xl-table-cell">Nama</th>
                        <th class="d-none d-xl-table-cell">Catatan</th>
                        <th class="d-none d-xl-table-cell">Keluhan</th>
                        <th class="d-none d-xl-table-cell">Obat</th>
                        <th class="d-none d-md-table-cell">Status</th>
                        <th class="d-none d-md-table-cell">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detailList as $detail)
                        <tr>
                            <td class="d-none d-xl-table-cell">{{ $detail->periksa->tgl_periksa }}</td>
                            <td class="d-none d-xl-table-cell">{{ $detail->periksa->daftar->pasien->nama }}</td>
                            <td>{{ Str::words($detail->periksa->catatan, 10, '...') }}</td>
                            <td class="d-none d-xl-table-cell">{{ $detail->periksa->daftar->keluhan }}</td>
                            <td class="d-none d-xl-table-cell">{{ $detail->obat->nama_obat }}</td>
                            <td>
                                @if($detail->periksa->daftar->status == 1)
                                    <span class="badge bg-success">Sudah Diperiksa</span>
                                @else
                                    <span class="badge bg-danger">Belum Diperiksa</span>
                                @endif
                            </td>
                            <td>
                                <a data-bs-toggle="modal" data-bs-target="#detailCatatan-{{ $detail->id }}">
                                    <button class="btn btn-primary">Detail Catatan</button>
                                </a>
                                <!-- Modal for Update Dokter -->
                                <div class="modal fade" id="detailCatatan-{{$detail->id}}" tabindex="-1" aria-labelledby="detailCatatanLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="detailCatatanLabel">Detail Catatan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form>
                                                <div class="modal-body">
                                                    <div class="mb-3 row">
                                                        <label for="catatan" class="col-sm-2 col-form-label">Catatan</label>
                                                        <div class="col-sm-10">
                                                            <textarea class="form-control" id="catatan" name="catatan" style="max-height: 300px; overflow-y: auto;">{{ $detail->periksa->catatan }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
