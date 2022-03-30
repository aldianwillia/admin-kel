<?php

namespace App\Http\Controllers;

use App\Exports\pendudukExport;
use App\Models\data_penduduk;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use App\Imports\pendudukImport;

class pendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penduduk = data_penduduk::get();
        return view('admin.penduduk.index', [
            'title' => 'datapenduduk',
            'data' => $penduduk
        ]);
    }

    public function pendudukExport()
    {
        return Excel::download(new pendudukExport, 'data-Penduduk.xlsx');
    }

    public function delete($nik)
    {
        $penduduk = data_penduduk::where('nik', $nik)->first();
        $penduduk->delete();
        return redirect()->route('penduduk')->with('pesan', 'data Berhasil di Edit');
    }

    public function pendudukImport(Request $request)
    {
        Excel::import(new pendudukImport, request()->file('importFile'));
        return back();
    }

    public function detail($nik)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nik)
    {

        $penduduk = data_penduduk::where('nik', $nik)->first();

        $penduduk->nama = $request->nama;
        $penduduk->nik = $request->nik;
        $penduduk->kk = $request->kk;
        $penduduk->tmp_lahir = $request->tmp_lahir;
        $penduduk->tgl_lahir = $request->tgl_lahir;
        $penduduk->jenkel = $request->jenkel;
        $penduduk->goldar = $request->goldar;
        $penduduk->agama = $request->agama;
        $penduduk->stat_hbkel = $request->stat_hbkel;
        $penduduk->status_kawin = $request->status_kawin;
        $penduduk->pendidikan = $request->pendidikan;
        $penduduk->pekerjaan = $request->pekerjaan;
        $penduduk->nama_ibu = $request->nama_ibu;
        $penduduk->nama_ayah = $request->nama_ayah;
        $penduduk->alamat = $request->alamat;
        $penduduk->rt = $request->rt;
        $penduduk->rw = $request->rw;
        $penduduk->kelurahan = $request->kelurahan;
        $penduduk->kecamatan = $request->kecamatan;
        $penduduk->kotakab = $request->kotakab;
        $penduduk->propinsi = $request->propinsi;
        $penduduk->status_pend = $request->status_pend;

        $penduduk->save();

        return redirect()->route('penduduk')->with('pesan', 'data Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}