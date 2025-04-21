@extends('layout.app')

@section('title', 'Show Data Laporan - Lapor Pak')

@section('header-title')
    <a href="{{ route('data_laporan') }}" class="btn btn-danger">Kembali</a>
@endsection

@section('content')
    <input type="hidden" name="id" id="id" value="{{ $data->id }}">
    <div class="card">
        <div class="card-header">
            <h6 class="text-primary">Detail Laporan</h6>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-left">
                        <td>Kode Laporan</td>
                        <td>{{ $data->kode_laporan }}</td>
                    </tr>
                    <tr class="text-left">
                        <td>Pelapor</td>
                        <td>{{ $data->pelapor }}</td>
                    </tr>
                    <tr class="text-left">
                        <td>Kategori Laporan</td>
                        <td>{{ $data->category->name }}</td>
                    </tr>
                    <tr class="text-left">
                        <td>Judul Laporan</td>
                        <td>{{ $data->judul }}</td>
                    </tr>
                    <tr class="text-left">
                        <td>Deskripsi</td>
                        <td>{{ $data->deskripsi }}</td>
                    </tr>
                    <tr class="text-left">
                        <td>Bukti Laporan</td>
                        <td>
                            <img src="{{ asset('bukti_laporan/' . $data->bukti) }}" alt="icon" class="img-fluid"
                                style="width: 500px;">
                        </td>
                    </tr>
                    <tr class="text-left">
                        <td>Latitude</td>
                        <td>
                            <span id="lat">{{ $data->latitude }}</span>
                        </td>
                    </tr>
                    <tr class="text-left">
                        <td>Longitude</td>
                        <td>
                            <span id="lon">{{ $data->longitude }}</span>
                        </td>
                    </tr>
                    <tr class="text-left">
                        <td>Map View</td>
                        <td>
                            <div id="map" style="height: 400px;"></div>
                        </td>
                    </tr>
                    <tr class="text-left">
                        <td>Alamat Laporan</td>
                        <td>{{ $data->alamat }}</td>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
    <div class="mt-4"></div>
    <div class="card">
        <div class="card-header">
            <h6 class="text-primary">Progress Laporan</h6>
        </div>
        <div class="card-body">
            <a href="{{ route('progress.create', $data->kode_laporan) }}" class="btn btn-primary">Tambah Progress</a>
            <div class="mt-2"></div>
            <table class="table table-bordered" id="table_progress">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Bukti</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Deskripsi</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
@endsection

@push('after-script')
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHJH1qnomZ1FSZOu9HWiDGDN2CKbsWEW8&callback=initMap"></script>
    <script>
        $(document).ready(function() {
            var id = $("input[name=id]").val();
            console.log(id);
            var url = "{{ route('progress.json', ':id') }}";
            url = url.replace(':id', id);

            $('#table_progress').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 10,
                lengthMenu: [
                    [10, 50, 100, -1],
                    [10, 50, 100, "All"]
                ],
                ajax: url,
                columns: [{
                        name: 'DT_RowIndex',
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    },
                    {
                        name: 'bukti',
                        data: 'bukti',
                        orderable: false,
                        searchable: false,
                        className: 'text-center',
                        render: function(data, type, row) {
                            return '<img src="{{ asset('progress') }}/' + data +
                                '" class="img-fluid" alt="progress" style="width= 250px; height: auto;" /> ';
                        }
                    },
                    {
                        data: 'status',
                        name: 'status',
                        className: 'text-center'
                    },
                    {
                        data: 'deskripsi',
                        name: 'deskripsi',
                        className: 'text-center'
                    },
                    {
                        name: 'action',
                        data: 'id',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return '<a href="/progress/edit/' + data +
                                '" class="btn btn-warning">Edit</a>&nbsp;' +
                                '<a href="progress/delete/' + data +
                                '" class="btn btn-danger" data-confirm-delete="true">Delete</a>';
                        },
                        className: 'text-center'
                    }
                ],
            });
        });

        function initMap() {
            var lat = parseFloat(document.getElementById('lat').textContent);
            var lon = parseFloat(document.getElementById('lon').textContent);

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
