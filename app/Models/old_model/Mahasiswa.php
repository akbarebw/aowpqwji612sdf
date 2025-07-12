<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Mahasiswa extends Model
{
    use HasUuids;

    public $incrementing = false;   
    protected $keyType = 'string';
    
    public $table = 'mahasiswa';

    public $fillable = [
        'nama_mahasiswa',
        'jenis_kelamin',
        'tanggal_lahir',
        'nipd',
        'ipk',
        'total_sks',
        'id_sms',
        'id_mahasiswa',
        'id_agama',
        'nama_agama',
        'nama_program_studi',
        'id_status_mahasiswa',
        'nama_status_mahasiswa',
        'nim',
        'id_periode',
        'nama_periode_masuk',
        'id_registrasi_mahasiswa',
        'id_periode_keluar',
        'tanggal_keluar',
        'last_update',
        'tgl_create',
        'status_sync',
        'id_perguruan_tinggi',
        'id_prodi'
    ];

    protected $casts = [
        'id' => 'string',
        'nama_mahasiswa' => 'string',
        'jenis_kelamin' => 'string',
        'tanggal_lahir' => 'date',
        'nipd' => 'string',
        'ipk' => 'decimal:2',
        'total_sks' => 'decimal:2',
        'id_sms' => 'string',
        'id_mahasiswa' => 'string',
        'nama_agama' => 'string',
        'nama_program_studi' => 'string',
        'id_status_mahasiswa' => 'string',
        'nama_status_mahasiswa' => 'string',
        'nim' => 'string',
        'id_periode' => 'string',
        'nama_periode_masuk' => 'string',
        'id_registrasi_mahasiswa' => 'string',
        'id_periode_masuk' => 'string',
        'tanggal_keluar' => 'date',
        'last_update' => 'date',
        'tgl_create' => 'date',
        'status_sync' => 'string',
        'id_perguruan_tinggi' => 'string',
        'id_prodi' => 'string'
    ];

    public static array $rules = [
        'nama_mahasiswa' => 'required|string|max:255',
        'jenis_kelamin' => 'required|string|max:255',
        'tanggal_lahir' => 'required',
        'nipd' => 'required|string|max:255',
        'ipk' => 'required|numeric',
        'total_sks' => 'nullable|numeric',
        'id_sms' => 'required|string|max:36',
        'id_mahasiswa' => 'required|string|max:36',
        'id_agama' => 'required',
        'nama_agama' => 'required|string|max:255',
        'nama_program_studi' => 'required|string|max:255',
        'id_status_mahasiswa' => 'required|string|max:36',
        'nama_status_mahasiswa' => 'required|string|max:255',
        'nim' => 'required|string|max:255',
        'id_periode' => 'required|string|max:255',
        'nama_periode_masuk' => 'required|string|max:255',
        'id_registrasi_mahasiswa' => 'required|string|max:36',
        'id_periode_masuk' => 'required|string|max:255',
        'tanggal_keluar' => 'required',
        'last_update' => 'required',
        'tgl_create' => 'required',
        'status_sync' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_perguruan_tinggi' => 'required|string|max:36',
        'id_prodi' => 'required|string|max:36'
    ];

    
}
