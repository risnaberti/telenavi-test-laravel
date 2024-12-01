<?php

namespace App\Http\Controllers;

use App\Models\PendaftaranTryout;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use \Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
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
            'no_peserta' => 'string|max:50',
            'nama_lengkap' => 'string|max:50',
            'jenis_kelamin' => 'string|in:L,P',
            'nisn' => 'string|max:10',
            'nama_asal_sekolah' => 'string|max:50',
            'nama_ortu' => 'string|max:50',
            'no_wa_ortu' => 'string|max:20',
            'no_wa_peserta' => 'string|max:20',
            'alamat_domisili' => 'string',
            'tanggal_pembayaran' => 'date_format:Y-m-d H:i:s',
            'nominal_tagihan' => 'numeric',
        ]);

        try {
            PendaftaranTryout::create($validatedData);
        } catch (\Illuminate\Database\QueryException $e) {
            return Redirect::route('pendaftaran-tryout.index')
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
            'no_peserta' => 'string|max:50',
            'nama_lengkap' => 'string|max:50',
            'jenis_kelamin' => 'string|in:L,P',
            'nisn' => 'string|max:10',
            'nama_asal_sekolah' => 'string|max:50',
            'nama_ortu' => 'string|max:50',
            'no_wa_ortu' => 'string|max:20',
            'no_wa_peserta' => 'string|max:20',
            'alamat_domisili' => 'string',
            'tanggal_pembayaran' => 'date_format:Y-m-d H:i:s',
            'nominal_tagihan' => 'numeric',
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
