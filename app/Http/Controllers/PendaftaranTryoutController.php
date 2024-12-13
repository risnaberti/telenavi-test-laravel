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
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use \Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Facades\Excel;
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
            new Middleware('permission:pendaftaran-tryout rekap-pendaftar', only: ['rekapPendaftar', 'rekapPendaftarDetail']),
        ];
    }

    public function index(): View
    {
        $pendaftaranTryout = PendaftaranTryout::orderBy('created_at', 'desc')->paginate(15);

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

            $siswa = Siswa::find($pendaftaranTryout->id_pendaftar);
            $siswa->update([
                'nama' => $validatedData['nama_lengkap'],
                'kodejk' => $validatedData['jenis_kelamin'] == 'L' ? 1 : 2,
                'notelpon' => $validatedData['no_wa_peserta']
            ]);

            $user = User::where("username", $pendaftaranTryout->id_pendaftar);
            $user->update([
                'name' => $validatedData['nama_lengkap'],
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->route('pendaftaran-tryout.index')
                    ->with('error', 'Data pendaftaran tryout ini sudah digunakan dan tidak dapat diperbarui.');
            }
            return redirect()->route('pendaftaran-tryout.index')
                ->with('error', 'Terjadi kesalahan saat memperbarui data. ' . $e->getMessage());
        }

        return redirect()->route('pendaftaran-tryout.index')
            ->with('success', 'Pendaftaran Tryout berhasil diperbarui');
    }

    public function destroy(PendaftaranTryout $pendaftaranTryout): RedirectResponse
    {
        try {
            DB::transaction(function () use ($pendaftaranTryout) {
                // hapus data di tabel tagihan
                $tagihan = Tagihan::find($pendaftaranTryout->id_pendaftar);

                if ($tagihan) { // harus dicek karena tagihan bisa jadi udah dihapus oleh bendahara
                    if ($tagihan->statuspembayaran == 1 && $tagihan->aktif == 0) {
                        throw new \Exception("Tagihan sudah dibayar tidak bisa menghapus pendaftar ini.", 1);
                    }

                    $tagihan->delete();
                }

                // hapus data di tabel siswa
                $siswa = Siswa::find($pendaftaranTryout->id_pendaftar);

                if ($siswa) {
                    $siswa->delete();
                }

                // hapus data di tabel pendaftaran
                $pendaftaranTryout->delete();

                // hapus data di tabel user
                User::where("username", $pendaftaranTryout->id_pendaftar)->delete();
            });
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->route('pendaftaran-tryout.index')
                    ->with('error', 'Data pendaftaran tryout ini sudah digunakan dan tidak dapat dihapus.');
            }
            return redirect()->route('pendaftaran-tryout.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data. ' . $e->getMessage());
        } catch (Exception $e) {
            return redirect()->route('pendaftaran-tryout.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data. ' . $e->getMessage());
        }

        return redirect()->route('pendaftaran-tryout.index')
            ->with('success', 'Pendaftaran Tryout berhasil dihapus');
    }

    public function rekapPendaftar()
    {
        $query = "
        SELECT 
            MONTH(created_at) AS bulan,
            YEAR(created_at) AS tahun,
            COUNT(*) AS `total_pendaftar`,
            SUM(CASE WHEN jenis_kelamin = 'L' THEN 1 ELSE 0 END) AS `L`,
            SUM(CASE WHEN jenis_kelamin = 'P' THEN 1 ELSE 0 END) AS `P`,
            SUM(CASE WHEN (tagihan.statuspembayaran = 1 AND tagihan.aktif = 0) THEN 1 ELSE 0 END) AS `sudah_bayar`,
            SUM(CASE WHEN (tagihan.statuspembayaran = 0 AND tagihan.aktif = 1) THEN 1 ELSE 0 END) AS `belum_bayar`,
            SUM(CASE WHEN (tagihan.statuspembayaran = 1 AND no_peserta is null) THEN 1 ELSE 0 END) AS `belum_cetak`
        FROM 
            pendaftaran_tryout
        LEFT JOIN tagihan ON pendaftaran_tryout.id_pendaftar = tagihan.idtagihan
        GROUP BY 
            YEAR(created_at), MONTH(created_at)
        ORDER BY 
            MIN(created_at) DESC;
        ";

        $data =  collect(DB::select($query));

        $bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

        return view('pendaftaran-tryout.rekap-pendaftar', compact('data', 'bulan'));
    }

    public function rekapPendaftarDetail(Request $request)
    {
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $status = $request->status;

        $query = PendaftaranTryout::query()
            ->leftjoin('tagihan', 'pendaftaran_tryout.id_pendaftar', '=', 'tagihan.idtagihan')
            ->leftjoin('pembayaran', 'tagihan.idtagihan', '=', 'pembayaran.idtagihan')
            ->whereMonth('created_at', $request->bulan)
            ->whereYear('created_at', $request->tahun)
            ->select('pendaftaran_tryout.*', 'created_at as tgl_daftar', 'tagihan.statuspembayaran', 'tagihan.totaltagihan', 'pembayaran.waktutransaksi as tgl_bayar');

        switch ($status) {
            case 'sudah_bayar':
                $query->whereRaw('tagihan.statuspembayaran = 1 AND tagihan.aktif = 0');
                break;
            case 'belum_bayar':
                $query->whereRaw('tagihan.statuspembayaran = 0 AND tagihan.aktif = 1');
                break;
            case 'belum_cetak':
                $query->whereRaw('tagihan.statuspembayaran = 1 AND no_peserta is null');
                break;
            default:
                break;
        }

        $data = $query->get()
            ->makeHidden(['password_login', 'tanggal_pembayaran', 'nominal_tagihan', 'updated_at', 'created_at'])
            ->map(function (PendaftaranTryout $item) {
                // Modifikasi statuspembayaran
                if ($item->statuspembayaran == 1) {
                    $item->statuspembayaran = 'LUNAS';
                } else {
                    $item->statuspembayaran = 'BELUM BAYAR';
                }

                $item->tgl_daftar = $item->created_at->format('d-m-Y H:i:s');
                $item->tgl_bayar = $item->tgl_bayar ? Carbon::parse($item->tgl_bayar)->format('d-m-Y H:i:s') : null;

                return $item;
            });

        if (!isset($data)) {
            return redirect()->back()->withErrors("Data tidak ditemukan.");
        }

        $bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"][$bulan - 1];

        return view('pendaftaran-tryout.rekap-pendaftar-detail', compact('data', 'status', 'bulan', 'tahun'));
    }

    public function rekapPendaftarExcel(Request $request)
    {
        $data = PendaftaranTryout::query()
            ->leftjoin('tagihan', 'pendaftaran_tryout.id_pendaftar', '=', 'tagihan.idtagihan')
            ->leftjoin('pembayaran', 'tagihan.idtagihan', '=', 'pembayaran.idtagihan')
            ->whereMonth('created_at', $request->bulan)
            ->whereYear('created_at', $request->tahun)
            ->select('pendaftaran_tryout.*', 'created_at as tgl_daftar', 'tagihan.statuspembayaran', 'tagihan.totaltagihan', 'pembayaran.waktutransaksi as tgl_bayar')
            ->get()
            ->makeHidden(['password_login', 'tanggal_pembayaran', 'nominal_tagihan', 'updated_at', 'created_at'])
            ->map(function (PendaftaranTryout $item) {
                // Modifikasi statuspembayaran
                if ($item->statuspembayaran == 1) {
                    $item->statuspembayaran = 'LUNAS';
                } else {
                    $item->statuspembayaran = 'BELUM BAYAR';
                }

                // Tambahkan keterangan jika statuspembayaran adalah LUNAS dan no_peserta null
                if ($item->statuspembayaran == 'LUNAS' && is_null($item->no_peserta)) {
                    $item->keterangan = 'SUDAH BAYAR BELUM CETAK KARTU';
                } else {
                    $item->keterangan = null;
                }

                $item->tgl_daftar = $item->created_at->format('d-m-Y H:i:s');
                $item->tgl_bayar = $item->tgl_bayar ? Carbon::parse($item->tgl_bayar)->format('d-m-Y H:i:s') : null;

                return $item;
            })
            ->toArray();

        if (count($data) == 0) {
            return redirect()->back()->withErrors("Data pada periode yang dipilih kosong.");
        }

        return Excel::download(new class($data) implements FromCollection, WithHeadings {
            protected $data;

            public function __construct($data)
            {
                $this->data = $data;
            }

            public function collection(): Collection
            {
                return collect($this->data);
            }

            public function headings(): array
            {
                return collect(array_keys($this->data[0]))->map(function ($item) {
                    return str()->title(str_replace('_', ' ', $item));
                })->toArray();
            }
        }, "export_pendaftar_tryout" . $request->bulan . "-" . $request->tahun . "_" . now()->format('d-m-Y') . ".xlsx");
    }

    public function laporanPembayaran(Request $request)
    {
        $laporan = PendaftaranTryout::query()
            ->join('tagihan', 'pendaftaran_tryout.id_pendaftar', '=', 'tagihan.idtagihan')
            ->join('pembayaran', 'tagihan.idtagihan', '=', 'pembayaran.idtagihan')
            ->select('pendaftaran_tryout.*', 'created_at as tgl_daftar', 'tagihan.statuspembayaran', 'tagihan.totaltagihan', 'pembayaran.waktutransaksi as tgl_bayar')
            ->orderBy('pembayaran.waktutransaksi', 'desc')
            ->paginate(15); // Gunakan paginate untuk mendapatkan objek pagination

        // echo '<pre>';
        // print_r($laporan);
        // echo '</pre>';
        // die;

        // Modifikasi statuspembayaran dan tambahkan keterangan
        $laporan->getCollection()->transform(function ($item) {
            // Modifikasi statuspembayaran
            if ($item->statuspembayaran == 1) {
                $item->statuspembayaran = 'LUNAS';
            } else {
                $item->statuspembayaran = 'BELUM BAYAR';
            }

            // Tambahkan keterangan jika statuspembayaran adalah LUNAS dan no_peserta null
            if ($item->statuspembayaran == 'LUNAS' && is_null($item->no_peserta)) {
                $item->keterangan = 'SUDAH BAYAR BELUM CETAK KARTU';
            } else {
                $item->keterangan = null;
            }

            return $item;
        });

        $totaltagihanhilang = PendaftaranTryout::leftJoin('tagihan', 'tagihan.idtagihan', '=', 'pendaftaran_tryout.id_pendaftar')
            ->where(DB::raw('SUBSTR(pendaftaran_tryout.id_pendaftar, 3, 2)'), PendaftaranTryout::$prefix)
            ->whereNull('nis')
            ->pluck('id_pendaftar')
            ->count();

        return view('pendaftaran-tryout.laporan-pembayaran', compact('laporan', 'totaltagihanhilang'));
    }

    public function regenerateTagihan()
    {
        $kodeta = Tahunajaran::query()->where('isaktif', "1")->first()?->kodeta;

        if (!$kodeta) {
            return redirect()->back()
                ->with('error', 'Tidak ada tahun ajaran aktif, hubungi admin sekolah');
        }

        return DB::transaction(function () use ($kodeta) {
            $pendaftar_tanpa_tagihan = PendaftaranTryout::leftJoin('tagihan', 'tagihan.idtagihan', '=', 'pendaftaran_tryout.id_pendaftar')
                ->where(DB::raw('SUBSTR(pendaftaran_tryout.id_pendaftar, 3, 2)'), PendaftaranTryout::$prefix)
                ->whereNull('nis')
                ->pluck('id_pendaftar')
                ->toArray();

            $count = 0;

            foreach ($pendaftar_tanpa_tagihan as $id_pendaftar) {
                // insert ke tabel tagihan
                $tagihan = Tagihan::create([
                    'idtagihan' => $id_pendaftar,
                    'nis' => $id_pendaftar,
                    'kodebulan' => now()->monthOfYear(),
                    'kodeta' => $kodeta,
                    'kodekelompok' => '91',
                    'tglgenerate' => now(),
                    'waktuawal' => now(),
                    'waktuakhir' => now()->addDays(14),
                    'aktif' => '1',
                    'statuspembayaran' => '0',
                    'urutanantrian' => '1',
                    'totaltagihan' => 15_000,
                ]);

                if ($tagihan?->idtagihan) {
                    $count++;
                }

                // insert ke tabel detailtagihan
                Detailtagihan::create([
                    'idtagihan' => $id_pendaftar,
                    'idjenistagihan' => "FO",
                    'nominal' => 15_000,
                ]);
            }

            return redirect()->back()
                ->with('success', 'Total tagihan dibuat ulang ' . $count);
        });

        // return redirect()->back()
        //     ->with('error', 'Ada error...');
    }
}
