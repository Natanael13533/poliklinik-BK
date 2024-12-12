<!-- Modal for Update Pasien -->
<div class="modal fade" id="updatePoli-{{$poli->id}}" tabindex="-1" aria-labelledby="updatePoliLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="updatePoliLabel">Update Poli</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.poli.update', $poli->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="nama_poli" class="col-sm-2 col-form-label">Nama Poli</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_poli" name="nama_poli" value="{{ $poli->nama_poli }}"/>
                            @error('nama_poli')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-10">
                            <textarea type="text" class="form-control" id="keterangan" name="keterangan">{{ $poli->keterangan }}</textarea>
                            @error('keterangan')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update Poli</button>
            </div>
        </form>
    </div>
    </div>
</div>
