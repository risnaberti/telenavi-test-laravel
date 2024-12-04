<x-layouts.app title="Tata Cara Pembayaran BSI" activeMenu="cara-pembayaran">
    <div class="container my-5">
        <div class="mb-5 card">
            <div class="card-body">
                <div class="box box-warning box-solid noprint">
                    <div class="box-header with-border">
                        {{-- <h3 class="box-title">Informasi Rekening</h3> --}}
                    </div>
                    <div class="box-body">
                        <div style="width:100%;background-color:white; padding:10px">
                            <h3 align="center">TATA CARA PEMBAYARAN BSI<br>
                                SMP MUH 3 YOGYAKARTA<br>
                                KODE 7925<br>
                            </h3>
                            <hr>
                            <h4>I. MELALUI CHANNEL BSI </h4><br>
                            <b>Melalui Mobile Banking BSI</b><br>
                            <ol>
                                <li>Login akun Mobile Banking BSI</li>
                                <li>Pilih Menu <b>Pembayaran </b></li>
                                <li>Pilih <b>Akademik</b></li>
                                <li>Pilih atau ketik angka <b>7925 - SMP MUH 3 YOGYAKARTA</b></li>
                                <li>Masukkan nomor pembayaran <b>
                                        <font color="blue">{{ $tagihan['nis'] }}</font>
                                    </b></li>
                                <li>Nominal tagihan akan muncul secara otomatis, cek nama siswa yang tertera sudah
                                    sesuai lalu masukkan PIN dan lanjutkan transaksi</li>
                            </ol>
                            <hr>
                            <b>Melalui ATM Bank Syariah Indonesia </b>
                            <ol>
                                <li>Masukkan kartu ATM dan PIN </li>
                                <li>Pilih menu <b>Pembayaran/Pembelian </b></li>
                                <li>Pilih Menu <b>Akademik/ Institusi </b></li>
                                <li>Masukkan kode <b>7925 - SMP MUH 3 YOGYAKARTA</b> dan Nomor Pembayaran Contoh : <b>
                                        <font color="blue">7925 {{ $tagihan['nis'] }}</font>
                                    </b>
                                </li>
                                <li>Nominal tagihan akan muncul secara otomatis, cek nama siswa yang tertera sudah
                                    sesuai lalu masukkan PIN dan lanjutkan transaksi</li>
                            </ol>
                            <hr>
                            <b>Melalui Internet Banking Bank Syariah Indonesia</b><br>
                            <ol>
                                <li>Login ke https://bsinet.bankbsi.co.id/cms/index.php </li>
                                <li>Pilih menu <b>Pembayaran </b></li>
                                <li>Pilih jenis pembayaran <b>Institusi </b></li>
                                <li>Cari Nama Sekolah - <b>SMP MUH 3 YOGYAKARTA</b></li>
                                <li>Masukan nomor pembayaran <b>
                                        <font color="blue">{{ $tagihan['nis'] }}</font>
                                    </b> </li>
                                <li>Nominal tagihan akan muncul secara otomatis, cek nama siswa yang tertera sudah
                                    sesuai lalu masukkan PIN dan lanjutkan transaksi</li>
                            </ol>
                            <hr>
                            <b>Melalui Teller Bank Syariah Indonesia</b><br>
                            Silahkan lakukan pembayaran melalui petugas Teller di Bank Syariah Indonesia terdekat dengan
                            menuliskan nama sekolah <b>(SMP MUH 3 YOGYAKARTA)</b> dan Nomor Pembayaran <b>
                                <font color="blue">{{ $tagihan['nis'] }}</font>
                            </b> dan teller BSI akan menginformasikan nama siswa dan nominal tagihan yang harus
                            dibayarkan.
                            <hr>

                            <h4>II.MELALUI CHANNEL ATM BANK LAIN </h4>
                            <b>Melalui Bank Mandiri/ATM Bersama</b>
                            <ol>
                                <li>Masukkan kartu ATM dan PIN </li>
                                <li>Pilih menu <b>Transfer – Transfer ke Antar Bank</b></li>
                                <li>Masukkan <b>
                                        <font color="blue"> 451 900 7925 {{ $tagihan['nis'] }}</font>
                                    </b></li>
                                <li>Masukkan nominal yang akan ditransfer sesuai dengan nilai tagihan yang ditentukan
                                    sekolah, <font color="red">NOMINAL HARUS SESUAI, JIKA BERBEDA SISTEM AKAN MENOLAK
                                    </font>
                                </li>
                            </ol>
                            Masukkan nominal sesuai tagihan + fee adm 3.000 (Misal tagihan Rp.500.000, maka
                            dimasukkan nominal Rp.503.000)
                            <hr>
                            <b>Melalui ATM Prima (BCA)</b>
                            <ol>
                                <li>Masukkan kartu ATM dan PIN </li>
                                <li>Pilih menu <b>Transfer ˃ Transfer ke Antar rekening Bank lain</b></li>
                                <li>Ketik kode <b>Bank Syariah Indonesia: 451</b></li>
                                <li>Masukkan <b>
                                        <font color="blue"> 900 7925 {{ $tagihan['nis'] }}</font>
                                    </b> </li>
                                <li>Masukkan nominal yang akan ditransfer sesuai dengan nilai tagihan yang ditentukan
                                    sekolah, <font color="red">NOMINAL HARUS SESUAI, JIKA BERBEDA SISTEM AKAN MENOLAK
                                    </font>
                                </li>
                            </ol>
                            Masukkan nominal sesuai tagihan + fee adm 3.000 (Misal tagihan Rp.500.000, maka
                            dimasukkan nominal Rp.503.000)
                            <hr>
                            <b>Melalui Channel Bank selain ATM yaitu: Mobile Banking/Internet Banking </b>
                            <ol>
                                <li>Pilih menu <b>Transfer Online ke Bank Lain</b></li>
                                <li>Pilih ke <b>Bank Syariah Indonesia / BSI ex BSM</b></li>
                                <li>Masukkan Nomor Rekening Tujuan <br><b>
                                        <font color="blue"> 900 7925 {{ $tagihan['nis'] }}</font>
                                    </b></li>
                                <li>Masukkan nominal yang akan ditransfer sesuai dengan nilai tagihan yang ditentukan
                                    sekolah, <font color="red">NOMINAL HARUS SESUAI, JIKA BERBEDA SISTEM AKAN MENOLAK
                                    </font>
                                </li>
                            </ol>
                            Masukkan nominal sesuai tagihan + fee adm 3.000 (Misal tagihan Rp.500.000, maka
                            dimasukkan nominal Rp.503.000)
                            <small>
                                <u>Keterangan </u><br>
                                *Tidak bisa menggunakan transfer SKN/Kliring, hanya bisa menggunakan Transfer Online
                                Antar Bank<br>
                                *Menggunakan Dompet Digital misal transfer via OVO, Dana atau Gopay <b>tidak
                                    disarankan</b> untuk menghindari gagal transaksi dan kesulitan dalam tracking dana
                            </small>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-layouts.app>
