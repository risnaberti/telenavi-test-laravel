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
                    <table class="table table-striped" id="data-table">
                        <thead>
                            <tr>
                                <th>No</th>

                                <th>No Peserta</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>Nisn</th>
                                <th>Nama Asal Sekolah</th>
                                <th>Nama Ortu</th>
                                <th>No Wa Ortu</th>
                                <th>No Wa Peserta</th>
                                <th>Alamat Domisili</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Nominal Tagihan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pendaftaranTryout as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>

                                    <td>{{ $row?->no_peserta }}</td>
                                    <td>{{ $row?->nama_lengkap }}</td>
                                    <td>{{ $row?->jenis_kelamin }}</td>
                                    <td>{{ $row?->nisn }}</td>
                                    <td>{{ $row?->nama_asal_sekolah }}</td>
                                    <td>{{ $row?->nama_ortu }}</td>
                                    <td>{{ $row?->no_wa_ortu }}</td>
                                    <td>{{ $row?->no_wa_peserta }}</td>
                                    <td>{{ $row?->alamat_domisili }}</td>
                                    <td>{{ $row?->tanggal_pembayaran }}</td>
                                    <td>{{ $row?->nominal_tagihan }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            @can('pendaftaran-tryout view')
                                                <div class="me-1">
                                                    <a href="{{ route('pendaftaran-tryout.show', $row) }}"
                                                        class="btn btn-icon btn-outline-info btn-sm"
                                                        data-bs-toggle="tooltip" data-bs-title="Detail"
                                                        data-bs-placement="top">
                                                        <span class="bx bx-show"></span>
                                                    </a>
                                                </div>
                                            @endcan
                                            @can('pendaftaran-tryout edit')
                                                <div class="me-1">
                                                    <a href="{{ route('pendaftaran-tryout.edit', $row) }}"
                                                        class="btn btn-icon btn-outline-primary btn-sm"
                                                        data-bs-toggle="tooltip" data-bs-title="Edit"
                                                        data-bs-placement="top">
                                                        <span class="bx bx-pencil"></span>
                                                    </a>
                                                </div>
                                            @endcan
                                            @can('pendaftaran-tryout delete')
                                                <form action="{{ route('pendaftaran-tryout.destroy', $row) }}"
                                                    method="POST" class="d-inline" @csrf @method('DELETE')
                                                    <x-input.confirm-button text="Data pendaftaran tryout ini akan dihapus!"
                                                    positive="Ya, hapus!" icon="info"
                                                    class="btn btn-icon btn-outline-danger btn-sm" data-bs-toggle="tooltip"
                                                    data-bs-title="Hapus" data-bs-placement="top">
                                                    <span class="bx bx-trash"></span>
                                                    </x-input.confirm-button>
                                                </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="mt-3 d-flex justify-content-end">
                    {!! $pendaftaranTryout->withQueryString()->links() !!}
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
