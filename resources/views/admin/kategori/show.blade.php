@extends('layout.app')

@section('title', 'Show Data Kategori Laporan - Lapor Pak')

@section('header-title')
    <a href="{{ route('data_kategori_laporan') }}" class="btn btn-danger">Kembali</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h6 class="text-primary">Detail Kategori Laporan</h6>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-left">
                        <td>Nama</td>
                        <td>{{ $data->name }}</td>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-left">
                        <td>Icon</td>
                        <td>
                            <img src="{{ asset('icon/' . $data->icon) }}" alt="icon" class="img-fluid"
                                style="width: 500px;">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
