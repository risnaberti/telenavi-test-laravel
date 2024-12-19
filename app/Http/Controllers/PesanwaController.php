<?php

namespace App\Http\Controllers;

use App\Models\Pesanwa;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use \Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Woo\GridView\DataProviders\EloquentDataProvider;

class PesanwaController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:pesanwa view', only: ['index', 'show']),
            new Middleware('permission:pesanwa create', only: ['create', 'store']),
            new Middleware('permission:pesanwa edit', only: ['edit', 'update']),
            new Middleware('permission:pesanwa delete', only: ['destroy']),
        ];
    }

    public function index(Request $request): View
    {
        $query = Pesanwa::query();

        if ($request->has('search')) {
            $columns = $query->getModel()->getFillable();

            $query->where(function ($q) use ($request, $columns) {
                foreach ($columns as $column) {
                    $q->orWhere($column, 'like', '%' . $request->search . '%');
                }
            });
        }

        $pesanwa = $query->paginate(10);

        if ($request->header('HX-Request')) {
            return view('pesanwa.index-table', compact('pesanwa'));
        }

        return view('pesanwa.index', compact('pesanwa'));
    }

    public function create(): View
    {
        $pesanwa = new Pesanwa();

        return view('pesanwa.create', compact('pesanwa'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'isi_pesan' => 'nullable|string',
            'tgl_kirim' => 'nullable|date_format:Y-m-d H:i:s',
            'status_pesan' => 'nullable|string|max:255',
            'no_pendaftaran' => 'nullable|string|max:50',
            'jenis_pesan' => 'nullable|string|max:50',
            'no_hp' => 'nullable|string|max:50',
        ]);

        try {
            Pesanwa::create($validatedData);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('pesanwa.index')
                ->with('error', 'Terjadi kesalahan saat membuat data.');
        }

        return redirect()->route('pesanwa.index')
            ->with('success', 'Pesanwa berhasil dibuat');
    }

    public function show(Pesanwa $pesanwa): View
    {
        return view('pesanwa.show', compact('pesanwa'));
    }

    public function edit(Pesanwa $pesanwa): View
    {
        return view('pesanwa.edit', compact('pesanwa'));
    }

    public function update(Request $request, Pesanwa $pesanwa): RedirectResponse
    {
        $validatedData = $request->validate([
            'isi_pesan' => 'nullable|string',
            'tgl_kirim' => 'nullable|date_format:Y-m-d H:i:s',
            'status_pesan' => 'nullable|string|max:255',
            'no_pendaftaran' => 'nullable|string|max:50',
            'jenis_pesan' => 'nullable|string|max:50',
            'no_hp' => 'nullable|string|max:50',
        ]);

        try {
            $pesanwa->update($validatedData);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->route('pesanwa.index')
                    ->with('error', 'Data pesanwa ini sudah digunakan dan tidak dapat diperbarui.');
            }
            return redirect()->route('pesanwa.index')
                ->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }

        return redirect()->route('pesanwa.index')
            ->with('success', 'Pesanwa berhasil diperbarui');
    }

    public function destroy(Pesanwa $pesanwa): RedirectResponse
    {
        try {
            $pesanwa->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->route('pesanwa.index')
                    ->with('error', 'Data pesanwa ini sudah digunakan dan tidak dapat dihapus.');
            }
            return redirect()->route('pesanwa.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data.');
        }

        return redirect()->route('pesanwa.index')
            ->with('success', 'Pesanwa berhasil dihapus');
    }
}
