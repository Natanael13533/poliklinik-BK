@extends('layouts.admin')

@section('title')
    Admin Dashboard
@endsection

@section('content')

@php
    use Illuminate\Support\Str;
@endphp

<div class="d-flex justify-content-between align-items-center">
    <h1 class="h3 mb-3"><strong>Poli</strong></h1>
    <div class="mb-2">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahPoli">Tambah Poli</button>
    </div>
</div>

@if (Session::has('status'))
    <div class="alert alert-success" role="alert">
        {{Session::get('message')}}
    </div>
@endif

<!-- Modal -->
<div class="modal fade" id="tambahPoli" tabindex="-1" aria-labelledby="tambahPoliLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Poli</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.poli.add') }}" method="POST">
            @csrf
            <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="nama_poli" class="col-sm-2 col-form-label">Nama Poli</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_poli" name="nama_poli"/>
                            <!-- error message untuk image -->
                            @error('nama_poli')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control" id="keterangan" name="keterangan"></textarea>
                            @error('keterangan')
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

                <h5 class="card-title mb-0">Tabel Poli</h5>
            </div>
            <table class="table table-hover my-0">
                <thead>
                    <tr>
                        <th class="d-none d-xl-table-cell">No.</th>
                        <th class="d-none d-xl-table-cell">Nama Poli</th>
                        <th class="d-none d-xl-table-cell">Keterangan</th>
                        <th class="d-none d-xl-table-cell">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($poliList as $poli)
                        <tr>
                            <th scope="row">{{$loop->iteration + $poliList->firstItem() - 1}}</th>
                            <td>{{$poli->nama_poli}}</td>
                            <td class="d-none d-xl-table-cell">{{Str::words($poli->keterangan, 10, '...')}}</td>
                            <td>
                                <a data-bs-toggle="modal" data-bs-target="#updatePoli-{{$poli->id}}">
                                    <i class="align-middle" data-feather="edit"></i>
                                </a>
                                @include('admin.partials.poli.update_poli')
                                <a data-bs-toggle="modal" data-bs-target="#deleteModal-{{$poli->id}}">
                                    <i class="align-middle" data-feather="delete"></i>
                                </a>
                                @include('admin.partials.poli.delete_poli')
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
