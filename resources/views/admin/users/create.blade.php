@extends('layout.app')

@section('title', 'Tambah Data Masyarakat - Lapor Pak')

@section('header-title')
    <a href="{{ route('data_masyarakat') }}" class="btn btn-danger">Kembali</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h6 class="text-primary">Tambah Data</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('data_masyarakat.insert') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name"
                        class="form-control @error('name')
                        is-invalid
                    @enderror">
                </div>
                @error('name')
                    <div class="mb-3 alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email"
                        class="form-control @error('email')
                        is-invalid
                    @enderror">
                </div>
                @error('email')
                    <div class="mb-3 alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="text" name="password" id="password"
                        class="form-control @error('password')
                        is-invalid
                    @enderror">
                </div>
                @error('password')
                    <div class="mb-3 alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="mb-3">
                    <label for="role">Role</label>
                    <select name="role" id="role"
                        class="form-select @error('role')
                        is-invalid
                    @enderror">
                        <option value="" selected disabled>Pilih</option>
                        <option value="user">user</option>
                        <option value="admin">admin</option>
                    </select>
                </div>
                @error('role')
                    <div class="mb-3 alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="mb-3">
                    <label for="avatar">Avatar</label>
                    <input type="file" name="avatar" id="avatar" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
