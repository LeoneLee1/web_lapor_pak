@extends('Components.base')

@section('content')
    <div class="container">
        <div class="card mb-3">
            <div class="card-body">
                <div class="row justify-content-center mb-2">
                    <div class="col-md-5 col-sm-10">
                        <div class="video-options mb-2">
                            <select name="" id="" class="custom-select form-select">
                                <option value="">Pilih Kamera</option>
                            </select>
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
        <div class="card mb-3">
            <div class="card-body">
                <div class="card-title mb-3">
                    <h5 style="font-weight: bold;">Laporkan segera masalahmu di sini!</h5>
                </div>
                <div class="text-left mb-3">
                    <small class="text-muted">Isi form dibawah ini dengan baik dan benar sehingga kami dapat memvalidasi dan
                        menangani laporan anda secepatnya</small>
                </div>
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Judul Laporan</label>
                        <input type="text" name="judul" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori Laporan</label>
                        <select name="kategori" class="form-select" required>
                            <option value="Lingkungan">Lingkungan</option>
                            <option value="Keamanan">Keamanan</option>
                            <option value="Infrastruktur">Infrastruktur</option>
                            <option value="Kesehatan">Kesehatan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Bukti Laporan</label>
                        <div id="result" class="mb-4"></div>
                        <input type="file" name="bukti" id="bukti_laporan">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ceritakan Laporan Kamu</label>
                        <textarea name="deskripsi" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Lokasi Laporan</label>
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
@endpush
