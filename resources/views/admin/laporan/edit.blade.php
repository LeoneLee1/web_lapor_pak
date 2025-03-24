@extends('layout.app')

@section('title', 'Edit Data Laporan - Lapor Pak')

@section('header-title')
    <a href="{{ route('data_laporan') }}" class="btn btn-danger">Kembali</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h6 class="text-primary">Edit Data</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('data_laporan.update', $laporan->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="kategori">Kategori Laporan</label>
                    <select name="kategori" id="kategori"
                        class="form-control @error('name')
                        is-invalid
                    @enderror">
                        <option value="{{ $laporan->category->name }}" selected>{{ $laporan->category->name }}</option>
                        @foreach ($kategori as $item)
                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                @error('kategori')
                    <div class="mb-3 alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="mb-3">
                    <label for="judul">Judul Laporan</label>
                    <input type="text" name="judul" id="judul"
                        class="form-control @error('judul')
                        is-invalid
                    @enderror"
                        value="{{ $laporan->judul }}">
                </div>
                @error('judul')
                    <div class="mb-3 alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="mb-3">
                    <label for="deskripsi">Deskripsi Laporan</label>
                    <textarea name="deskripsi" id="deskripsi" cols="30" rows="10"
                        class="form-control @error('deskripsi')
                        is-invalid
                    @enderror">{{ $laporan->deskripsi }}</textarea>
                </div>
                @error('deskripsi')
                    <div class="mb-3 alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="mb-3">
                    <label for="bukti">Bukti Laporan</label>
                    <input type="file" name="bukti" id="bukti" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="latitude">Latitude</label>
                    <input type="text" name="latitude" id="latitude" class="form-control"
                        value="{{ $laporan->latitude }}">
                </div>
                <div class="mb-3">
                    <label for="longitude">Latitude</label>
                    <input type="text" name="longitude" id="longitude" class="form-control"
                        value="{{ $laporan->longitude }}">
                </div>
                <div class="mb-3">
                    <label for="map">Map</label>
                    <div id="map" style="height: 400px;"></div>
                </div>
                <div class="mb-3">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control">{{ $laporan->alamat }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

@push('after-script')
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHJH1qnomZ1FSZOu9HWiDGDN2CKbsWEW8&callback=initMap"></script>
    <script>
        function initMap() {
            var lat = parseFloat(document.getElementById('latitude').value);
            var lon = parseFloat(document.getElementById('longitude').value);

            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: lat,
                    lng: lon
                },
                zoom: 15
            });

            var marker = new google.maps.Marker({
                position: {
                    lat: lat,
                    lng: lon
                },
                map: map,
                title: 'Lokasi Laporan'
            });

            map.setCenter({
                lat: lat,
                lng: lon
            });
        }
    </script>
@endpush
