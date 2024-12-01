<x-layouts.app title="Detail Pendaftaran Tryout" :activeMenu="'pendaftaran-tryout'">
     <div class="container my-5">
        <x-breadcrumb title="Detail Pendaftaran Tryout" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Pendaftaran Tryout', 'url' => route('pendaftaran-tryout.index')],
            ['label' => 'Detail Pendaftaran Tryout'],
        ]" />

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('pendaftaran-tryout.index') }}" class="btn btn-sm btn-secondary">
                        <i class="bx bx-arrow-back me-1"></i>Kembali
                    </a>

                    <div>
                        <a href="{{ route('pendaftaran-tryout.create') }}"
                            class="btn btn-sm btn-info">
                            <i class="bx bx-plus me-1"></i>Baru
                        </a>
                        <a href="{{ route('pendaftaran-tryout.edit', $pendaftaranTryout) }}"
                            class="btn btn-sm btn-primary">
                            <i class="bx bx-pencil me-1"></i>Edit
                        </a>
                        <a href="{{ route('pendaftaran-tryout.destroy', $pendaftaranTryout) }}"
                            class="btn btn-sm btn-danger">
                            <i class="bx bx-trash me-1"></i>Hapus
                        </a>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <form class="row g-3">
                    
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">No Peserta</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $pendaftaranTryout->no_peserta }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Nama Lengkap</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $pendaftaranTryout->nama_lengkap }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Jenis Kelamin</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $pendaftaranTryout->jenis_kelamin }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Nisn</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $pendaftaranTryout->nisn }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Nama Asal Sekolah</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $pendaftaranTryout->nama_asal_sekolah }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Nama Ortu</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $pendaftaranTryout->nama_ortu }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">No Wa Ortu</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $pendaftaranTryout->no_wa_ortu }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">No Wa Peserta</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $pendaftaranTryout->no_wa_peserta }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Alamat Domisili</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $pendaftaranTryout->alamat_domisili }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Tanggal Pembayaran</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $pendaftaranTryout->tanggal_pembayaran }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Nominal Tagihan</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $pendaftaranTryout->nominal_tagihan }}</div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
