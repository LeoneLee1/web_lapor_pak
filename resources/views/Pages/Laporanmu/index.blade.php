@extends('Components.base')

@section('content')
    <div class="container mt-4">
        <ul class="nav nav-tabs justify-content-center custom-nav-tabs" role="tablist">
            <li class="nav-item me-1" role="presentation">
                <a class="nav-link active" id="simple-tab-terkirim" data-bs-toggle="tab" href="#simple-tabpanel-terkirim"
                    role="tab" aria-controls="simple-tabpanel-terkirim" aria-selected="true">Terkirim</a>
            </li>
            <li class="nav-item me-1" role="presentation">
                <a class="nav-link" id="simple-tab-diproses" data-bs-toggle="tab" href="#simple-tabpanel-diproses"
                    role="tab" aria-controls="simple-tabpanel-diproses" aria-selected="false">Diproses</a>
            </li>
            <li class="nav-item me-1" role="presentation">
                <a class="nav-link" id="simple-tab-selesai" data-bs-toggle="tab" href="#simple-tabpanel-selesai"
                    role="tab" aria-controls="simple-tabpanel-selesai" aria-selected="false">Selesai</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="simple-tab-ditolak" data-bs-toggle="tab" href="#simple-tabpanel-ditolak"
                    role="tab" aria-controls="simple-tabpanel-ditolak" aria-selected="false">Ditolak</a>
            </li>
        </ul>
        <div class="tab-content pt-4" id="tab-content">
            <div class="tab-pane active" id="simple-tabpanel-terkirim" role="tabpanel"
                aria-labelledby="simple-tab-terkirim">
                @foreach ($terkirim as $item)
                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#detailLaporan{{ $item->id }}"
                        style="text-decoration: none;">
                        @include('Components.card-laporan', ['item' => $item])
                    </a>
                    @include('Components.card-detail-laporan')
                @endforeach
            </div>
            <div class="tab-pane" id="simple-tabpanel-diproses" role="tabpanel" aria-labelledby="simple-tab-diproses">
                @foreach ($diproses as $item)
                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#detailLaporan{{ $item->id }}"
                        style="text-decoration: none;">
                        @include('Components.card-laporan', ['item' => $item])
                    </a>
                    @include('Components.card-detail-laporan')
                @endforeach
            </div>
            <div class="tab-pane" id="simple-tabpanel-selesai" role="tabpanel" aria-labelledby="simple-tab-selesai">
                @foreach ($selesai as $item)
                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#detailLaporan{{ $item->id }}"
                        style="text-decoration: none;">
                        @include('Components.card-laporan', ['item' => $item])
                    </a>
                    @include('Components.card-detail-laporan')
                @endforeach
            </div>
            <div class="tab-pane" id="simple-tabpanel-ditolak" role="tabpanel" aria-labelledby="simple-tab-ditolak">
                @foreach ($ditolak as $item)
                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#detailLaporan{{ $item->id }}"
                        style="text-decoration: none;">
                        @include('Components.card-laporan', ['item' => $item])
                    </a>
                    @include('Components.card-detail-laporan')
                @endforeach
            </div>
        </div>
    </div>
@endsection
