@extends('Components.base_without_navigator')

@section('header')
    <a href="{{ route('profile') }}" class="back-arrow"
        style="font-size: 20px; margin-right: 20px; cursor: pointer; text-decoration: none; color: #333;">
        <i class="fa fa-chevron-left"></i>
    </a>
    <div class="menu-title" style="font-size: 18px; font-weight: bold; color: #333;">Bantuan dan Dukungan</div>
@endsection

@section('content')
    <!-- FAQ Section -->
    <div class="container py-4">
        <h1 class="mb-4 text-center">❓ Pertanyaan yang Sering Diajukan (FAQ)</h1>
        <div class="accordion" id="faqAccordion">

            <!-- FAQ 1 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="faqHeadingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faqCollapseOne" aria-expanded="true" aria-controls="faqCollapseOne">
                        Bagaimana cara membuat laporan?
                    </button>
                </h2>
                <div id="faqCollapseOne" class="accordion-collapse collapse show" aria-labelledby="faqHeadingOne"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Kamu bisa membuat laporan dengan klik tombol <strong>“Kamera”</strong> di halaman utama, foto lalu
                        isi data dan deskripsi kejadian dengan lengkap.
                    </div>
                </div>
            </div>

            <!-- FAQ 2 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="faqHeadingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faqCollapseTwo" aria-expanded="false" aria-controls="faqCollapseTwo">
                        Apa saja jenis laporan yang bisa disampaikan?
                    </button>
                </h2>
                <div id="faqCollapseTwo" class="accordion-collapse collapse" aria-labelledby="faqHeadingTwo"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Laporan bisa berupa pengaduan kebersihan lingkungan, infrastruktur, kesehatan, tindakan kriminal,
                        pelanggaran etika, kekerasan, pungli, korupsi, atau laporan kondisi darurat lainnya yang perlu
                        ditindaklanjuti.
                    </div>
                </div>
            </div>

            <!-- FAQ 3 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="faqHeadingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faqCollapseThree" aria-expanded="false" aria-controls="faqCollapseThree">
                        Berapa lama laporan akan ditindaklanjuti?
                    </button>
                </h2>
                <div id="faqCollapseThree" class="accordion-collapse collapse" aria-labelledby="faqHeadingThree"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Waktu respon bervariasi tergantung kompleksitas laporan dan instansi yang menanganinya. Umumnya,
                        laporan akan diverifikasi dalam 1–3 hari kerja.
                    </div>
                </div>
            </div>

            <!-- FAQ 4 -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="faqHeadingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#faqCollapseFour" aria-expanded="false" aria-controls="faqCollapseFour">
                        Apakah identitas saya aman?
                    </button>
                </h2>
                <div id="faqCollapseFour" class="accordion-collapse collapse" aria-labelledby="faqHeadingFour"
                    data-bs-parent="#faqAccordion">
                    <div class="accordion-body">
                        Ya. Identitas kamu dijaga kerahasiaannya dan hanya dapat diakses oleh admin yang berwenang. Sistem
                        kami dilengkapi dengan enkripsi dan perlindungan data.
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Kontak Dukungan -->
    <div class="container py-5">
        <h1 class="mb-4 text-center">📞 Kontak Dukungan</h1>
        <p class="text-center mb-5">Jika kamu mengalami kendala atau butuh bantuan, silakan hubungi tim kami melalui salah
            satu kontak berikut:</p>

        <div class="row g-4 mb-5">
            <!-- WhatsApp -->
            <div class="col-md-4">
                <div class="card shadow-sm h-100 text-center">
                    <div class="card-body">
                        <h5 class="card-title">WhatsApp Admin</h5>
                        <p class="card-text">0812-3456-7890</p>
                        <a href="https://wa.me/6281234567890" target="_blank" class="btn btn-success btn-sm">Chat
                            Sekarang</a>
                    </div>
                </div>
            </div>

            <!-- Email -->
            <div class="col-md-4">
                <div class="card shadow-sm h-100 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Email Support</h5>
                        <p class="card-text">support@laporpak.id</p>
                        <a href="mailto:support@laporpak.id" class="btn btn-primary btn-sm">Kirim Email</a>
                    </div>
                </div>
            </div>

            <!-- Live Chat -->
            <div class="col-md-4">
                <div class="card shadow-sm h-100 text-center">
                    <div class="card-body">
                        <h5 class="card-title">Live Chat</h5>
                        <p class="card-text">Tersedia setiap hari pukul 08.00 – 20.00</p>
                        <a href="#" class="btn btn-info btn-sm disabled">Fitur Segera Tersedia</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Kebijakan dan Keamanan -->
    <div class="container pb-5">
        <h2 class="mb-4 text-center">🔐 Kebijakan & Keamanan</h2>

        <div class="accordion" id="policyAccordion">

            <!-- Kebijakan Privasi -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="privacyPolicyHeading">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#privacyPolicyCollapse" aria-expanded="true"
                        aria-controls="privacyPolicyCollapse">
                        Kebijakan Privasi Data Pelapor
                    </button>
                </h2>
                <div id="privacyPolicyCollapse" class="accordion-collapse collapse show"
                    aria-labelledby="privacyPolicyHeading" data-bs-parent="#policyAccordion">
                    <div class="accordion-body">
                        Kami berkomitmen menjaga kerahasiaan data pelapor. Semua informasi pribadi yang dikumpulkan hanya
                        digunakan untuk proses verifikasi dan tindak lanjut laporan.
                    </div>
                </div>
            </div>

            <!-- Perlindungan Identitas -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="identityProtectionHeading">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#identityProtectionCollapse" aria-expanded="false"
                        aria-controls="identityProtectionCollapse">
                        Perlindungan Identitas Pelapor
                    </button>
                </h2>
                <div id="identityProtectionCollapse" class="accordion-collapse collapse"
                    aria-labelledby="identityProtectionHeading" data-bs-parent="#policyAccordion">
                    <div class="accordion-body">
                        Identitas pelapor tidak akan dibagikan tanpa izin. Sistem kami telah dilengkapi dengan enkripsi data
                        dan keamanan server berlapis.
                    </div>
                </div>
            </div>

            <!-- Pelaporan Anonim -->
            {{-- <div class="accordion-item">
                <h2 class="accordion-header" id="anonimPolicyHeading">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#anonimPolicyCollapse" aria-expanded="false"
                        aria-controls="anonimPolicyCollapse">
                        Pelaporan Secara Anonim
                    </button>
                </h2>
                <div id="anonimPolicyCollapse" class="accordion-collapse collapse" aria-labelledby="anonimPolicyHeading"
                    data-bs-parent="#policyAccordion">
                    <div class="accordion-body">
                        Pelapor dapat memilih mode anonim saat mengirimkan laporan. Namun perlu diketahui, laporan anonim
                        bisa saja memerlukan waktu tindak lanjut lebih lama karena terbatasnya informasi.
                    </div>
                </div>
            </div> --}}

            <!-- Laporan Palsu -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="hoaxPolicyHeading">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#hoaxPolicyCollapse" aria-expanded="false" aria-controls="hoaxPolicyCollapse">
                        Tindakan Terhadap Laporan Palsu
                    </button>
                </h2>
                <div id="hoaxPolicyCollapse" class="accordion-collapse collapse" aria-labelledby="hoaxPolicyHeading"
                    data-bs-parent="#policyAccordion">
                    <div class="accordion-body">
                        Kami tidak mentolerir laporan palsu atau yang bersifat fitnah. Pelapor dapat dikenai sanksi
                        administratif hingga pidana jika terbukti menyalahgunakan platform ini.
                    </div>
                </div>
            </div>

        </div>
    </div>

    <footer class="bg-light text-center text-muted py-3 mt-5 border-top">
        <div class="container">
            {{-- <small>&copy; {{ date('Y') }} Daniel Lee. All rights reserved.</small> --}}
            <small>&copy; 2025 Daniel Lee. All rights reserved.</small>
        </div>
    </footer>
@endsection
