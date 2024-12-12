@extends('layouts.admin')

@section('title')
    Admin Dashboard
@endsection

@section('content')

<div class="d-flex justify-content-between align-items-center">
    <h1 class="h3 mb-3"><strong>Dokter</strong></h1>
    <div class="mb-2">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahDokter">Tambah Dokter</button>
    </div>
</div>

@if (Session::has('status'))
    <div class="alert alert-success" role="alert">
        {{Session::get('message')}}
    </div>
@endif

<!-- Modal -->
<div class="modal fade" id="tambahDokter" tabindex="-1" aria-labelledby="tambahDokterLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahDokterLabel">Tambah Dokter</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.dokter.add') }}" method="POST">
            @csrf
            <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama"/>
                            <!-- error message untuk image -->
                            @error('nama')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control" id="alamat" name="alamat"></textarea>
                            @error('alamat')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="no_hp" class="col-sm-2 col-form-label">No. Hp</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="no_hp" name="no_hp"/>
                            @error('no_hp')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email"/>
                            @error('email')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password"/>
                            @error('password')
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
                                <option value="">pilih Poli</option>
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
                        <th class="d-none d-md-table-cell">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dokterList as $dokter)
                        <tr>
                            <th scope="row">{{$loop->iteration + $dokterList->firstItem() - 1}}</th>
                            <td>{{$dokter->nama}}</td>
                            <td class="d-none d-xl-table-cell">{{$dokter->alamat}}</td>
                            <td class="d-none d-md-table-cell">{{$dokter->no_hp}}</td>
                            <td class="d-none d-md-table-cell">{{$dokter->poli['nama_poli']}}</td>
                            <td>
                                <a data-bs-toggle="modal" data-bs-target="#updateDokter-{{$dokter->id}}">
                                    <i class="align-middle" data-feather="edit"></i>
                                </a>
                                @include('admin.partials.dokter.update_dokter')
                                <a data-bs-toggle="modal" data-bs-target="#deleteModal-{{$dokter->id}}">
                                    <i class="align-middle" data-feather="delete"></i>
                                </a>
                                @include('admin.partials.dokter.delete_dokter')
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
