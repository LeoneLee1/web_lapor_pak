@extends('Components.base')

@push('after-style')
    <style>
        .avatar {
            background-image: url('{{ asset('avatar/' . Auth::user()->avatar) }}');
            width: 100px;
            height: 100px;
            background-size: cover;
            background-position: center;
            border-radius: 50%;
            cursor: pointer;
            transition: 0.3s;
        }

        .avatar:hover {
            opacity: 0.8;
        }

        /* Modal style */
        .modal-avatar {
            display: none;
            position: fixed;
            z-index: 1050;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.85);
            padding-top: 60px;
            overflow: auto;
        }

        .modal-avatar-content {
            display: block;
            margin: auto;
            max-width: 90%;
            max-height: 80%;
            border-radius: 12px;
        }

        .close-avatar {
            position: absolute;
            top: 50px;
            right: 30px;
            color: #fff;
            font-size: 35px;
            font-weight: bold;
            cursor: pointer;
        }

        .close-avatar:hover {
            color: #ccc;
        }
    </style>
@endpush

@section('content')
    <div class="container">
        {{-- Avatar and Name --}}
        <div class="row justify-content-center">
            <div class="avatar mt-4" onclick="showAvatarModal()"></div>
        </div>
        <h5 class="mt-2 text-center" style="font-weight: bold;">{{ Auth::user()->name }}</h5>

        <!-- Modal (popup fullscreen) -->
        <div id="avatarModal" class="modal-avatar" onclick="hideAvatarModal()">
            <span class="close-avatar" onclick="hideAvatarModal()">&times;</span>
            <img id="avatarModalImage" class="modal-avatar-content" src="{{ asset('avatar/' . Auth::user()->avatar) }}">
        </div>
        {{-- End Avatar and Name --}}

        {{-- Report active --}}
        <div class="report mt-4 row justify-content-center">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <strong>{{ $aktif }}</strong>
                        </div>
                        <span>Laporan Aktif</span>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <strong>{{ $selesai }}</strong>
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
            <a href="{{ route('profile.settings', Auth::user()->id) }}" style="text-decoration: none;">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <i class="fa fa-cog me-3"></i>
                        <span>Pengaturan Akun</span>
                    </div>
                    <i class="fa fa-chevron-right"></i>
                </li>
            </a>

            {{-- <a href="{{ route('profile.kata_sandi', Auth::user()->id) }}" style="text-decoration: none;">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <i class="fa fa-lock me-3"></i>
                        <span>Kata Sandi</span>
                    </div>
                    <i class="fa fa-chevron-right"></i>
                </li>
            </a> --}}

            <a href="{{ route('profile.bantuanDukungan') }}" style="text-decoration: none;">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <i class="fa fa-info-circle me-3"></i>
                        <span>Bantuan dan dukungan</span>
                    </div>
                    <i class="fa fa-chevron-right"></i>
                </li>
            </a>
        </ul>
        <div class="mt-3">
            <div class="d-grid gap-2">
                <a href="/logout" onclick="return logout()" class="btn btn-danger">Keluar</a>
            </div>
        </div>
        {{-- End Menu --}}
    </div>
@endsection

@push('after-script')
    <script>
        function showAvatarModal() {
            document.getElementById("avatarModal").style.display = "block";
        }

        function hideAvatarModal() {
            document.getElementById("avatarModal").style.display = "none";
        }
    </script>
    <script>
        function logout() {
            if (confirm('Keluar dari Akun?')) {
                return true;
            } else {
                return false;
            }
        }
    </script>
@endpush
