<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ExportDataMahasiswa extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    
    public $table = 'export_data_mahasiswa';

    public $fillable = [
        'angkatan',
        'nim',
        'nama_mahasiswa',
        'program_studi',
        'periode_masuk',
        'status_mahasiswa',
        'nama_jenis_daftar',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'id_agama',
        'nama_agama',
        'status_sync',
        'id_mahasiswa',
        'id_registrasi_mahasiswa',
        'id_prodi',
        'id_jenis_daftar'
    ];

    protected $casts = [
        'id' => 'string',
        'angkatan' => 'string',
        'nim' => 'string',
        'nama_mahasiswa' => 'string',
        'program_studi' => 'string',
        'periode_masuk' => 'string',
        'status_mahasiswa' => 'string',
        'nama_jenis_daftar' => 'string',
        'jenis_kelamin' => 'string',
        'tempat_lahir' => 'string',
        'tanggal_lahir' => 'date',
        'nama_agama' => 'string',
        'status_sync' => 'string',
        'id_mahasiswa' => 'string',
        'id_registrasi_mahasiswa' => 'string',
        'id_prodi' => 'string',
        'id_jenis_daftar' => 'string'
    ];

    public static array $rules = [
        'angkatan' => 'required|string|max:255',
        'nim' => 'required|string|max:255',
        'nama_mahasiswa' => 'required|string|max:255',
        'program_studi' => 'required|string|max:255',
        'periode_masuk' => 'required|string|max:255',
        'status_mahasiswa' => 'required|string|max:255',
        'nama_jenis_daftar' => 'required|string|max:255',
        'jenis_kelamin' => 'required|string|max:255',
        'tempat_lahir' => 'required|string|max:255',
        'tanggal_lahir' => 'required',
        'id_agama' => 'required',
        'nama_agama' => 'required|string|max:255',
        'status_sync' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_mahasiswa' => 'required|string|max:36',
        'id_registrasi_mahasiswa' => 'required|string|max:36',
        'id_prodi' => 'required|string|max:36',
        'id_jenis_daftar' => 'required|string|max:36'
    ];

    
}
