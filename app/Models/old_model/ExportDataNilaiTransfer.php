<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ExportDataNilaiTransfer extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    
    public $table = 'export_data_nilai_transfer';

    public $fillable = [
        'periode',
        'id_registrasi_mahasiswa',
        'id_mahasiswa',
        'nim',
        'nama_mahasiswa',
        'id_prodi',
        'program_studi',
        'angkatan',
        'id_transfer',
        'kode_matkul_asal',
        'nama_mata_kuliah_asal',
        'sks_mata_kuliah_asal',
        'nilai_huruf_asal',
        'kode_matkul_baru',
        'nama_mata_kuliah_baru',
        'sks_mata_kuliah_diakui',
        'nilai_huruf_diakui',
        'nilai_angka_diakui',
        'status_sync'
    ];

    protected $casts = [
        'id' => 'string',
        'id_registrasi_mahasiswa' => 'string',
        'id_mahasiswa' => 'string',
        'nim' => 'string',
        'nama_mahasiswa' => 'string',
        'id_prodi' => 'string',
        'program_studi' => 'string',
        'id_transfer' => 'string',
        'kode_matkul_asal' => 'string',
        'nama_mata_kuliah_asal' => 'string',
        'nilai_huruf_asal' => 'string',
        'kode_matkul_baru' => 'string',
        'nama_mata_kuliah_baru' => 'string',
        'nilai_huruf_diakui' => 'string',
        'nilai_angka_diakui' => 'decimal:2',
        'status_sync' => 'string'
    ];

    public static array $rules = [
        'periode' => 'required',
        'id_registrasi_mahasiswa' => 'required|string|max:36',
        'id_mahasiswa' => 'required|string|max:36',
        'nim' => 'required|string|max:255',
        'nama_mahasiswa' => 'required|string|max:255',
        'id_prodi' => 'required|string|max:36',
        'program_studi' => 'required|string|max:255',
        'angkatan' => 'required',
        'id_transfer' => 'required|string|max:36',
        'kode_matkul_asal' => 'required|string|max:255',
        'nama_mata_kuliah_asal' => 'required|string|max:255',
        'sks_mata_kuliah_asal' => 'required',
        'nilai_huruf_asal' => 'required|string|max:255',
        'kode_matkul_baru' => 'required|string|max:255',
        'nama_mata_kuliah_baru' => 'required|string|max:255',
        'sks_mata_kuliah_diakui' => 'required',
        'nilai_huruf_diakui' => 'required|string|max:255',
        'nilai_angka_diakui' => 'required|numeric',
        'status_sync' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
