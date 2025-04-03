@extends('welcome')

@push('after-style')
    <style>
        .avatar {
            background-image: url('{{ asset('avatar/' . Auth::user()->avatar) }}');
            width: 100px;
            height: 100px;
            background-size: cover;
            background-position: top center;
            border-radius: 50%;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        {{-- Avatar and Name --}}
        <div class="row justify-content-center">
            <div class="avatar mt-4"></div>
        </div>
        <h5 class="mt-2 text-center" style="font-weight: bold;">{{ Auth::user()->name }}</h5>
        {{-- End Avatar and Name --}}

        {{-- Report active --}}
        <div class="report mt-4 row justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <strong>2</strong>
                        </div>
                        <span>Laporan Aktif</span>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <strong>3</strong>
                        </div>
                        <span>Laporan Selesai</span>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Report activee --}}

        <div class="mt-4"></div>

        {{-- Menu --}}
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <i class="fa fa-user me-3"></i>
                    <span>Pengaturan Akun</span>
                </div>
                <i class="fa fa-chevron-right"></i>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <i class="fa fa-lock me-3"></i>
                    <span>Kata Sandi</span>
                </div>
                <i class="fa fa-chevron-right"></i>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <i class="fa fa-info-circle me-3"></i>
                    <span>Bantuan dan dukungan</span>
                </div>
                <i class="fa fa-chevron-right"></i>
            </li>
        </ul>
        <div class="mt-3">
            <div class="d-grid gap-2">
                <a href="/logout" class="btn btn-danger">Keluar</a>
            </div>
        </div>
        {{-- End Menu --}}
    </div>
@endsection
