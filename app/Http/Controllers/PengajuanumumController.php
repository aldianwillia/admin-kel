<?php

namespace App\Http\Controllers;

use App\Models\pengajuaumum;
use App\Models\surat_umum;
use PDF;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class PengajuanumumController extends Controller
{
    public function index()
    {
        $suratumum = surat_umum::with('penduduk')->with('KlasifikasiSurat')->get();

        // return $suratumum = surat_umum::with('penduduk')->whereHas('penduduk', function ($x) {
        //     $x->whereNotNull('nik');
        // })->with('KlasifikasiSurat')->get();

        // return $data = collect($suratumum)->map(function ($x) {
        //     return
        //         [
        //             'id'    => $x['id'],
        //             'nik'    => $x['nik'],
        //             'uraian'    => $x['kodeSurat']['uraian'],
        //         ];
        // });
        return view('admin.suratumum.index', [
            "title" => "SingelPost",
            "data" => $suratumum
        ]);
        // $title = "SingelPost";
        // return view('admin.suratumum.index', compact('suratumum', 'title'));
    }


    public function exportpdf($id)
    {
        $data = surat_umum::where('id', $id)->with('penduduk')->with('KlasifikasiSurat')->get();

        $stringNamaView = '';
        if ($data[0]['kode_surat'] === '011') {
            $stringNamaView = 'surattidakmampu';
        } else if ($data[0]['kode_surat'] === '012') {
            $stringNamaView = "suratberkelakuanbaik";
        }

        $pdf = PDF::loadview('admin.suratumum.' . $stringNamaView, [
            "data" => $data
        ])->setPaper('f4', 'potrait');
        return $pdf->stream();
    }
}