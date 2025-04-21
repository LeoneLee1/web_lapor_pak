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

        .nav-link.active .icon {
            filter: hue-rotate(90deg);
            /* This will apply a greenish filter */
        }

        .nav-link.active .icon img {
            filter: sepia(100%) hue-rotate(90deg) saturate(100%);
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
        <div class="d-flex justify-content-center" id="category-container">
            <div class="category-scroll d-flex overflow-auto gap-3 px-2" id="category-tabs" role="tablist">
                @foreach ($categories as $item)
                    <div class="text-center flex-shrink-0" role="presentation">
                        <a class="nav-link" id="category-{{ $item->id }}-tab" data-bs-toggle="tab"
                            href="#category-{{ $item->id }}" role="tab" aria-controls="category-{{ $item->id }}"
                            aria-selected="false" onclick="hideShowAll()">
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
                    <a href="/" style="color: green; text-decoration: none;">Lihat
                        semua</a>
                </div>
            </div>
        </div>
        <div id="semuaLaporan">
            @foreach ($laporan as $item)
                @include('Components.card-laporan', ['item' => $item])
            @endforeach
        </div>
        <div class="tab-content" id="category-tabContent">
            @foreach ($categories as $item)
                <div class="tab-pane fade" id="category-{{ $item->id }}" role="tabpanel"
                    aria-labelledby="category-{{ $item->id }}-tab">
                    @if ($item->name === 'Lingkungan')
                        @foreach ($lingkungan as $item)
                            @include('Components.card-laporan', ['item' => $item])
                        @endforeach
                    @elseif($item->name === 'Keamanan')
                        @foreach ($keamanan as $item)
                            @include('Components.card-laporan', ['item' => $item])
                        @endforeach
                    @elseif($item->name === 'Infrastruktur')
                        @foreach ($infrastruktur as $item)
                            @include('Components.card-laporan', ['item' => $item])
                        @endforeach
                    @elseif($item->name === 'Kesehatan')
                        @foreach ($kesehatan as $item)
                            @include('Components.card-laporan', ['item' => $item])
                        @endforeach
                    @endif
                </div>
            @endforeach
        </div>
        <!-- End Content -->
    </div>
@endsection

@push('after-script')
    <script>
        function hideShowAll() {
            var all = document.getElementById('semuaLaporan');
            all.innerHTML = '';
        }
    </script>
@endpush
