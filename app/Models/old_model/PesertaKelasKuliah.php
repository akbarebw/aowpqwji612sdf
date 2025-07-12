<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class PesertaKelasKuliah extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    public $table = 'peserta_kelas_kuliah';

    public $fillable = [
        'nama_kelas_kuliah',
        'nim',
        'nama_mahasiswa',
        'kode_mata_kuliah',
        'nama_mata_kuliah',
        'nama_program_studi',
        'angkatan',
        'status_sync',
        'id_kelas_kuliah',
        'id_registrasi_mahasiswa',
        'id_mahasiswa',
        'id_matkul',
        'id_prodi'
    ];

    protected $casts = [
        'id' => 'string',
        'nama_kelas_kuliah' => 'string',
        'nim' => 'string',
        'nama_mahasiswa' => 'string',
        'kode_mata_kuliah' => 'string',
        'nama_mata_kuliah' => 'string',
        'nama_program_studi' => 'string',
        'angkatan' => 'decimal:2',
        'status_sync' => 'string',
        'id_kelas_kuliah' => 'string',
        'id_registrasi_mahasiswa' => 'string',
        'id_mahasiswa' => 'string',
        'id_matkul' => 'string',
        'id_prodi' => 'string'
    ];

    public static array $rules = [
        'nama_kelas_kuliah' => 'required|string|max:255',
        'nim' => 'required|string|max:255',
        'nama_mahasiswa' => 'required|string|max:255',
        'kode_mata_kuliah' => 'required|string|max:255',
        'nama_mata_kuliah' => 'required|string|max:255',
        'nama_program_studi' => 'required|string|max:255',
        'angkatan' => 'required|numeric',
        'status_sync' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_kelas_kuliah' => 'required|string|max:36',
        'id_registrasi_mahasiswa' => 'required|string|max:36',
        'id_mahasiswa' => 'required|string|max:36',
        'id_matkul' => 'required|string|max:36',
        'id_prodi' => 'required|string|max:36'
    ];

    
}
