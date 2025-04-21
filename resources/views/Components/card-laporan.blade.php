@php
    if ($item->status === 'Delivered') {
        $status = 'Terkirim';
    } elseif ($item->status === 'In Process') {
        $status = 'Diproses';
    } elseif ($item->status === 'Complete') {
        $status = 'Selesai';
    } elseif ($item->status === 'Rejected') {
        $status = 'Ditolak';
    } else {
        $status = 'Terkirim';
    }
@endphp

<div class="card shadow-sm rounded mb-4" style="max-width: 400px;">
    <img src="{{ asset('bukti_laporan/' . $item->bukti) }}" class="card-img-top rounded-top" alt="Gambar Pengaduan">
    <div class="card-body">
        {!! customStatus($item->status) !!}
        <div class="d-flex justify-content-between align-items-center mb-1 text-muted" style="font-size: 0.9rem;">
            <span>
                <i class="bi bi-geo-alt-fill text-success"></i>&nbsp;{!! Str::limit(strip_tags($item->alamat), 20, '...') !!}
            </span>
            <span>{{ formattedDate($item->created_at) }}</span>
        </div>
        <h6 class="card-title mb-0 fw-bold text-dark">{{ $item->judul }}</h6>
    </div>
</div>
