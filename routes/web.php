<?php

use App\Exports\pendudukExport;
use App\Http\Controllers\datapendudukController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\pendudukController;
use App\Http\Controllers\PengajuannikahController;
use App\Http\Controllers\PengajuanumumController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Home
Route::get('/', [HomeController::class, 'index'])->name('home');

//Surat umum
Route::get('suratumum', [PengajuanumumController::class, 'index'])->name('suratumum');
Route::get('exportpdf/{id}', [PengajuanumumController::class, 'exportpdf'])->name('exportpdf');


//Surat Nikah
Route::get('suratnikah', [PengajuannikahController::class, 'index'])->name('suratnikah');

//Penduduk
Route::get('datapenduduks', [pendudukController::class, 'index'])->name('penduduk');
Route::post('datapenduduk/update/{nik}', [pendudukController::class, 'update'])->name('datapenduduk.update');
Route::get('datapenduduk/delete/{nik}', [pendudukController::class, 'delete'])->name('datapenduduk.delete');
Route::get('pendudukexport', [pendudukController::class, 'pendudukExport'])->name('pendudukExport');
Route::Post('pendudukImport', [pendudukController::class, 'pendudukImport'])->name('pendudukImport');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';