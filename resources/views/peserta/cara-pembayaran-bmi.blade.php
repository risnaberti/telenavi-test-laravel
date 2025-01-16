<x-layout.app title="Tata Cara Pembayaran BMI" activeMenu="cara-pembayaran">
    <div class="container my-5">
        <div class="mb-5 card">
            <div class="card-body">
                <div class="box box-warning box-solid noprint">
                    <div class="box-header with-border">
                        {{-- <h3 class="box-title">Informasi Rekening</h3> --}}
                    </div>
                    <div class="box-body">
                        <div style="width:100%;background-color:white; padding:10px">
                            <h3 align="center">TATA CARA PEMBAYARAN BANK MUAMALAT<br>
                                SMP MUH 3 YOGYAKARTA<br>
                                KODE 7510 18<br>
                            </h3>
                            <hr>

                            <h4>I. MELALUI CHANNEL MUAMALAT </h4><br>

                            <b>Cara bayar melalui Muamalat Bank Banking (Muamalat DIN)</b>
                            <ol>
                                <li>Login ke Mobile Banking Muamalat (Muamalat DIN)</li>
                                <li>Pilih menu "BELI atau BAYAR"</li>
                                <li>Pilih menu <b>VIRTUAL ACCOUNT</b></li>
                                <li>Pilih rekening sumber</li>
                                <li>Masukkan nomor "Virtual Account" <b>7510 18 {{ $peserta->siswa?->no_va }}</b></li>
                                <li>Periksa informasi pembayaran pastikan VA sudah sesuai dengan informasi (cek info
                                    nama dan nama tagihan), kesalahan transfer ke Virtual Account lain bukan tanggung
                                    jawab bagian keuangan</li>
                                <li>Masukkan nominal bayar sesuai dengan total bayar yang tertera (biaya admin Rp. 3000
                                    tertera)</li>
                                <li>Masukkan PIN mobile banking Anda</li>
                                <li>Konfirmasi pembayaran</li>
                                <li>Simpan bukti transaksi sebagai bukti pembayaran</li>
                            </ol>

                            <hr>

                            <b>Cara bayar melalui ATM sesama Bank Muamalat</b><br>
                            <ol>
                                <li>Masukkan kartu ATM dan PIN Anda</li>
                                <li>Pilih menu <b>Transaksi Lain</b>, kemudian pilih menu <b>Pembayaran</b></li>
                                <li>Masukkan nomor Virtual Account: <b>7510 18 {{ $peserta->siswa?->no_va }}</b></li>
                                <li>Periksa informasi pembayaran pastikan VA sudah sesuai dengan informasi (cek info
                                    nama dan nama tagihan), kesalahan transfer ke Virtual Account lain bukan tanggung
                                    jawab bagian keuangan</li>
                                <li>Tekan "YA" jika setuju dengan informasi pembayaran</li>
                                <li>Masukkan nominal pembayaran sesuai dengan total bayar yang tertera (biaya admin Rp
                                    3000 tertera)</li>
                                <li>Kemudian tekan "BENAR"</li>
                                <li>Konfirmasi transaksi sukses</li>
                                <li>Simpan struk ATM sebagai bukti pembayaran</li>
                            </ol>

                            <hr>

                            <h4>II. MELALUI CHANNEL BANK LAIN</h4><br>

                            <b>Cara bayar melalui mobile banking Bank Lain</b><br>
                            <ol>
                                <li>Login ke Mobile Banking</li>
                                <li>Pilih menu "Transfer"</li>
                                <li>Pilih menu "Transfer Antar Bank"</li>
                                <li>Pilih bank tujuan yaitu "Bank Muamalat"</li>
                                <li>Masukkan nomor Virtual Account: <b>7510 18 {{ $peserta->siswa?->no_va }}</b></li>
                                <li>Periksa informasi pembayaran pastikan VA sudah sesuai dengan informasi (cek info
                                    nama dan nama tagihan), kesalahan transfer ke Virtual Account lain bukan tanggung
                                    jawab bagian keuangan</li>
                                <li>Masukkan nominal pembayaran sesuai dengan tagihan yang dimiliki ditambah biaya admin
                                    Rp 3.000</li>
                                <li>Masukkan PIN mobile banking Anda</li>
                                <li>Konfirmasi pembayaran</li>
                                <li>Simpan struk ATM sebagai bukti pembayaran</li>
                            </ol>

                            <hr>

                            <b>Cara bayar melalui ATM Lain selain Bank Muamalat</b><br>
                            <ol>
                                <li>Masukkan kartu ATM dan PIN Anda</li>
                                <li>Pilih menu <b>Transfer Bank Lain</b></li>
                                <li>Masukkan kode bank Muamalat (147) dilanjut dengan 16 digit nomor virtual account:
                                    <b>7510 18 {{ $peserta->siswa?->no_va }}</b></li>
                                <li>Masukkan nominal pembayaran sesuai dengan tagihan yang dimiliki ditambah biaya admin
                                    Rp 3.000</li>
                                <li>Periksa informasi pada layar konfirmasi, pastikan nama sudah benar, pastikan virtual
                                    account sudah sesuai dengan informasi (cek info nama dan nama tagihan), kesalahan
                                    transfer ke Virtual Account lain bukan tanggung jawab bagian keuangan</li>
                                <li>Jika nama siswa sudah benar maka lakukan konfirmasi pada data transfer</li>
                                <li>Jika pada layar tertera bukan nama siswa sesuai Virtual Account yang sudah diinput,
                                    silakan batalkan transaksi dan hubungi bagian keuangan</li>
                                <li>Simpan struk ATM sebagai bukti pembayaran</li>
                            </ol>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layout.app>
