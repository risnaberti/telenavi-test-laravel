<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use \Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Woo\GridView\DataProviders\EloquentDataProvider;

class SiswaController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:siswa view', only: ['index', 'show']),
            new Middleware('permission:siswa create', only: ['create', 'store']),
            new Middleware('permission:siswa edit', only: ['edit', 'update']),
            new Middleware('permission:siswa delete', only: ['destroy']),
        ];
    }

    public function index(Request $request): View
    {
        $query = Siswa::query();

        // tambahkan kolom yang mau dikecualikan di pencarian
        $except = ['pin', 'kamar_id', 'profil', 'kamar', 'asrama', 'lokasi_asrama', 'kodeAsrama', 'status_ketua_kamar', 'tgl_mapping', 'foto', 'nisn', 'templatefinger', 'nokartu', 'kelas_id', 'longit', 'latit', 'adress', 'kodejk', 'kodejeniskeringanan', 'tahunmasuk', 'idasalsekolah'];

        $columns = collect($query->getModel()->getFillable())->filter(function ($item) use ($except) {
            return !in_array($item, $except);
        })->toArray();

        $selectedColumns = $request->get('col', $columns);

        if ($search = $request->get('search')) {
            $query->where(function ($query) use ($search, $selectedColumns) {
                foreach ($selectedColumns as $column) {
                    $query->orWhere($column, 'like', '%' . $search . '%');
                }
            });
        }

        $siswa = $query->paginate(10);

        if ($request->header('HX-Request')) {
            return view('siswa.includes.index-table', compact('siswa'));
        }

        return view('siswa.index', compact('siswa', 'columns', 'selectedColumns'));
    }

    public function create(): View
    {
        $siswa = new Siswa();

        return view('siswa.create', compact('siswa'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'no_va' => 'nullable|string|max:25',
            'idasalsekolah' => 'nullable|integer',
            'kodejk' => 'nullable|integer',
            'kodejeniskeringanan' => 'nullable|string|max:2',
            'nama' => 'nullable|string|max:100',
            'panggilan' => 'nullable|string|max:30',
            'tempatlahir' => 'nullable|string|max:50',
            'tgllahir' => 'nullable|date',
            'tahunmasuk' => 'nullable|string|max:4',
            'namabapak' => 'nullable|string|max:100',
            'namaibu' => 'nullable|string|max:100',
            'alamat' => 'nullable|string|max:255',
            'notelpon' => 'nullable|string|max:50',
            'namaori' => 'nullable|string|max:100',
            'templatefinger' => 'nullable|string',
            'nokartu' => 'nullable|string|max:50',
            'kelas_id' => 'nullable|string|max:50',
            'longit' => 'nullable|string',
            'latit' => 'nullable|string',
            'adress' => 'nullable|string',
            'pin' => 'nullable|string|max:6',
            'kamar_id' => 'nullable|string|max:20',
            'profil' => 'nullable|string',
            'kamar' => 'nullable|string|max:25',
            'asrama' => 'nullable|string|max:100',
            'lokasi_asrama' => 'nullable|string|max:20',
            'kodeAsrama' => 'nullable|string|max:20',
            'status_ketua_kamar' => 'nullable|boolean',
            'tgl_mapping' => 'nullable|date_format:Y-m-d H:i:s',
            'foto' => 'nullable|string|max:255',
            'nisn' => 'nullable|string|max:20',
        ]);

        try {
            Siswa::create($validatedData);
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('siswa.index')
                ->with('error', 'Terjadi kesalahan saat membuat data.');
        }

        return redirect()->route('siswa.index')
            ->with('success', 'Siswa berhasil dibuat');
    }

    public function show(Siswa $siswa): View
    {
        return view('siswa.show', compact('siswa'));
    }

    public function edit(Siswa $siswa): View
    {
        return view('siswa.edit', compact('siswa'));
    }

    public function update(Request $request, Siswa $siswa): RedirectResponse
    {
        $validatedData = $request->validate([
            'no_va' => 'nullable|string|max:25',
            'idasalsekolah' => 'nullable|integer',
            'kodejk' => 'nullable|integer',
            'kodejeniskeringanan' => 'nullable|string|max:2',
            'nama' => 'nullable|string|max:100',
            'panggilan' => 'nullable|string|max:30',
            'tempatlahir' => 'nullable|string|max:50',
            'tgllahir' => 'nullable|date',
            'tahunmasuk' => 'nullable|string|max:4',
            'namabapak' => 'nullable|string|max:100',
            'namaibu' => 'nullable|string|max:100',
            'alamat' => 'nullable|string|max:255',
            'notelpon' => 'nullable|string|max:50',
            'namaori' => 'nullable|string|max:100',
            'templatefinger' => 'nullable|string',
            'nokartu' => 'nullable|string|max:50',
            'kelas_id' => 'nullable|string|max:50',
            'longit' => 'nullable|string',
            'latit' => 'nullable|string',
            'adress' => 'nullable|string',
            'pin' => 'nullable|string|max:6',
            'kamar_id' => 'nullable|string|max:20',
            'profil' => 'nullable|string',
            'kamar' => 'nullable|string|max:25',
            'asrama' => 'nullable|string|max:100',
            'lokasi_asrama' => 'nullable|string|max:20',
            'kodeAsrama' => 'nullable|string|max:20',
            'status_ketua_kamar' => 'nullable|boolean',
            'tgl_mapping' => 'nullable|date_format:Y-m-d H:i:s',
            'foto' => 'nullable|string|max:255',
            'nisn' => 'nullable|string|max:20',
        ]);

        try {
            $siswa->update($validatedData);
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->route('siswa.index')
                    ->with('error', 'Data siswa ini sudah digunakan dan tidak dapat diperbarui.');
            }
            return redirect()->route('siswa.index')
                ->with('error', 'Terjadi kesalahan saat memperbarui data.');
        }

        return redirect()->route('siswa.index')
            ->with('success', 'Siswa berhasil diperbarui');
    }

    public function destroy(Siswa $siswa): RedirectResponse
    {
        try {
            $siswa->delete();
        } catch (\Illuminate\Database\QueryException $e) {
            if ($e->getCode() == '23000') {
                return redirect()->route('siswa.index')
                    ->with('error', 'Data siswa ini sudah digunakan dan tidak dapat dihapus.');
            }
            return redirect()->route('siswa.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data.');
        }

        return redirect()->route('siswa.index')
            ->with('success', 'Siswa berhasil dihapus');
    }
}
