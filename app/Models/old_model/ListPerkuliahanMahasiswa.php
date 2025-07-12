<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ListPerkuliahanMahasiswa extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    
    public $table = 'list_perkuliahan_mahasiswa';

    public $fillable = [
        'id_registrasi_mahasiswa',
        'nim',
        'nama_mahasiswa',
        'nama_program_studi',
        'angkatan',
        'id_periode_masuk',
        'id_semester',
        'nama_semester',
        'id_status_mahasiswa',
        'nama_status_mahasiswa',
        'ips',
        'ipk',
        'sks_semester',
        'sks_total',
        'biaya_kuliah_smtr',
        'id_pembiayaan',
        'status_sync',
        'id_prodi'
    ];

    protected $casts = [
        'id' => 'string',
        'id_registrasi_mahasiswa' => 'string',
        'nim' => 'string',
        'nama_mahasiswa' => 'string',
        'nama_program_studi' => 'string',
        'angkatan' => 'string',
        'id_periode_masuk' => 'string',
        'nama_semester' => 'string',
        'id_status_mahasiswa' => 'string',
        'nama_status_mahasiswa' => 'string',
        'biaya_kuliah_smtr' => 'string',
        'status_sync' => 'string',
        'id_prodi' => 'string'
    ];

    public static array $rules = [
        'id_registrasi_mahasiswa' => 'required|string|max:36',
        'nim' => 'required|string|max:255',
        'nama_mahasiswa' => 'required|string|max:255',
        'nama_program_studi' => 'required|string|max:255',
        'angkatan' => 'required|string|max:255',
        'id_periode_masuk' => 'required|string|max:255',
        'id_semester' => 'required',
        'nama_semester' => 'required|string|max:255',
        'id_status_mahasiswa' => 'required|string|max:255',
        'nama_status_mahasiswa' => 'required|string|max:255',
        'ips' => 'required',
        'ipk' => 'required',
        'sks_semester' => 'required',
        'sks_total' => 'required',
        'biaya_kuliah_smtr' => 'nullable|string|max:255',
        'id_pembiayaan' => 'nullable',
        'status_sync' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_prodi' => 'required|string|max:36'
    ];

    
}
