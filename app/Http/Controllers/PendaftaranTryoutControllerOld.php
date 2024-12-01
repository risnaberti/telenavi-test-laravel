<?php

namespace App\Http\Controllers;

use App\Models\PendaftaranTryout;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PendaftaranTryoutRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Routing\Controllers\Middleware;
use Woo\GridView\DataProviders\EloquentDataProvider;

class PendaftaranTryoutControllerOld extends Controller implements \Illuminate\Routing\Controllers\HasMiddleware
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

    public function daftar(Request $request) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $dataProvider = new EloquentDataProvider(PendaftaranTryout::query());
        $perPage = 15;

        return view('pendaftaran-tryout.index', compact('dataProvider', 'perPage'))
            ->with('pendaftaranTryouts', PendaftaranTryout::paginate())
            ->with('i', ($request->query('page', 1) - 1) * $perPage);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $pendaftaranTryout = new PendaftaranTryout();

        return view('pendaftaran-tryout.create', compact('pendaftaranTryout'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PendaftaranTryoutRequest $request): RedirectResponse
    {
        try {
            PendaftaranTryout::create($request->validated());
        } catch (\Illuminate\Database\QueryException $e) {
            return Redirect::route('tahun-ajaran.index')
                ->with('error', 'Terjadi kesalahan saat membuat data.');
        }

        return redirect()->route('pendaftaran-tryouts.index')
            ->with('success', 'PendaftaranTryout berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $pendaftaranTryout = PendaftaranTryout::find($id);

        return view('pendaftaran-tryout.show', compact('pendaftaranTryout'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $pendaftaranTryout = PendaftaranTryout::find($id);

        return view('pendaftaran-tryout.edit', compact('pendaftaranTryout'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PendaftaranTryoutRequest $request, PendaftaranTryout $pendaftaranTryout): RedirectResponse
    {
        try {
            $pendaftaranTryout->update($request->validated());
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->route('pendaftaran-tryout.index')
                    ->with('error', 'PendaftaranTryout ini sudah digunakan dan tidak dapat diperbarui.');
            }
            return redirect()->route('pendaftaran-tryout.index')
                ->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }

        return redirect()->route('pendaftaran-tryouts.index')
            ->with('success', 'PendaftaranTryout berhasil diperbarui.');
    }

    public function destroy($id): RedirectResponse
    {
        try {
            PendaftaranTryout::find($id)->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->route('pendaftaran-tryout.index')
                    ->with('error', 'PendaftaranTryout ini sudah digunakan dan tidak dapat dihapus.');
            }
            return redirect()->route('pendaftaran-tryout.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data.');
        }

        return redirect()->route('pendaftaran-tryouts.index')
            ->with('success', 'PendaftaranTryout berhasil dihapus.');
    }
}
