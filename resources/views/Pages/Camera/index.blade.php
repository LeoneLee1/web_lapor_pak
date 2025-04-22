@extends('Components.base')

@section('content')
    <div class="container">
        <div class="card mb-3">
            <div class="card-body">
                <div class="row justify-content-center mb-2">
                    <div class="col-md-5 col-sm-10">
                        <div class="d-grid gap-2">
                            <button class="btn btn-secondary mb-2" onclick="toggleCamera()"><i
                                    class="fa fa-sync"></i>&nbsp;Ganti
                                Kamera</button>
                        </div>
                        <video autoplay="true" id="video-webcam" style="width: 100%;"></video>
                        <div class="d-grid gap-2 text-center">
                            <button class="btn btn-success mt-3" onclick="takeSnapshot()"><i
                                    class="fa fa-camera"></i>&nbsp;Ambil
                                Gambar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-title mb-3">
                    <h5 style="font-weight: bold;">Laporkan segera masalahmu di sini!</h5>
                </div>
                <div class="text-left mb-3">
                    <small class="text-muted">Isi form dibawah ini dengan baik dan benar sehingga kami dapat memvalidasi dan
                        menangani laporan anda secepatnya</small>
                </div>
                <form action="{{ route('camera.laporkan') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Judul Laporan</label>
                        <input type="text" name="judul" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori Laporan</label>
                        <select name="kategori" class="form-select" required>
                            @foreach ($categories as $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Bukti Laporan</label>
                        <div id="result" class="mb-4"></div>
                        <input type="file" name="bukti" id="bukti_laporan" hidden>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ceritakan Laporan Kamu</label>
                        <textarea name="deskripsi" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Lokasi Laporan</label>
                        <div id="map" style="height: 300px;"></div>
                        <input type="text" name="latitude" id="latitude" hidden>
                        <input type="text" name="longitude" id="longitude" hidden>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat Lengkap</label>
                        <textarea name="alamat" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success">Laporkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('after-script')
    <script type="text/javascript" src="{{ asset('js/video-webcam.js') }}"></script>
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
                zoom: 15
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
