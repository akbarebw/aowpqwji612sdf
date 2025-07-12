<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class KrsMahasiswa extends Model
{
    use HasUuids;
    public $incrementing = false;
    protected $keyType = 'string';
    
    public $table = 'krs_mahasiswa';

    public $fillable = [
        'id_periode',
        'nama_program_studi',
        'kode_mata_kuliah',
        'nama_mata_kuliah',
        'id_kelas',
        'nama_kelas_kuliah',
        'sks_mata_kuliah',
        'nim',
        'nama_mahasiswa',
        'angkatan',
        'id_registrasi_mahasiswa',
        'id_prodi',
        'id_matkul'
    ];

    protected $casts = [
        'id' => 'string',
        'nama_program_studi' => 'string',
        'kode_mata_kuliah' => 'string',
        'nama_mata_kuliah' => 'string',
        'id_kelas' => 'string',
        'nama_kelas_kuliah' => 'string',
        'sks_mata_kuliah' => 'decimal:2',
        'nim' => 'string',
        'nama_mahasiswa' => 'string',
        'id_registrasi_mahasiswa' => 'string',
        'id_prodi' => 'string',
        'id_matkul' => 'string'
    ];

    public static array $rules = [
        'id_periode' => 'required',
        'nama_program_studi' => 'required|string|max:255',
        'kode_mata_kuliah' => 'required|string|max:255',
        'nama_mata_kuliah' => 'required|string|max:255',
        'id_kelas' => 'required|string|max:36',
        'nama_kelas_kuliah' => 'required|string|max:255',
        'sks_mata_kuliah' => 'required|numeric',
        'nim' => 'required|string|max:255',
        'nama_mahasiswa' => 'required|string|max:255',
        'angkatan' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_registrasi_mahasiswa' => 'required|string|max:36',
        'id_prodi' => 'required|string|max:36',
        'id_matkul' => 'required|string|max:36'
    ];

    
}
