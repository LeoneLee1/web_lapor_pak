@extends('Components.base_without_navigator')

@section('header')
    <a href="{{ route('profile') }}" class="back-arrow"
        style="font-size: 20px; margin-right: 20px; cursor: pointer; text-decoration: none; color: #333;">
        <i class="fa fa-chevron-left"></i>
    </a>
    <div class="menu-title" style="font-size: 18px; font-weight: bold; color: #333;">Pengaturan Akun</div>
@endsection

@section('content')
    <div class="container">
        <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" value="{{ $user->name }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" name="email" class="form-control" value="{{ $user->email }}" disabled>
            </div>
            <div class="mb-3">
                <label class="form-label">Avatar</label>
                <input type="file" name="avatar" class="form-control" accept="image/*" onchange="loadFile(event)">
                <div class="mt-2">
                    <img class="img-fluid" style="width: 100%;" id="output" />
                </div>
            </div>
            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection

@push('after-script')
    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
@endpush
