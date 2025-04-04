@extends('Components.base')

@push('after-style')
    <style>
        .category-scroll::-webkit-scrollbar {
            height: 6px;
        }

        .category-scroll::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 10px;
        }

        .object-fit-cover {
            object-fit: cover;
        }
    </style>
@endpush

@section('content')
    <div class="container mb-4">

        <!-- Title Header -->
        <div class="header-title mt-4 mb-4">
            <h6 class="text-left mb-3">Selamat Datang</h6>
            <h3 class="text-left" style="font-weight: bold;">Laporkan masalahmu dan kami segera atasi itu</h3>
        </div>
        <!-- End Title Header -->

        <!-- Categories -->
        <div class="d-flex justify-content-center">
            <div class="category-scroll d-flex overflow-auto gap-3 px-2">
                @foreach ($categories as $item)
                    <div class="text-center flex-shrink-0">
                        <a href="#" style="text-decoration: none;">
                            <div class="rounded-circle bg-white shadow d-flex align-items-center justify-content-center mx-auto"
                                style="width: 60px; height: 60px; overflow: hidden;">
                                <img src="{{ asset('icon/' . $item->icon) }}" class="img-fluid object-fit-cover"
                                    style="width: 25px; height: 25px;" alt="{{ $item->name }}">
                            </div>
                            <small class="d-block mt-2 text-muted">{{ $item->name }}</small>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- End Categories -->

        <!-- Content -->
        <div class="row justify-content-center mt-4 mb-3">
            <div class="col-12">
                <div class="d-flex justify-content-between">
                    <strong>Pengaduan terbaru</strong>
                    <a href="#" style="color: green; text-decoration: none;">Lihat semua</a>
                </div>
            </div>
        </div>
        @foreach ($laporan as $item)
            <div class="card shadow-sm rounded mb-3" style="max-width: 400px;">
                <img src="{{ asset('bukti_laporan/' . $item->bukti) }}" class="card-img-top rounded-top"
                    alt="Gambar Pengaduan">
                <div class="card-body">
                    <span class="badge bg-warning text-dark mb-2">Diproses</span>
                    <div class="d-flex justify-content-between align-items-center mb-1 text-muted"
                        style="font-size: 0.9rem;">
                        <span><i class="bi bi-geo-alt-fill text-success"></i>&nbsp;{!! Str::limit(strip_tags($item->alamat), 20, '...') !!}</span>
                        <span>04 Dec 2024 09:38</span>
                    </div>
                    <h6 class="card-title mb-0 fw-bold text-dark">Orang Buang Sampah Sembarangan</h6>
                </div>
            </div>
        @endforeach
        <!-- End Content -->
    </div>
@endsection
