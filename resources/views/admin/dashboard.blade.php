@extends('layout.app')

@section('title', 'Dashboard - Lapor Pak')

@section('header-title', 'Dasboard')

@section('content')
    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                Total Kategori Laporan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $kategori }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                Total Laporan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $laporan }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                Total Masyarakat</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $masyarakat }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
