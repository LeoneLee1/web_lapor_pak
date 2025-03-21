@extends('layout.app')

@section('title', 'Tambah Data Kategori Laporan - Lapor Pak')

@section('header-title')
    <a href="{{ route('data_kategori_laporan') }}" class="btn btn-danger">Kembali</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h6 class="text-primary">Tambah Data</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('data_kategori_laporan.insert') }}" method="POST" enctype="multipart/form-data">
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
                    <label for="icon">Icon</label>
                    <input type="file" name="icon" id="icon"
                        class="form-control @error('icon')
                        is-invalid
                    @enderror">
                </div>
                @error('icon')
                    <div class="mb-3 alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
