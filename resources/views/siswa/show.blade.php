<x-layouts.app title="Detail Siswa" activeMenu="siswa.show">
     <div class="container my-5">
        <x-breadcrumb title="Detail Siswa" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Siswa', 'url' => route('siswa.index')],
            ['label' => 'Detail Siswa'],
        ]" />

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('siswa.index') }}" class="btn btn-sm btn-secondary">
                        <i class="bx bx-arrow-back me-1"></i>Kembali
                    </a>

                    <div>
                        <a href="{{ route('siswa.create') }}"
                            class="btn btn-sm btn-info">
                            <i class="bx bx-plus me-1"></i>Baru
                        </a>
                        <a href="{{ route('siswa.edit', $siswa) }}"
                            class="btn btn-sm btn-primary">
                            <i class="bx bx-pencil me-1"></i>Edit
                        </a>
                        <a href="{{ route('siswa.destroy', $siswa) }}"
                            class="btn btn-sm btn-danger">
                            <i class="bx bx-trash me-1"></i>Hapus
                        </a>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <form class="row g-3">
                    
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">No Va</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $siswa->no_va }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Idasalsekolah</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $siswa->idasalsekolah }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Kodejk</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $siswa->kodejk }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Kodejeniskeringanan</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $siswa->kodejeniskeringanan }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Nama</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $siswa->nama }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Panggilan</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $siswa->panggilan }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Tempatlahir</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $siswa->tempatlahir }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Tgllahir</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $siswa->tgllahir }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Tahunmasuk</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $siswa->tahunmasuk }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Namabapak</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $siswa->namabapak }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Namaibu</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $siswa->namaibu }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Alamat</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $siswa->alamat }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Notelpon</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $siswa->notelpon }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Namaori</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $siswa->namaori }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Templatefinger</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $siswa->templatefinger }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Nokartu</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $siswa->nokartu }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Kelas Id</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $siswa->kelas_id }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Longit</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $siswa->longit }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Latit</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $siswa->latit }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Adress</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $siswa->adress }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Pin</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $siswa->pin }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Kamar Id</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $siswa->kamar_id }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Profil</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $siswa->profil }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Kamar</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $siswa->kamar }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Asrama</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $siswa->asrama }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Lokasi Asrama</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $siswa->lokasi_asrama }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Kodeasrama</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $siswa->kodeAsrama }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Status Ketua Kamar</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $siswa->status_ketua_kamar }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Tgl Mapping</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $siswa->tgl_mapping }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Foto</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $siswa->foto }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Nisn</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $siswa->nisn }}</div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
