@extends('layout.app')

@section('title', 'Tambah Data Laporan - Lapor Pak')

@section('header-title')
    <a href="{{ route('data_laporan') }}" class="btn btn-danger">Kembali</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h6 class="text-primary">Tambah Data</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('data_laporan.insert') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="kategori">Kategori Laporan</label>
                    <select name="kategori" id="kategori"
                        class="form-control @error('name')
                        is-invalid
                    @enderror">
                        <option value="" selected disabled>Pilih</option>
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
                    @enderror">
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
                    @enderror"></textarea>
                </div>
                @error('deskripsi')
                    <div class="mb-3 alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="mb-3">
                    <label for="bukti">Bukti Laporan</label>
                    <input type="file" name="bukti" id="bukti"
                        class="form-control @error('bukti')
                        is-invalid
                    @enderror">
                </div>
                @error('bukti')
                    <div class="mb-3 alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
                <div class="mb-3">
                    <label for="latitude">Latitude</label>
                    <input type="text" name="latitude" id="latitude" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="longitude">Latitude</label>
                    <input type="text" name="longitude" id="longitude" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="map">Map</label>
                    <div id="map" style="height: 400px;"></div>
                </div>
                <div class="mb-3">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection

@push('after-script')
    <script async defer
        src="{{ url('https://maps.googleapis.com/maps/api/js?key=AIzaSyDHJH1qnomZ1FSZOu9HWiDGDN2CKbsWEW8&callback=initMap') }}">
    </script>
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {
                    lat: -34.397,
                    lng: 150.644
                },
                zoom: 8
            });

            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    var userLocation = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    var marker = new google.maps.Marker({
                        position: userLocation,
                        map: map,
                        title: 'Lokasi Anda'
                    });

                    map.setCenter(userLocation);

                    var coordinatesDiv = document.getElementById('coordinates');
                    document.getElementById('latitude').value = userLocation.lat;
                    document.getElementById('longitude').value = userLocation.lng;
                    coordinatesDiv.innerHTML = 'Koordinat Anda: ' + userLocation.lat + ', ' + userLocation.lng;
                }, function() {
                    alert('Tidak dapat mengakses lokasi pengguna.');
                });
            } else {
                alert('Geolocation tidak didukung oleh browser ini.');
            }
        }
    </script>
@endpush
