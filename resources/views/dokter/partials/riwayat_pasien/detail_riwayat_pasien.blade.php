<!-- Modal for detailed examination history -->
<div class="modal fade" id="detailModal-{{ $pasien->id }}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Riwayat Pemeriksaan - {{ $pasien->nama }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                @foreach($pasienData['examinations'] as $periksaId => $details)
                    <div class="examination-record mb-4">
                        <h6>Tanggal Periksa: {{ $details->first()->periksa->tgl_periksa }}</h6>
                        <p><strong>Catatan:</strong> {{ $details->first()->periksa->catatan }}</p>
                        <p><strong>Obat yang diberikan:</strong></p>
                        <ul>
                            @foreach($details as $detail)
                                <li>{{ $detail->obat->nama_obat }} - {{ $detail->obat->kemasan }}</li>
                            @endforeach
                        </ul>
                        <p><strong>Biaya Periksa:</strong> Rp {{ number_format($details->first()->periksa->biaya_periksa, 0, ',', '.') }},00</p>
                        <hr>
                    </div>
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
