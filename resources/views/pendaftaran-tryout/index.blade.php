<x-layouts.app title="Pendaftaran Tryout" activeMenu="pendaftaran-tryout">
    <div class="my-5 container-fluid">
        <x-breadcrumb title="Pendaftaran Tryout" :breadcrumbs="[['label' => 'Dashboard', 'url' => url('/')], ['label' => 'Pendaftaran Tryout']]" />

        <x-bs-toast />

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                @can('pendaftaran-tryout create')
                    <a href="{{ route('pendaftaran-tryout.create') }}" class="btn btn-primary">
                        <span class="bx bx-plus me-1"></span>Tambah Data
                    </a>
                @endcan
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @grid([
                        'dataProvider' => $pendaftaranTryout,
                        'rowsPerPage' => $perPage,
                        'columnOptions' => [
                            'class' => 'attribute',
                            'formatters' => ['text', 'raw'],
                        ],
                        'columns' => [
                            [
                                'class' => 'raw',
                                'title' => 'No',
                                'value' => function ($row) use (&$i) {
                                    return ++$i . '.';
                                },
                            ],
                            'id_pendaftar',
                            'no_peserta',
                            'nama_lengkap',
                            'jenis_kelamin',
                            'nama_asal_sekolah',
                            'nama_ortu',
                            'no_wa_ortu',
                            // 'no_wa_peserta',
                            // 'alamat_domisili',
                            'password_login',
                            [
                                'class' => 'raw',
                                'attribute' => 'created_at',
                                'title' => 'Tgl Daftar',
                                'value' => function ($row) {
                                    return $row->created_at->format('d-m-Y H:i:s');
                                },
                            ],
                            [
                                'class' => 'raw',
                                'title' => 'Aksi',
                                'formatters' => ['raw'],
                                'value' => function ($row) {
                                    return view('pendaftaran-tryout.includes.actions', ['row' => $row])->render();
                                },
                            ],
                        ],
                    ])
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
