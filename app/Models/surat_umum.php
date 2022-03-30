<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surat_umum extends Model
{
    use HasFactory;
    protected $table = 'surat_umum';
    protected $fillable = ['id', 'nik', 'kode_surat', 'kode_jabatan', 'alasan', 'tujuan'];

    public function KlasifikasiSurat()
    {
        return $this->hasOne(KodeSurat::class, 'kode_surat', 'kode_surat');
    }
    public function kode_surat()
    {
        return $this->hasOne(KodeSurat::class, 'kode_surat', 'kode_surat');
    }

    public function penduduk()
    {
        return $this->hasOne(data_penduduk::class, 'nik', 'nik');
    }
}