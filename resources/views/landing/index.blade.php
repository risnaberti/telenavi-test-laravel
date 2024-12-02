<x-layouts.guest title="Landing" activeMenu="landing">
    <div class="main-container">
        <img src="{{ asset('assets/img/front-pages/hero-bg.png') }}" class="main-bg">

        <x-guest-navbar />

        <!-- Content wrapper -->
        <div class="content-wrapper">

            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">
                {{-- hero --}}
                {{-- <section class="mb-5 bg-white rounded-1 hero section" style="min-height: 30vh">
                    <div class="container">
                        <div class="row gy-4">
                            <div class="col-lg-6 d-flex flex-column justify-content-center aos-init aos-animate"
                                data-aos="zoom-out">
                                <h1 style="line-height: 3.8rem;">Persiapkan Masa Depan Anda! Ikuti Tryout Sekarang!</h1>
                                <p>Daftar dan ikuti tryout untuk mempersiapkan diri masuk ke sekolah menengah pertama
                                    terbaik. Tes dengan standar kompetensi terkini dan evaluasi hasil secara cepat.</p>

                            </div>
                            <div class="text-center col-lg-6 hero-img aos-init aos-animate" data-aos="zoom-out"
                                data-aos-delay="200" style="margin: 100px 0;">
                                <img src="{{ asset('assets/img/logo/logosmpmugaygy.png') }}" class="img animat"
                                    alt="" height="380px">
                            </div>
                        </div>
                    </div>
                </section> --}}

                {{-- end hero --}}

                <br>

                <div>
                    <h4 class="mt-1 mb-5 text-center section-title fw-bold">FORM PENDAFTARAN</h4>
                    <p class="text-center fw-medium">Daftar dan ikuti tryout untuk mempersiapkan diri masuk ke
                        sekolah
                        menengah pertama terbaik. <br> Tes dengan standar kompetensi terkini dan evaluasi hasil secara
                        cepat.
                    </p>

                    <div class="container mt-5 aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
                        <div class="row gy-4">
                            <div class="col-lg-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="p-3">
                                            <div class="mb-5 d-flex align-items-center aos-init aos-animate"
                                                data-aos="fade-up" data-aos-delay="200">
                                                <i class="flex-shrink-0 bx bxs-graduation me-3"
                                                    style="font-size: 36px !important;"></i>
                                                <div>
                                                    <h5 class="mb-1 fw-semibold">Pendaftaran</h5>
                                                    <a href="#" class="fw-normal">Alur mendaftar</a>
                                                </div>
                                            </div>

                                            <div class="mb-5 d-flex align-items-center aos-init aos-animate"
                                                data-aos="fade-up" data-aos-delay="200">
                                                <i class="flex-shrink-0 bx bx-receipt me-3"
                                                    style="font-size: 36px !important;"></i>
                                                <div>
                                                    <h5 class="mb-1 fw-semibold">Pembayaran</h5>
                                                    <a href="#" class="fw-normal">Tata Cara Membayar</a>
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-center aos-init aos-animate"
                                                data-aos="fade-up" data-aos-delay="200">
                                                <i class="flex-shrink-0 bx bxl-whatsapp me-3"
                                                    style="font-size: 36px !important;"></i>
                                                <div>
                                                    <h5 class="mb-1 fw-semibold">Punya Pertanyaan?</h5>
                                                    <a href="#" class="fw-normal">Hubungi Admin</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body">
                                        <x-error-list />

                                        <form class="aos-init aos-animate" data-aos="fade-up" data-aos-delay="200"
                                            method="POST" action="{{ route('tryout.daftar') }}">
                                            @csrf
                                            <div class="row gy-4">
                                                <div class="col-md-12">
                                                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                                    <input type="text" name="nama_lengkap"
                                                        class="form-control {{ $errors->has('nama_lengkap') ? 'is-invalid' : '' }}"
                                                        id="nama_lengkap"
                                                        value="{{ old('nama_lengkap', $pendaftaranTryout?->nama_lengkap) }}"
                                                        placeholder="Masukkan Nama Lengkap" />
                                                    @error('nama_lengkap')
                                                        <small class="invalid-feedback">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                                    <x-input.select2 name="jenis_kelamin" id="jenis_kelamin"
                                                        class="form-control {{ $errors->has('jenis_kelamin') ? 'is-invalid' : '' }}"
                                                        placeholder="Pilih Jenis Kelamin" :options="[
                                                            'L' => 'L',
                                                            'P' => 'P',
                                                        ]"
                                                        selected="{{ old('jenis_kelamin', $pendaftaranTryout?->jenis_kelamin) }}" />
                                                    @error('jenis_kelamin')
                                                        <small class="invalid-feedback">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="nisn" class="form-label">Nisn</label>
                                                    <input type="text" name="nisn"
                                                        class="form-control {{ $errors->has('nisn') ? 'is-invalid' : '' }}"
                                                        id="nisn"
                                                        value="{{ old('nisn', $pendaftaranTryout?->nisn) }}"
                                                        placeholder="Masukkan Nisn" />
                                                    @error('nisn')
                                                        <small class="invalid-feedback">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="tanggal_lahir" class="form-label">
                                                        Tanggal lahir
                                                    </label>
                                                    <x-input.daterangepicker name1="tanggal_lahir"
                                                        value1="{{ old('tanggal_lahir', $pendaftaranTryout?->tanggal_lahir) }}"
                                                        placeholder="Pilih Tanggal" opens="right"
                                                        singleDatePicker="true" :ranges="false" />
                                                    @error('tanggal_lahir')
                                                        <small class="invalid-feedback">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12">
                                                    <label for="nama_asal_sekolah" class="form-label">Nama Asal
                                                        Sekolah</label>
                                                    <input type="text" name="nama_asal_sekolah"
                                                        class="form-control {{ $errors->has('nama_asal_sekolah') ? 'is-invalid' : '' }}"
                                                        id="nama_asal_sekolah"
                                                        value="{{ old('nama_asal_sekolah', $pendaftaranTryout?->nama_asal_sekolah) }}"
                                                        placeholder="Masukkan Nama Asal Sekolah" />
                                                    @error('nama_asal_sekolah')
                                                        <small class="invalid-feedback">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="nama_ortu" class="form-label">Nama Ortu</label>
                                                    <input type="text" name="nama_ortu"
                                                        class="form-control {{ $errors->has('nama_ortu') ? 'is-invalid' : '' }}"
                                                        id="nama_ortu"
                                                        value="{{ old('nama_ortu', $pendaftaranTryout?->nama_ortu) }}"
                                                        placeholder="Masukkan Nama Ortu" />
                                                    @error('nama_ortu')
                                                        <small class="invalid-feedback">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="no_wa_ortu" class="form-label">No Wa Ortu</label>
                                                    <input type="text" name="no_wa_ortu"
                                                        class="form-control {{ $errors->has('no_wa_ortu') ? 'is-invalid' : '' }}"
                                                        id="no_wa_ortu"
                                                        value="{{ old('no_wa_ortu', $pendaftaranTryout?->no_wa_ortu) }}"
                                                        placeholder="Masukkan No Wa Ortu" />
                                                    @error('no_wa_ortu')
                                                        <small class="invalid-feedback">{{ $message }}</small>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12">
                                                    <label for="no_wa_peserta" class="form-label">No Wa
                                                        Peserta</label>
                                                    <input type="text" name="no_wa_peserta"
                                                        class="form-control {{ $errors->has('no_wa_peserta') ? 'is-invalid' : '' }}"
                                                        id="no_wa_peserta"
                                                        value="{{ old('no_wa_peserta', $pendaftaranTryout?->no_wa_peserta) }}"
                                                        placeholder="Masukkan No Wa Peserta" />
                                                    @error('no_wa_peserta')
                                                        <small class="invalid-feedback">{{ $message }}</small>
                                                    @enderror
                                                </div>

                                                <div class="text-center col-md-12">
                                                    <x-input.confirm-button title="Lanjutkan daftar?" text=""
                                                        positive="Ya, daftar!" icon="info">
                                                        Lanjut
                                                    </x-input.confirm-button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End Contact Form -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="footer" style="margin-top: 100px">
                {{-- <div class="container footer-top">
                    <div class="row gy-4">
                        <div class="col-lg-4 col-md-6 footer-about">
                            <a href="index.html" class="d-flex align-items-center">
                                <span class="sitename">Arsha</span>
                            </a>
                            <div class="pt-3 footer-contact">
                                <p>A108 Adam Street</p>
                                <p>New York, NY 535022</p>
                                <p class="mt-3">
                                    <strong>Phone:</strong> <span>+1 5589 55488 55</span>
                                </p>
                                <p><strong>Email:</strong> <span>info@example.com</span></p>
                            </div>
                        </div>

                        <div class="col-lg-2 col-md-3 footer-links">
                            <h4>Useful Links</h4>
                            <ul>
                                <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
                                <li>
                                    <i class="bi bi-chevron-right"></i> <a href="#">About us</a>
                                </li>
                                <li>
                                    <i class="bi bi-chevron-right"></i> <a href="#">Services</a>
                                </li>
                                <li>
                                    <i class="bi bi-chevron-right"></i>
                                    <a href="#">Terms of service</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-2 col-md-3 footer-links">
                            <h4>Our Services</h4>
                            <ul>
                                <li>
                                    <i class="bi bi-chevron-right"></i> <a href="#">Web Design</a>
                                </li>
                                <li>
                                    <i class="bi bi-chevron-right"></i>
                                    <a href="#">Web Development</a>
                                </li>
                                <li>
                                    <i class="bi bi-chevron-right"></i>
                                    <a href="#">Product Management</a>
                                </li>
                                <li>
                                    <i class="bi bi-chevron-right"></i> <a href="#">Marketing</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-4 col-md-12">
                            <h4>Follow Us</h4>
                            <p>
                                Cras fermentum odio eu feugiat lide par naso tierra videa magna
                                derita valies
                            </p>
                            <div class="social-links d-flex">
                                <a href=""><i class="bi bi-twitter-x"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <div class="container mt-4 text-center copyright">
                    <p>
                        ©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>
                        <a href="https://prabubimatech.com" target="_blank" class="footer-link">Team Developer
                            PrabubimaTech</a>
                    </p>
                </div>
            </footer>
            <!-- / Footer -->

            {{-- <div class="content-backdrop fade"></div> --}}
        </div>
        <!-- Content wrapper -->
        <!-- / Layout page -->

        <!-- Overlay -->

        <!-- / Layout wrapper -->
        {{--

    </div>
</x-layouts.guest>
