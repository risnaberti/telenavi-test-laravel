<?php

namespace App\Http\Controllers;

use App\Models\PendaftaranTryout;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('landing.index');
    }
}
