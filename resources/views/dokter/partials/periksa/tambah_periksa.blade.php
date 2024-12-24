<!-- Modal for Update Dokter -->
<div class="modal fade" id="tambahPeriksa-{{$daftar->id}}" tabindex="-1" aria-labelledby="tambahPeriksaLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="tambahPeriksaLabel">Periksa Pasien</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('dokter.periksa.add', $daftar->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $daftar->pasien->nama }}" disabled readonly/>
                        @error('nama')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="no_rm" class="col-sm-2 col-form-label">Nomor RM</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="no_rm" name="no_rm" value="{{ $daftar->pasien->no_rm }}" disabled readonly />
                        @error('no_rm')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="keluhan" class="col-sm-2 col-form-label">Keluhan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="keluhan" name="keluhan" value="{{ $daftar->keluhan }}" disabled readonly/>
                        @error('keluhan')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="catatan" class="col-sm-2 col-form-label">Catatan</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" id="catatan" name="catatan"></textarea>
                        @error('catatan')
                            <div class="alert alert-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="id_obat" class="col-sm-2 col-form-label">Obat</label>
                    <div class="col-sm-9">
                        <select name="id_obat[]" id="id_obat" class="form-control" multiple>
                            @foreach ($obat as $item)
                                <option value="{{ $item->id }}" data-harga="{{ $item->harga }}">
                                    {{ $item->nama_obat }} || Rp.{{ $item->harga }},00
                                </option>
                            @endforeach
                        </select>
                        @error('id_obat')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="biaya_periksa" class="col-sm-2 col-form-label">Biaya Periksa</label>
                    <div class="col-sm-9">
                        <input type="text" name="biaya_periksa" id="biaya_periksa" class="form-control" readonly>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Periksa</button>
            </div>
        </form>
    </div>
    </div>
</div>
