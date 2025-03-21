@extends('layout.app')

@section('title', 'Edit Data Masyarakat - Lapor Pak')

@section('header-title')
    <a href="{{ route('data_masyarakat') }}" class="btn btn-danger">Kembali</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h6 class="text-primary">Edit Data</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('data_masyarakat.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name"
                        class="form-control @error('name')
                        is-invalid
                    @enderror"
                        value="{{ $user->name }}">
                </div>
                <div class="mb-3">
                    @error('name')
                        <div class="mb-3 alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}"
                        disabled>
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="text" name="password" id="password" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="role">Role</label>
                    <select name="role" id="role" class="form-select">
                        <option value="{{ $user->role }}" selected>{{ $user->role }}</option>
                        <option value="user">user</option>
                        <option value="admin">admin</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="avatar">Avatar</label>
                    <input type="file" name="avatar" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
