@extends('layout.app')

@section('title', 'Data Kategori Laporan - Lapor Pak')

@section('header-title')
    <a href="{{ route('data_kategori_laporan.create') }}" class="btn btn-primary">Tambah Data</a>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h6 class="text-primary">Daftar Data Kategori Laporan</h6>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="table_kategori">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Icon</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
@endsection

@push('after-script')
    <script>
        $(document).ready(function() {
            $('#table_kategori').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 10,
                lengthMenu: [
                    [10, 50, 100, -1],
                    [10, 50, 100, "All"]
                ],
                ajax: '{{ route('data_kategori_laporan.json') }}',
                columns: [{
                        name: 'DT_RowIndex',
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    },
                    {
                        data: 'name',
                        name: 'name',
                        className: 'text-center'
                    },
                    {
                        name: 'icon',
                        data: 'icon',
                        orderable: false,
                        searchable: false,
                        className: 'text-center',
                        render: function(data, type, row) {
                            return '<img src="icon/' + data +
                                '" class="img-fluid" alt="avatar" style="width= 250px; height: auto;" /> ';
                        }
                    },
                    {
                        name: 'action',
                        data: 'id',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return '<a href="data_kategori_laporan/edit/' + data +
                                '" class="btn btn-warning">Edit</a>&nbsp;' +
                                '<a href="data_kategori_laporan/show/' +
                                data + '" class="btn btn-info">Show</a>&nbsp;' +
                                '<a href="data_kategori_laporan/delete/' + data +
                                '" class="btn btn-danger" data-confirm-delete="true">Delete</a>';
                        },
                        className: 'text-center'
                    }
                ],
            });
        });
    </script>
@endpush
