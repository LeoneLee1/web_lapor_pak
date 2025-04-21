@extends('layout.app')

@section('title', 'Tambah Data Laporan - Lapor Pak')

@section('header-title')
    <a href="javascript:void(0);" onclick="window.history.go(-1); return false;" class="btn btn-danger">Kembali</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h6 class="text-primary">Edit Data Progress Laporan {{ $kode->kode_laporan }}</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('progress.update', $progress->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id" value="{{ $kode->id }}">
                <div class="mb-3">
                    <label for="bukti">Bukti</label>
                    <input type="file" name="bukti" id="bukti" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="status">Status</label>
                    <select name="status" id="status"
                        class="form-select @error('status')
                        is-invalid
                    @enderror">
                        <option value="{{ $progress->status }}">{{ $progress->status }}</option>
                        <option value="Delivered">Delivered</option>
                        <option value="In Process">In Process</option>
                        <option value="Complete">Complete</option>
                        <option value="Rejected">Rejected</option>
                    </select>
                </div>
                @error('status')
                    <div class="mb-3 alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="mb-3">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control">{{ $progress->deskripsi }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
