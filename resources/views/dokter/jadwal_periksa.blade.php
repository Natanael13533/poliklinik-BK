@extends('layouts.dokter')

@section('title')
    Jadwal Periksa Dokter
@endsection

@section('content')

<div class="d-flex justify-content-between align-items-center">
    <h1 class="h3 mb-3"><strong>Jadwal Periksa</strong></h1>
    <div class="mb-2">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahJadwal">Tambah Jadwal Periksa</button>
    </div>
</div>

@if (session('message'))
    <div class="alert alert-{{ session('status') }}">
        {{ session('message') }}
    </div>
@endif

<!-- Modal -->
<div class="modal fade" id="tambahJadwal" tabindex="-1" aria-labelledby="tambahJadwalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahJadwalLabel">Tambah Dokter</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('dokter.jadwal.add') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="mb-3 row">
                    <label for="hari" class="col-sm-2 col-form-label">Hari</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="hari" name="hari"/>
                        <!-- error message untuk image -->
                        @error('hari')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jam_mulai" class="col-sm-2 col-form-label">Jam Mulai</label>
                    <div class="col-sm-10">
                        <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" />
                        @error('jam_mulai')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jam_selesai" class="col-sm-2 col-form-label">Jam Selesai</label>
                    <div class="col-sm-10">
                        <input type="time" class="form-control" id="jam_selesai" name="jam_selesai"/>
                        @error('jam_selesai')
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
                <h5 class="card-title mb-0">Tabel Jadwal Periksa</h5>
            </div>
            <table class="table table-hover my-0">
                <thead>
                    <tr>
                        <th class="d-none d-xl-table-cell">No.</th>
                        <th class="d-none d-xl-table-cell">Hari</th>
                        <th class="d-none d-xl-table-cell">Jam Mulai</th>
                        <th class="d-none d-md-table-cell">Jam Selesai</th>
                        <th class="d-none d-md-table-cell">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jadwalList as $jadwal)
                        <tr>
                            <th scope="row">{{$loop->iteration + $jadwalList->firstItem() - 1}}</th>
                            <td>{{ $jadwal->hari }}</td>
                            <td class="d-none d-xl-table-cell">{{ $jadwal->jam_mulai }}</td>
                            <td class="d-none d-md-table-cell">{{ $jadwal->jam_selesai }}</td>
                            <td>
                                <a data-bs-toggle="modal" data-bs-target="#updateJadwal-{{ $jadwal->id }}">
                                    <i class="align-middle" data-feather="edit"></i>
                                </a>
                                @include('dokter.partials.jadwal_periksa.update_jadwal')
                                {{-- <a data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $jadwal->id }}">
                                    <i class="align-middle" data-feather="delete"></i>
                                </a>
                                @include('dokter.partials.jadwal_periksa.delete_jadwal') --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    document.getElementById('jam_mulai').addEventListener('change', function() {
        let timeValue = this.value;
        if (timeValue.length === 5) { // If no seconds are included (e.g., "12:12")
            this.value = timeValue + ":00"; // Append ":00" for seconds
        }
    });

    document.getElementById('jam_selesai').addEventListener('change', function() {
        let timeValue = this.value;
        if (timeValue.length === 5) { // If no seconds are included (e.g., "12:12")
            this.value = timeValue + ":00"; // Append ":00" for seconds
        }
    });
</script>
@endsection
