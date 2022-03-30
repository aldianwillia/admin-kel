<?php

namespace App\Http\Controllers;

use App\Models\data_penduduk;
use App\Models\surat_nikah;
use Illuminate\Http\Request;

class PengajuannikahController extends Controller
{
    public function index()
    {
        $suratnikah = surat_nikah::with('penduduk')->with('klasifikasiSurat')->with('penduduk_pasangan')->get();

        return view('admin.suratnikah.index', [
            "title" => "SingelPost",
            "data" => $suratnikah
        ]);
    }
}