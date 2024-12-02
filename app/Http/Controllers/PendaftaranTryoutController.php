<?php

namespace App\Http\Controllers;

use App\Models\Detailtagihan;
use App\Models\Historykelas;
use App\Models\PendaftaranTryout;
use App\Models\Siswa;
use App\Models\Tagihan;
use App\Models\Tahunajaran;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use \Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Woo\GridView\DataProviders\EloquentDataProvider;

class PendaftaranTryoutController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:pendaftaran-tryout view', only: ['index', 'show']),
            new Middleware('permission:pendaftaran-tryout create', only: ['create', 'store']),
            new Middleware('permission:pendaftaran-tryout edit', only: ['edit', 'update']),
            new Middleware('permission:pendaftaran-tryout delete', only: ['destroy']),
            new Middleware('permission:pendaftaran-tryout daftar-by-admin', only: ['daftarByAdmin', 'storeDaftarByAdmin']),
        ];
    }

    public function daftar(Request $request)
    {
        $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:50',
            'jenis_kelamin' => 'required|string|in:L,P',
            'nisn' => 'nullable|string|max:10',
            'tanggal_lahir' => 'required|date',
            'nama_asal_sekolah' => 'required|string|max:50',
            'nama_ortu' => 'nullable|string|max:50',
            'no_wa_ortu' => 'required|string|max:20',
            'no_wa_peserta' => 'required|string|max:20',
            'alamat_domisili' => 'nullable|string',
        ]);

        try {
            $urutan_baru = collect(DB::select("
                SELECT MAX(SUBSTR(id_pendaftar, 3)) + 1 as urutan_baru
                FROM `pendaftaran_tryout`
                WHERE SUBSTR(id_pendaftar, 3, 2) = SUBSTR(YEAR(NOW()), 3)
            "))->value('urutan_baru');

            $validatedData['id_pendaftar'] = '91' . $urutan_baru;
            $validatedData['no_peserta'] = 'TO_Muga' . $urutan_baru;
            $validatedData['nominal_tagihan'] = 100000;
            $validatedData['password_login'] = rand(100000, 999999);

            DB::transaction(function () use ($validatedData) {
                // insert ke tabel pendaftaran
                PendaftaranTryout::create($validatedData);

                // insert ke tabel user
                $user = User::create([
                    'name' => $validatedData['nama_lengkap'],
                    'username' => $validatedData['no_peserta'],
                    'password' => Hash::make($validatedData['password_login']),
                ]);

                $user->assignRole('peserta tryout');

                // insert ke tabel siswa
                $siswa = Siswa::create([
                    'nis' => $validatedData['id_pendaftar'],
                    'nama' => $validatedData['nama_lengkap'],
                    'kodejk' => $validatedData['jenis_kelamin'] == 'L' ? 1 : 2,
                    'notelpon' => $validatedData['no_wa_peserta']
                ]);

                $kodeta = Tahunajaran::query()->where('isaktif', "1")->first()?->kodeta;

                if (!$kodeta) {
                    return redirect()->back()
                        ->withInput()
                        ->with('error', 'Tidak ada tahun ajaran aktif, hubungi admin sekolah');
                }

                // insert ke tabel historykelas
                Historykelas::create([
                    'nis' => $validatedData['id_pendaftar'],
                    'kodekelas' => "PENDAFTAR TRYOUT",
                    'kodeta' => $kodeta,
                    'kodestatus' => "1",
                    'isaktif' => "1"
                ]);

                // insert ke tabel tagihan
                $tagihan = Tagihan::create([
                    'idtagihan' => $validatedData['id_pendaftar'],
                    'nis' => $validatedData['id_pendaftar'],
                    'kodebulan' => now()->monthOfYear(),
                    'kodeta' => $kodeta,
                    'kodekelompok' => '91',
                    'tglgenerate' => now(),
                    'waktuawal' => now(),
                    'waktuakhir' => now()->addDays(14),
                    'aktif' => '1',
                    'statuspembayaran' => '0',
                    'urutanantrian' => '1',
                    'totaltagihan' => $validatedData['nominal_tagihan'],
                ]);

                // insert ke tabel detailtagihan
                Detailtagihan::create([
                    'idtagihan' => $validatedData['id_pendaftar'],
                    'idjenistagihan' => "FO",
                    'nominal' => $validatedData['nominal_tagihan'],
                ]);

                // kirim wa

                $numberformat = number_format($tagihan->totaltagihan, 0, ',', '.');

                $message = <<<EOD
                _Bismillahirrohmanirrohim._
                Terimakasih sudah mendaftar melalui sistem Pendaftaran Tryout SMP Muhammadiyah 3 Yogyakarta.

                Silakan melanjutkan pendaftaran melalui login :
                Username / No Peserta: *{$validatedData['no_peserta']}*
                Password: *{$validatedData['password_login']}*
                Nama: {$validatedData['nama_lengkap']}

                Batas Akhir Pembayaran: {$tagihan->waktuakhir->format('d-m-Y H:i')}
                Biaya Pendaftaran: *Rp. $numberformat*

                Terimakasih.
                EOD;

                $this->kirimWa($siswa->notelpon, $message, "PENDAFTARAN TRYOUT", $siswa->nis);
            });

            return redirect()->route('tryout.info-login', ['_id' => encrypt(['id' => $validatedData['id_pendaftar'], 'timestamp' => now()->timestamp])])
                ->with('noBack', true)
                ->with('success', 'Anda berhasil mendaftar, silahkan login untuk lanjut ke proses pembayaran.');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('landing')
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat membuat data. ' . $e->getMessage());
        }

        return redirect()->route('landing')
            ->withInput()
            ->with('error', 'Terjadi kesalahan saat membuat data. Error tidak diketahui.');
    }

    public function infoLogin(Request $request)
    {
        $dekrip = decrypt($request->_id);

        if (now()->timestamp - $dekrip['timestamp'] > 300) { // 5 menit
            return redirect()->to('/')->with('warning', 'Halaman sudah expired.');
        }

        $pendaftaranTryout = PendaftaranTryout::query()->where('id_pendaftar', $dekrip['id'])->first();

        return view('pendaftaran-tryout.info-login', compact('pendaftaranTryout'))
            ->with('timestamp', Carbon::createFromTimestamp($dekrip['timestamp'])
                ->setTimezone('Asia/Jakarta')
                ->format('Y-m-d H:i:s'));
    }

    public function index(): View
    {
        $pendaftaranTryout = PendaftaranTryout::paginate(10);

        return view('pendaftaran-tryout.index', compact('pendaftaranTryout'));
    }

    public function create(): View
    {
        $pendaftaranTryout = new PendaftaranTryout();

        return view('pendaftaran-tryout.create', compact('pendaftaranTryout'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'no_peserta' => 'nullable|string|max:50',
            'nama_lengkap' => 'required|string|max:50',
            'jenis_kelamin' => 'required|string|in:L,P',
            'nisn' => 'nullable|string|max:10',
            'nama_asal_sekolah' => 'required|string|max:50',
            'nama_ortu' => 'nullable|string|max:50',
            'no_wa_ortu' => 'required|string|max:20',
            'no_wa_peserta' => 'required|string|max:20',
            'alamat_domisili' => 'nullable|string',
            'tanggal_pembayaran' => 'nullable|date_format:Y-m-d H:i:s',
            'nominal_tagihan' => 'nullable|numeric',
        ]);

        try {
            PendaftaranTryout::create($validatedData);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('pendaftaran-tryout.index')
                ->with('error', 'Terjadi kesalahan saat membuat data.');
        }

        return redirect()->route('pendaftaran-tryout.index')
            ->with('success', 'Pendaftaran Tryout berhasil dibuat');
    }

    public function show(PendaftaranTryout $pendaftaranTryout): View
    {
        return view('pendaftaran-tryout.show', compact('pendaftaranTryout'));
    }

    public function edit(PendaftaranTryout $pendaftaranTryout): View
    {
        return view('pendaftaran-tryout.edit', compact('pendaftaranTryout'));
    }

    public function update(Request $request, PendaftaranTryout $pendaftaranTryout): RedirectResponse
    {
        $validatedData = $request->validate([
            'no_peserta' => 'nullable|string|max:50',
            'nama_lengkap' => 'required|string|max:50',
            'jenis_kelamin' => 'required|string|in:L,P',
            'nisn' => 'nullable|string|max:10',
            'nama_asal_sekolah' => 'required|string|max:50',
            'nama_ortu' => 'nullable|string|max:50',
            'no_wa_ortu' => 'required|string|max:20',
            'no_wa_peserta' => 'required|string|max:20',
            'alamat_domisili' => 'nullable|string',
            'tanggal_pembayaran' => 'nullable|date_format:Y-m-d H:i:s',
            'nominal_tagihan' => 'nullable|numeric',
        ]);

        try {
            $pendaftaranTryout->update($validatedData);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->route('pendaftaran-tryout.index')
                    ->with('error', 'Data pendaftaran tryout ini sudah digunakan dan tidak dapat diperbarui.');
            }
            return redirect()->route('pendaftaran-tryout.index')
                ->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }

        return redirect()->route('pendaftaran-tryout.index')
            ->with('success', 'Pendaftaran Tryout berhasil diperbarui');
    }

    public function destroy(PendaftaranTryout $pendaftaranTryout): RedirectResponse
    {
        try {
            $pendaftaranTryout->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->route('pendaftaran-tryout.index')
                    ->with('error', 'Data pendaftaran tryout ini sudah digunakan dan tidak dapat dihapus.');
            }
            return redirect()->route('pendaftaran-tryout.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data.');
        }

        return redirect()->route('pendaftaran-tryout.index')
            ->with('success', 'Pendaftaran Tryout berhasil dihapus');
    }
}
