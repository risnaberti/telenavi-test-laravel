<x-layouts.app title="Detail Pesanwa" activeMenu="pesanwa.show">
     <div class="container my-5">
        <x-breadcrumb title="Detail Pesanwa" :breadcrumbs="[
            ['label' => 'Dashboard', 'url' => url('/')],
            ['label' => 'Pesanwa', 'url' => route('pesanwa.index')],
            ['label' => 'Detail Pesanwa'],
        ]" />

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <a href="{{ route('pesanwa.index') }}" class="btn btn-sm btn-secondary">
                        <i class="bx bx-arrow-back me-1"></i>Kembali
                    </a>

                    <div>
                        <a href="{{ route('pesanwa.create') }}"
                            class="btn btn-sm btn-info">
                            <i class="bx bx-plus me-1"></i>Baru
                        </a>
                        <a href="{{ route('pesanwa.edit', $pesanwa) }}"
                            class="btn btn-sm btn-primary">
                            <i class="bx bx-pencil me-1"></i>Edit
                        </a>
                        <a href="{{ route('pesanwa.destroy', $pesanwa) }}"
                            class="btn btn-sm btn-danger">
                            <i class="bx bx-trash me-1"></i>Hapus
                        </a>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <form class="row g-3">
                    
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Isi Pesan</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $pesanwa->isi_pesan }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Tgl Kirim</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $pesanwa->tgl_kirim }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Status Pesan</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $pesanwa->status_pesan }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">No Pendaftaran</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $pesanwa->no_pendaftaran }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">Jenis Pesan</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $pesanwa->jenis_pesan }}</div>
                                <div class="col-md-4">
                                    <label for="first-name-horizontal">No Hp</label>
                                </div>
                                <div class="col-md-8 form-group">: {{ $pesanwa->no_hp }}</div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
