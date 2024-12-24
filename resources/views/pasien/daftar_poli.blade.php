@extends('layouts.pasien')

@section('title')
    Pasien Dashboard
@endsection

@section('content')
<div class="d-flex justify-content-between align-items-center">
    <h1 class="h3 mb-3"><strong>Daftar Poli</strong></h1>
    <div class="mb-2">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahDaftarPoli">Tambah Daftar Poli</button>
    </div>
</div>

@if (Session::has('status'))
    <div class="alert alert-success" role="alert">
        {{Session::get('message')}}
    </div>
@endif

<!-- Modal -->
<div class="modal fade" id="tambahDaftarPoli" tabindex="-1" aria-labelledby="tambahDaftarPoliLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahDaftarPoliLabel">Tambah Daftar Poli</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('pasien.daftar_poli.add') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="mb-3 row">
                    <label for="keluhan" class="col-sm-2 col-form-label">Keluhan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="keluhan" name="keluhan"/>
                        <!-- error message untuk image -->
                        @error('keluhan')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="id_poli" class="col-sm-2 col-form-label">Poli</label>
                    <div class="col-sm-5">
                        <select name="id_poli"" id="id_poli" class="form-control" >
                            <option value="">Pilih Poli</option>
                            @foreach ($poli as $item)
                                <option value="{{$item->id}}">{{$item->nama_poli}}</option>
                            @endforeach
                        </select>
                        @error('id_poli')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                {{-- <div class="mb-3 row">
                    <label for="id_jadwal" class="col-sm-2 col-form-label">Jadwal Perisa</label>
                    <div class="col-sm-7">
                        <select name="id_jadwal"" id="id_jadwal" class="form-control" >
                            <option value="">pilih Jadwal</option>
                            @foreach ($jadwal as $item)
                                <option value="{{$item->id}}">{{ $item->hari }} || {{ $item->jam_mulai }} - {{ $item->jam_selesai }}</option>
                            @endforeach
                        </select>
                        @error('id_jadwal')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div> --}}
                <div class="mb-3 row">
                    <label for="id_jadwal" class="col-sm-2 col-form-label">Jadwal Periksa</label>
                    <div class="col-sm-7">
                        <select name="id_jadwal" id="id_jadwal" class="form-control">
                            <option value="">Pilih Jadwal</option>
                        </select>
                        @error('id_jadwal')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
      </div>
    </div>
</div>

<div class="row">
    <div class="col-12 col-lg-12 col-xxl-12 d-flex">
        <div class="card flex-fill">
            <div class="card-header">
                <h5 class="card-title mb-0">Tabel Daftar Poli</h5>
            </div>
            <table class="table table-hover my-0">
                <thead>
                    <tr>
                        <th class="d-none d-xl-table-cell">No.</th>
                        <th class="d-none d-xl-table-cell">Keluhan</th>
                        <th class="d-none d-xl-table-cell">No. Antrian</th>
                        <th class="d-none d-xl-table-cell">Poli</th>
                        <th class="d-none d-xl-table-cell">Dokter</th>
                        <th class="d-none d-md-table-cell">Status</th>
                        <th class="d-none d-xl-table-cell">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($daftarList as $daftar)
                        <tr>
                            <th scope="row">{{$loop->iteration + $daftarList->firstItem() - 1}}</th>
                            <td>{{ $daftar->keluhan }}</td>
                            <td class="d-none d-xl-table-cell">{{ $daftar->no_antrian }}</td>
                            <td class="d-none d-xl-table-cell">{{ $daftar->jadwal->dokter->poli['nama_poli'] }}</td>
                            <td class="d-none d-xl-table-cell">{{ $daftar->jadwal->dokter['nama'] }}</td>
                            @if ($daftar->status == 1)
                                <td class="d-none d-xl-table-cell">Rp. {{ $daftar->periksa->biaya_periksa }}, 00</td>
                                <td><span class="badge bg-success">Sudah Diperiksa</span></td>
                            @else
                                <td class="d-none d-xl-table-cell">Belum Diperiksa oleh Dokter</td>
                                <td><span class="badge bg-danger">Belum Diperiksa</span></td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
    const poliSelect = document.getElementById('id_poli');
    const jadwalSelect = document.getElementById('id_jadwal');

        poliSelect.addEventListener('change', function () {
            const poliId = poliSelect.value;

            // Clear the jadwal dropdown
            jadwalSelect.innerHTML = '<option value="">Pilih Jadwal</option>';

            if (poliId) {
                fetch(`/get-schedules/${poliId}`)
                    .then((response) => response.json())
                    .then((data) => {
                        data.forEach((schedule) => {
                            const option = document.createElement('option');
                            option.value = schedule.id;
                            option.textContent = `${schedule.hari} || ${schedule.jam_mulai} - ${schedule.jam_selesai}`;
                            jadwalSelect.appendChild(option);
                        });
                    })
                    .catch((error) => {
                        console.error('Error fetching schedules:', error);
                    });
            }
        });
    });

</script>
@endsection
