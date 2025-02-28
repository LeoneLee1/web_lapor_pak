@extends('layout.app')

@section('title', 'Show Data Masyarakat - Lapor Pak')

@section('header-title')
    <a href="{{ route('data_masyarakat') }}" class="btn btn-danger">Kembali</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="text-primary">Detail Masyarakat</h5>
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
                        <td>Email</td>
                        <td>{{ $data->email }}</td>
                    </tr>
                    <tr class="text-left">
                        <td>Avatar</td>
                        <td>
                            <img src="{{ asset('avatar/' . $data->avatar) }}" alt="avatar" class="img-fluid"
                                style="width: 500px;">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
