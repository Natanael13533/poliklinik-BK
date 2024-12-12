<!-- Modal for Update Pasien -->
<div class="modal fade" id="updateObat-{{$obat->id}}" tabindex="-1" aria-labelledby="updateObatLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="updateObatLabel">Update Obat</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.obat.update', $obat->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="nama_obat" class="col-sm-2 col-form-label">Nama Obat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_obat" name="nama_obat" value="{{ $obat->nama_obat }}"/>
                            @error('nama_obat')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kemasan" class="col-sm-2 col-form-label">Kemasan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kemasan" name="kemasan" value="{{ $obat->kemasan }}"/>
                            @error('kemasan')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="harga" class="col-sm-2 col-form-label">harga</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="harga" name="harga" value="{{ $obat->harga }}"" />
                            @error('harga')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update Obat</button>
            </div>
        </form>
    </div>
    </div>
</div>
