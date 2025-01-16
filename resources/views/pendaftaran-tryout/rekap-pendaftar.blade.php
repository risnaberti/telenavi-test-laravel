<x-layout.app title="Rekap Pendaftar" activeMenu="pendaftaran-tryout.rekap-pendaftar">
    <div class="my-5 container-fluid">
        <x-breadcrumb title="Rekap Pendaftar" :breadcrumbs="[['label' => 'Dashboard', 'url' => url('/')], ['label' => 'Rekap Pendaftar']]" />

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
                                <th>Periode</th>
                                <th>Total Pendaftar</th>
                                <th>Laki-laki</th>
                                <th>Perempuan</th>
                                <th>Sudah Bayar</th>
                                <th>Belum Bayar</th>
                                <th>Belum Cetak</th>
                                <th class="text-center">Export</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $bulan[$row?->bulan - 1] . ' ' . $row->tahun }}</td>
                                    <td>{{ $row?->total_pendaftar }}</td>
                                    <td>{{ $row?->L }}</td>
                                    <td>{{ $row?->P }}</td>
                                    <td>
                                        <a
                                            href="{{ route('pendaftaran-tryout.rekap-pendaftar-detail', ['bulan' => $row?->bulan, 'tahun' => $row?->tahun, 'status' => 'sudah_bayar']) }}">
                                            {{ $row?->sudah_bayar }}
                                        </a>
                                    </td>
                                    <td>
                                        <a
                                            href="{{ route('pendaftaran-tryout.rekap-pendaftar-detail', ['bulan' => $row?->bulan, 'tahun' => $row?->tahun, 'status' => 'belum_bayar']) }}">
                                            {{ $row?->belum_bayar }}
                                        </a>
                                    </td>
                                    <td>
                                        <a
                                            href="{{ route('pendaftaran-tryout.rekap-pendaftar-detail', ['bulan' => $row?->bulan, 'tahun' => $row?->tahun, 'status' => 'belum_cetak']) }}">
                                            {{ $row?->belum_cetak }}
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <div class="me-1">
                                                <a href="{{ route('pendaftaran-tryout.rekap-pendaftar-excel', ['bulan' => $row?->bulan, 'tahun' => $row?->tahun]) }}"
                                                    class="btn btn-icon btn-success btn-sm" data-bs-toggle="tooltip"
                                                    data-bs-title="Export Excel" data-bs-placement="top">
                                                    <i class='bx bxs-file-export'></i>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="2"></td>
                                <td class="fw-bold">{{ $data->sum('total_pendaftar') }}</td>
                                <td class="fw-bold">{{ $data->sum('L') }}</td>
                                <td class="fw-bold">{{ $data->sum('P') }}</td>
                                <td class="fw-bold">{{ $data->sum('sudah_bayar') }}</td>
                                <td class="fw-bold">{{ $data->sum('belum_bayar') }}</td>
                                <td class="fw-bold">{{ $data->sum('belum_cetak') }}</td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout.app>
