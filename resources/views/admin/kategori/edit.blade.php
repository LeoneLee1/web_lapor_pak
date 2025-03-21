@extends('layout.app')

@section('title', 'Edit Data Kategori Laporan - Lapor Pak')

@section('header-title')
    <a href="{{ route('data_kategori_laporan') }}" class="btn btn-danger">Kembali</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h6 class="text-primary">Edit Data</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('data_kategori_laporan.update', $kategori->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name">Nama</label>
                    <input type="text" name="name" id="name"
                        class="form-control @error('name')
                        is-invalid
                    @enderror"
                        value="{{ $kategori->name }}">
                </div>
                @error('name')
                    <div class="mb-3 alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="mb-3">
                    <label for="icon">Icon</label>
                    <input type="file" name="icon" id="icon" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
