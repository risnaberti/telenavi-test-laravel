<x-layouts.app title="Detail {{ str_replace('_', ' ', str()->title($status)) }} {{ $bulan }} {{ $tahun }}"
    activeMenu="pendaftaran-tryout.laporan-pembayaran">
    <div class="my-5 container-fluid">
        <x-breadcrumb
            title="Detail {{ str_replace('_', ' ', str()->title($status)) }} {{ $bulan }} {{ $tahun }}"
            :breadcrumbs="[
                ['label' => 'Dashboard', 'url' => url('/')],
                ['label' => 'Rekap Pendaftaran', 'url' => route('pendaftaran-tryout.rekap-pendaftar')],
                ['label' => 'Detail ' . str_replace('_', ' ', str()->title($status))],
            ]" />

        <x-bs-toast />

        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <a href="{{ route('pendaftaran-tryout.rekap-pendaftar') }}" class="btn btn-secondary btn-sm">Kembali</a>
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row?->id_pendaftar }}</td>
                                    <td>{{ $row?->no_peserta }}</td>
                                    <td>{{ $row?->nama_lengkap }}</td>
                                    <td>{{ $row?->jenis_kelamin }}</td>
                                    <td>{{ $row?->alamat_domisili }}</td>
                                    <td>{{ \Carbon\Carbon::parse($row?->tgl_bayar)->format('d-m-Y H:i:s') }}</td>
                                    <td class="text-end">{{ number_format($row?->totaltagihan, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <div class="mt-3 d-flex justify-content-end">
                    {{-- {!! $data->withQueryString()->links() !!} --}}
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
