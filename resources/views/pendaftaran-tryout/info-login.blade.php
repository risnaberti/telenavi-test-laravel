<x-layout.guest title="Info Login">
    <x-guest-navbar />

    <div class="container my-5">
        <x-bs-toast />

        <div class="card">
            <div class="card-body">
                <div>
                    <div class="d-flex justify-content-between">
                        <h4 class="m-0 fw-semibold">Terima kasih telah mendaftar untuk Tryout SMP MUGA YOGYA!</h4>
                        {{-- <h4>{{ $timestamp }}</h4> --}}
                    </div>
                    <h6 class="m-0 fw-medium">Silahkan login menggunakan informasi sebagai berikut:</h6>
                    <br>
                    <table class="text-dark" style="font-size: 20px">
                        <tr>
                            <td><span class="fw-medium">Username</span></td>
                            <td><span class="fw-medium">&nbsp;: {{ $pendaftaranTryout->id_pendaftar }}</span></td>
                        </tr>
                        <tr>
                            <td><span class="fw-medium">Password</span></td>
                            <td><span class="fw-medium">&nbsp;: {{ $pendaftaranTryout->password_login }}</span></td>
                        </tr>
                    </table>
                    <br>
                    *NB
                    <ol>
                        <li>Harap simpan informasi ini dengan baik. Anda memerlukan username dan password untuk
                            mengakses status pembayaran dan cetak kartu peserta.</li>
                        <li>Gunakan username dan password di atas untuk login ke sistem melalui halaman [Login].</li>
                        <li>Setelah login, Anda dapat melihat status pembayaran dan mengunduh/mencetak kartu peserta
                            setelah pembayaran selesai.</li>
                        <li>Pastikan Anda membawa kartu peserta pada hari pelaksanaan tryout.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</x-layout.guest>
