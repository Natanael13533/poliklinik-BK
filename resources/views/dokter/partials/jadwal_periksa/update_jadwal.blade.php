<!-- Modal for Update Dokter -->
<div class="modal fade" id="updateJadwal-{{$jadwal->id}}" tabindex="-1" aria-labelledby="updateJadwalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="updateJadwalLabel">Update Jadwal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('dokter.jadwal.update', $jadwal->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="hari" class="col-sm-2 col-form-label">Hari</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="hari" name="hari" value="{{ $jadwal->hari }}"/>
                            @error('hari')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jam_mulai" class="col-sm-2 col-form-label">Jam Mulai</label>
                        <div class="col-sm-10">
                            <input type="time" class="form-control" id="jam_mulai" name="jam_mulai" value="{{ $jadwal->jam_mulai }}"/>
                            @error('jam_mulai')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jam_selesai" class="col-sm-2 col-form-label">Jam Selesai</label>
                        <div class="col-sm-10">
                            <input type="time" class="form-control" id="jam_selesai" name="jam_selesai" value="{{ $jadwal->jam_selesai }}"/>
                            @error('jam_selesai')
                                <div class="alert alert-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update Dokter</button>
            </div>
        </form>
    </div>
    </div>
</div>
