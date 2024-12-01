<x-layouts.app title="Detail Pendaftaran Tryout" :active-menu="'pendaftaranTryouts'">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="py-3 mb-0"><span class="text-muted fw-light">PendaftaranTryout/</span> Detail</h4>
                <div>
                    <a href="{{ route('pendaftaranTryouts.index') }}" class="btn btn-sm btn-secondary">
                        <i class="bx bx-arrow-back me-1"></i>Kembali
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Detail Pendaftaran Tryout</h5>
                </div>
                <div class="card-body">
                    <form class="row g-3">
                        
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Id Pendaftar</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $pendaftaranTryout->id_pendaftar }}</div>                                <div class="col-md-4">
                                    <label for="first-name-horizontal">No Peserta</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $pendaftaranTryout->no_peserta }}</div>                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Nama Lengkap</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $pendaftaranTryout->nama_lengkap }}</div>                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Jenis Kelamin</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $pendaftaranTryout->jenis_kelamin }}</div>                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Nisn</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $pendaftaranTryout->nisn }}</div>                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Nama Asal Sekolah</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $pendaftaranTryout->nama_asal_sekolah }}</div>                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Nama Ortu</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $pendaftaranTryout->nama_ortu }}</div>                                <div class="col-md-4">
                                    <label for="first-name-horizontal">No Wa Ortu</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $pendaftaranTryout->no_wa_ortu }}</div>                                <div class="col-md-4">
                                    <label for="first-name-horizontal">No Wa Peserta</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $pendaftaranTryout->no_wa_peserta }}</div>                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Alamat Domisili</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $pendaftaranTryout->alamat_domisili }}</div>                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Tanggal Pembayaran</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $pendaftaranTryout->tanggal_pembayaran }}</div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
