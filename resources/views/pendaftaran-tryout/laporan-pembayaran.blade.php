<x-layouts.app title="Laporan Bayar Siswa" activeMenu="pendaftaran-tryout.laporan-pembayaran">
    <div class="my-5 container-fluid">
        <x-breadcrumb title="Laporan Bayar Siswa" :breadcrumbs="[['label' => 'Dashboard', 'url' => url('/')], ['label' => 'Laporan Bayar Siswa']]" />

        <x-bs-toast />

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Pembayaran</th>
                                <th>No Peserta</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat Domisili</th>
                                <th>Tanggal Pembayaran</th>
                                <th class="text-end">Nominal Pembayaran</th>
                                <th>Keterangan</th>
                                {{-- <th class="text-center">Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laporan as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row?->id_pendaftar }}</td>
                                    <td>{{ $row?->no_peserta }}</td>
                                    <td>{{ $row?->nama_lengkap }}</td>
                                    <td>{{ $row?->jenis_kelamin }}</td>
                                    <td>{{ $row?->alamat_domisili }}</td>
                                    <td>{{ \Carbon\Carbon::parse($row?->tgl_bayar)->format('d-m-Y H:i:s') }}</td>
                                    <td class="text-end">{{ number_format($row?->totaltagihan, 0, ',', '.') }}</td>
                                    <td>{{ $row?->keterangan }}</td>
                                    {{-- <td class="text-center">
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
                                        </div>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="mt-3 d-flex justify-content-end">
                    {!! $laporan->withQueryString()->links() !!}
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
