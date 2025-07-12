<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class RekapKrsMahasiswa extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    public $table = 'rekap_krs_mahasiswa';

    public $fillable = [
        'nama_program_studi',
        'id_periode',
        'nama_periode',
        'nim',
        'nama_mahasiswa',
        'angkatan',
        'id_semester',
        'kode_mata_kuliah',
        'nama_mata_kuliah',
        'sks_mata_kuliah',
        'id_prodi',
        'id_registrasi_mahasiswa',
        'id_matkul'
    ];

    protected $casts = [
        'id' => 'string',
        'nama_program_studi' => 'string',
        'nama_periode' => 'string',
        'nim' => 'string',
        'nama_mahasiswa' => 'string',
        'kode_mata_kuliah' => 'string',
        'nama_mata_kuliah' => 'string',
        'sks_mata_kuliah' => 'decimal:2',
        'id_prodi' => 'string',
        'id_registrasi_mahasiswa' => 'string',
        'id_matkul' => 'string'
    ];

    public static array $rules = [
        'nama_program_studi' => 'required|string|max:255',
        'id_periode' => 'required',
        'nama_periode' => 'required|string|max:255',
        'nim' => 'required|string|max:255',
        'nama_mahasiswa' => 'required|string|max:255',
        'angkatan' => 'required',
        'id_semester' => 'required',
        'kode_mata_kuliah' => 'required|string|max:255',
        'nama_mata_kuliah' => 'required|string|max:255',
        'sks_mata_kuliah' => 'required|numeric',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_prodi' => 'required|string|max:36',
        'id_registrasi_mahasiswa' => 'required|string|max:36',
        'id_matkul' => 'required|string|max:36'
    ];

    
}
