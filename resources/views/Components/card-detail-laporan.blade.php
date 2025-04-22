<!-- Modal -->
<div class="modal fade" id="detailLaporan{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="font-weight: bold;">Detail Laporan
                    {{ $item->kode_laporan }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="{{ asset('bukti_laporan/' . $item->bukti) }}" alt="bukti laporan" style="width: 100%;">
                <div class="mt-4">
                    <h5 style="font-weight: bold;">{{ $item->judul }}</h5>
                    <div class="card mt-4">
                        <div class="card-body">
                            <div class="card-title mb-3">
                                <strong>Detail Informasi</strong>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <span class="text-muted" style="width: 100px; display: inline-block;">Kode</span>
                                    <span>{{ $item->kode_laporan }}</span>
                                </div>
                                <div class="col-md-6">
                                    <span class="text-muted mb-1"
                                        style="width: 100px; display: inline-block;">Tanggal</span>
                                    <span>{{ formattedDate($item->created_at) }}</span>
                                </div>
                                <div class="col-md-6">
                                    <span class="text-muted mb-1"
                                        style="width: 100px; display: inline-block;">Kategori</span>
                                    <span>{{ $item->kategori }}</span>
                                </div>
                                <div class="col-md-6">
                                    <span class="text-muted mb-1"
                                        style="width: 100px; display: inline-block;">Lokasi</span>
                                    <span>{{ $item->alamat }}</span>
                                </div>
                                <div class="col-md-6">
                                    <span class="text-muted mb-1"
                                        style="width: 100px; display: inline-block;">Status</span>
                                    {!! customStatus($item->status) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-body">
                            <div class="card-title mb-3">
                                <strong>Riwayat Perkembangan</strong>
                            </div>
                            <ul>
                                @foreach ($lastest as $last)
                                    @if ($last->laporans_id == $item->id)
                                        <li class="mb-1">
                                            {{ formattedDate($last->created_at) }} - {{ $last->activity }}
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
