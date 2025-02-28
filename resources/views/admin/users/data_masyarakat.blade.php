@extends('layout.app')

@section('title', 'Data Masyarakat - Lapor Pak')

@section('header-title', 'Data Masyarakat')

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('data_masyarakat.create') }}" class="btn btn-primary">Tambah Data</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="table_masyarakat">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Avatar</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection


@push('after-script')
    <script>
        $(document).ready(function() {
            $('#table_masyarakat').DataTable({
                processing: true,
                serverSide: true,
                pageLength: 10,
                lengthMenu: [
                    [10, 50, 100, -1],
                    [10, 50, 100, "All"]
                ],
                ajax: '{{ route('data_masyarakat.json') }}',
                columns: [{
                        name: 'DT_RowIndex',
                        data: 'DT_RowIndex',
                        orderable: false,
                        searchable: false,
                        className: 'text-center'
                    },
                    {
                        data: 'email',
                        name: 'email',
                        className: 'text-center'
                    },
                    {
                        data: 'name',
                        name: 'name',
                        className: 'text-center'
                    },
                    {
                        name: 'avatar',
                        data: 'avatar',
                        orderable: false,
                        searchable: false,
                        className: 'text-center',
                        render: function(data, type, row) {
                            return '<img src="avatar/' + data +
                                '" class="img-fluid" alt="avatar" /> ';
                        }
                    },
                    {
                        name: 'action',
                        data: 'id',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row) {
                            return '<a href="data_masyarakat/edit/' + data +
                                '" class="btn btn-primary">Edit</a>&nbsp;' +
                                '<a href="data_masyarakat/show/' +
                                data + '" class="btn btn-info">Show</a>&nbsp;' +
                                '<a href="data_masyarakat/delete/' + data +
                                '" class="btn btn-danger" data-confirm-delete="true">Delete</a>';
                        },
                        className: 'text-center'
                    }
                ],
            });
        });
    </script>
@endpush
