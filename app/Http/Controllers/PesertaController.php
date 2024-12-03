<?php

namespace App\Http\Controllers;

use App\Models\PendaftaranTryout;
use App\Models\Tagihan;
use Illuminate\Http\Request;
use \Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PesertaController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:peserta kartu-tryout', only: ['kartuTryout']),
            new Middleware('permission:peserta cara-pembayaran', only: ['caraPembayaran']),
        ];
    }

    public function kartuTryout(Request $request)
    {
        $peserta = PendaftaranTryout::query()->where('no_peserta', $request->user()->username)->first();

        $tagihan = Tagihan::query()->where('idtagihan', $peserta->id_pendaftar)->first();

        // echo '<pre>';
        // print_r($tagihan);
        // echo '</pre>';
        // die;

        return view('peserta.kartu-tryout', compact('peserta', 'tagihan'));
    }

    public function caraPembayaran(Request $request)
    {
        $peserta = PendaftaranTryout::query()->where('no_peserta', $request->user()->username)->first();

        $tagihan = Tagihan::query()->where('idtagihan', $peserta->id_pendaftar)->first();

        return view('peserta.cara-pembayaran', compact('peserta', 'tagihan'));
    }
}
