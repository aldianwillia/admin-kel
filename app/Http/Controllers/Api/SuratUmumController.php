<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\KodeJabatan;
use App\Models\KodeSurat;
use App\Models\surat_umum;
use Symfony\Component\HttpFoundation\Request;

class SuratUmumController extends Controller
{
    //untuk mengambil data kode surat dari DB

    function getsuratumum(Request $request)
    {
        $alldata = surat_umum::with('kode_surat')->where('nik', $request->nik)->get();
        if ($alldata) {
            return response()->json([
                'status' => true,
                'data' => $alldata
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'data tidak ada'
        ]);
    }

    public function getKodeJabatan()
    {
        $kode_jabatan = KodeJabatan::get();
        if ($kode_jabatan) {
            return response()->json([
                'status' => true,
                'jabatan' => $kode_jabatan
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'data jabatan tidak ada'
        ]);
    }

    public function getKodeSurat()
    {
        $surat = KodeSurat::where('spesifikasi_surat', 'umum')->get();
        if ($surat) {
            return response()->json([
                'status' => true,
                'kode_surat' => $surat
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'data jabatan tidak ada'
        ]);
    }

    public function submitSuratUmum(Request $request)
    {

        $suratumum = surat_umum::create([
            'nik' => $request->nik,
            'kode_surat' => $request->kode_surat,
            'kode_jabatan' => $request->kode_jabatan,
            'alasan' => $request->alasan,
            'tujuan' => $request->tujuan
        ]);
        if ($suratumum) {
            return response()->json([
                'status' => true,
                'message' => 'pengajuan berhasil dilakukan'
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'pengajuan gagal disimpan'
        ]);
    }
}