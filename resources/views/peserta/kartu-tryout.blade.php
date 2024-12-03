<x-layouts.app title="Cetak Kartu Tryout" activeMenu="cetak-kartu">
    <div class="container my-5">
        @if ($tagihan->statuspembayaran == 1 and $tagihan->aktif == 0)
            <style>
                .kartu td {
                    padding: 4px;
                    font-size: 14px;
                }
            </style>

            <div class="pendaftaran-view box"
                style="width:10cm;margin:auto; height:600px border:2px solid gray;border:1px solid gray; box-shadow: 5px 10px #888888; background: #fff;">
                <div class="box-body">
                    <div class="mt-2">
                        <table width="100%" style="border-bottom: 2px solid black;">
                            <tr style="text-align: center">
                                <td><img src="{{ asset('assets/img/logo/logosmpmugaygy.png') }}" width="75px" /></td>
                                <td>
                                    <h5 class="m-0 fw-bold">KARTU PESERTA</h5>
                                    <h5 class="m-0">TRY OUT UJIAN SEKOLAH</h5>
                                    <h6 class="m-0">Tahun Pelajaran 2024/2025</h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <p class="mb-2"></p>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <table style="width:100%;" class="m-4 kartu">
                        <tr>
                            <td>Nomor Peserta</td>
                            <td>:</td>
                            <td><b>{{ $peserta->no_peserta }}</b></td>
                        </tr>
                        <tr>
                            <td>NISN</td>
                            <td>:</td>
                            <td><b>{{ $peserta->nisn }}</b></td>
                        </tr>
                        <tr>
                            <td>Nama Peserta</td>
                            <td>:</td>
                            <td><b>{{ strtoupper($peserta->nama_lengkap) }}</b></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td><b>{{ strtoupper($peserta->nama_jenis_kelamin) }}</b></td>
                        </tr>
                        <tr>
                            <td>TTL</td>
                            <td>:</td>
                            <td>{{ $peserta->tempat_lahir }}, {{ date('d-m-Y', strtotime($peserta->tanggal_lahir)) }}
                            </td>
                        </tr>
                        <tr>
                            <td>Asal Sekolah Dasar</td>
                            <td>:</td>
                            <td><b>{{ $peserta->nama_asal_sekolah }}</b></td>
                        </tr>
                        {{-- <tr>
                        <td>Ruang Ujian</td>
                        <td>:</td>
                        <td><b>{{ $peserta->nama_asal_sekolah }}</b></td>
                    </tr> --}}

                        <tr>
                            <td style="text-align:center; font-size:18px" colspan="2">
                            </td>
                            <td><b>Tanda Tangan</b><br><br><br><br>_________________</td>
                        </tr>
                    </table>
                    <div style="text-align:center; border:1px solid black; margin-top:10px"><small></small></div>

                </div>
                <div class="text-center noprint" style="padding:10px">
                    <button class="btn btn-primary noprint" onclick="window.print()">Cetak</button>
                </div>
            </div>
        @else
            <div class="mb-5 card">
                <div class="card-header noprint">
                    <div class="alert alert-danger" role="alert">
                        <h5 class="m-0 fw-semibold">
                            Silahkan lakukan pembayaran terlebih dahulu, sebelum mencetak kartu tryout.
                        </h5>
                        <h6 class="m-0 fw-normal">
                            *Kartu akan muncul otomatis dihalaman ini jika pembayaran sudah lunas.
                        </h6>
                    </div>
                </div>
                <div class="card-body">
                    <div class="box box-solid">
                        <div class="box-header with-border">
                            <h3 class="box-title">Pembayaran Biaya PPDB </h3>
                        </div>
                        <div class="box-body">
                            @if ($tagihan != null)
                                <table class="table table-bordered table-condensed table-striped">
                                    <tr>
                                        <td class="text-nowrap">Nomor Formulir / Virtual Account </td>
                                        <td>{{ $tagihan->nis }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap">Nama </td>
                                        <td>{{ $tagihan->siswa->nama }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap">Periode Tagihan </td>
                                        <td>{{ \Carbon\Carbon::parse($tagihan->waktuawal)->format('d M Y') }} s.d
                                            {{ \Carbon\Carbon::parse($tagihan->waktuakhir)->format('d M Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap">Status</td>
                                        <td>
                                            @if ($tagihan->statuspembayaran == 1)
                                                <font color="green">SUDAH DIBAYAR</font>
                                            @else
                                                <font color="red">BELUM DIBAYAR</font>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap">Total Tagihan</td>
                                        <td style="font-weight:bold; font-size:18px">Rp
                                            {{ number_format($tagihan->totaltagihan, 0, ',', '.') }},-</td>
                                    </tr>
                                </table>
                            @endif
                        </div>
                    </div>

                    <div class="noprint">
                        <button onclick="window.print()" class="mt-3 btn btn-primary">Cetak</button>
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-layouts.app>
