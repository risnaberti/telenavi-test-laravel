<?php

namespace App\Http\Controllers;

use App\Models\Detailtagihan;
use App\Models\Historykelas;
use App\Models\PendaftaranTryout;
use App\Models\Siswa;
use App\Models\Tagihan;
use App\Models\Tahunajaran;
use App\Models\User;
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
        ];
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
            SUM(CASE WHEN (tagihan.statuspembayaran = 0 AND tagihan.aktif = 1) THEN 1 ELSE 0 END) AS `belum_bayar`
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

    public function rekapPendaftarExcel(Request $request)
    {
        $data = PendaftaranTryout::query()
            ->join('tagihan', 'pendaftaran_tryout.id_pendaftar', '=', 'tagihan.idtagihan')
            ->leftjoin('pembayaran', 'tagihan.idtagihan', '=', 'pembayaran.idtagihan')
            ->whereMonth('created_at', $request->bulan)
            ->whereYear('created_at', $request->tahun)
            ->select('pendaftaran_tryout.*', 'created_at as tgl_daftar', 'tagihan.statuspembayaran', 'tagihan.totaltagihan', 'pembayaran.waktutransaksi as tgl_bayar')
            ->get()
            ->makeHidden(['password_login', 'tanggal_pembayaran', 'nominal_tagihan', 'updated_at', 'created_at'])
            ->map(function ($item) {
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
                return array_keys($this->data[0]);
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

        return view('pendaftaran-tryout.laporan-pembayaran', compact('laporan'));
    }
}
