<x-layouts.app title="Pendaftaran Tryout">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 card-title">Pendaftaran Tryout</h5>
                    @can('pendaftaran-tryout create')
                        <a href="{{ route('pendaftaran-tryout.create') }}" class="btn btn-primary">
                            <span class="tf-icons bx bx-plus"></span>Tambah Data
                        </a>
                    @endcan
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="data-table">
                            <thead>
                                <tr>
                                    <th>No</th>

                                    <th>Id Pendaftar</th>
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

                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pendaftaranTryouts as $pendaftaranTryout)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>{{ $pendaftaranTryout->id_pendaftar }}</td>
                                        <td>{{ $pendaftaranTryout->no_peserta }}</td>
                                        <td>{{ $pendaftaranTryout->nama_lengkap }}</td>
                                        <td>{{ $pendaftaranTryout->jenis_kelamin }}</td>
                                        <td>{{ $pendaftaranTryout->nisn }}</td>
                                        <td>{{ $pendaftaranTryout->nama_asal_sekolah }}</td>
                                        <td>{{ $pendaftaranTryout->nama_ortu }}</td>
                                        <td>{{ $pendaftaranTryout->no_wa_ortu }}</td>
                                        <td>{{ $pendaftaranTryout->no_wa_peserta }}</td>
                                        <td>{{ $pendaftaranTryout->alamat_domisili }}</td>
                                        <td>{{ $pendaftaranTryout->tanggal_pembayaran }}</td>

                                        <td class="text-center">
                                            <div class="btn-group" role="group">
                                                @can('pendaftaran-tryout view')
                                                    <a href="{{ route('pendaftaran-tryout.show', $pendaftaranTryout->id_pendaftar) }}"
                                                        class="btn btn-icon btn-outline-info btn-sm"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Lihat">
                                                        <span class="tf-icons bx bx-show"></span>
                                                    </a>
                                                @endcan
                                                @can('pendaftaran-tryout edit')
                                                    <a href="{{ route('pendaftaran-tryout.edit', $pendaftaranTryout->id_pendaftar) }}"
                                                        class="btn btn-icon btn-outline-primary btn-sm"
                                                        data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                                        <span class="tf-icons bx bx-pencil"></span>
                                                    </a>
                                                @endcan
                                                @can('pendaftaran-tryout delete')
                                                    <form
                                                        action="{{ route('pendaftaran-tryout.destroy', $pendaftaranTryout->id_pendaftar) }}"
                                                        method="POST" class="d-inline"
                                                        onsubmit="return confirm('Konfirmasi untuk hapus data ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-icon btn-outline-danger btn-sm"
                                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus">
                                                            <span class="tf-icons bx bx-trash"></span>
                                                        </button>
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
                        {!! $pendaftaranTryouts->withQueryString()->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script>
            // Inisialisasi tooltip
            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
        </script>
    @endpush
</x-layouts.app>
