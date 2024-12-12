@extends('layouts.admin')

@section('title')
    Admin Dashboard
@endsection

@section('content')

<div class="d-flex justify-content-between align-items-center">
    <h1 class="h3 mb-3"><strong>Pasien</strong></h1>
    <div class="mb-2">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahObat">Tambah Obat</button>
    </div>
</div>

@if (Session::has('status'))
    <div class="alert alert-success" role="alert">
        {{Session::get('message')}}
    </div>
@endif

<!-- Modal -->
<div class="modal fade" id="tambahObat" tabindex="-1" aria-labelledby="tambahObatLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.obat.add') }}" method="POST">
            @csrf
            <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="nama_obat" class="col-sm-2 col-form-label">Nama Obat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_obat" name="nama_obat"/>
                            <!-- error message untuk image -->
                            @error('nama_obat')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kemasan" class="col-sm-2 col-form-label">Kemasan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kemasan" name="kemasan"/>
                            @error('kemasan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="harga" name="harga"/>
                            @error('harga')
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

                <h5 class="card-title mb-0">Tabel Obat</h5>
            </div>
            <table class="table table-hover my-0">
                <thead>
                    <tr>
                        <th class="d-none d-xl-table-cell">No.</th>
                        <th class="d-none d-xl-table-cell">Nama Obat</th>
                        <th class="d-none d-xl-table-cell">Kemasan</th>
                        <th class="d-none d-xl-table-cell">Harga</th>
                        <th class="d-none d-xl-table-cell">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($obatList as $obat)
                        <tr>
                            <th scope="row">{{$loop->iteration + $obatList->firstItem() - 1}}</th>
                            <td>{{$obat->nama_obat}}</td>
                            <td class="d-none d-xl-table-cell">{{$obat->kemasan}}</td>
                            <td class="d-none d-xl-table-cell">{{$obat->harga}}</td>
                            <td>
                                <a data-bs-toggle="modal" data-bs-target="#updateObat-{{$obat->id}}">
                                    <i class="align-middle" data-feather="edit"></i>
                                </a>
                                    @include('admin.partials.obat.update_obat')
                                <a data-bs-toggle="modal" data-bs-target="#deleteModal-{{$obat->id}}">
                                    <i class="align-middle" data-feather="delete"></i>
                                </a>
                                @include('admin.partials.obat.delete_obat')
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
