<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class DetailPerkuliahanMahasiswa extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string'; 
    
    public $table = 'detail_perkuliahan_mahasiswa';

    public $fillable = [
        'id_registrasi_mahasiswa',
        'id_prodi',
        'nama_program_studi',
        'angkatan',
        'id_semester',
        'nim',
        'nama_mahasiswa',
        'nama_semester',
        'id_status_mahasiswa',
        'nama_status_mahasiswa',
        'ips',
        'ipk',
        'sks_semester',
        'sks_total',
        'status_sync',
    ];

    protected $casts = [
        'id' => 'string',
        'id_prodi' => 'string',
        'nama_program_studi' => 'string',
        'nim' => 'string',
        'nama_mahasiswa' => 'string',
        'nama_semester' => 'string',
        'id_status_mahasiswa' => 'string',
        'nama_status_mahasiswa' => 'string',
        'ips' => 'decimal:2',
        'ipk' => 'decimal:2',
        'status_sync' => 'string',
        'id_registrasi_mahasiswa' => 'string'
    ];

    public static array $rules = [
        'id_prodi' => 'required|string|max:36',
        'nama_program_studi' => 'required|string|max:255',
        'angkatan' => 'required',
        'id_semester' => 'required',
        'nim' => 'required|string|max:255',
        'nama_mahasiswa' => 'required|string|max:255',
        'nama_semester' => 'required|string|max:255',
        'id_status_mahasiswa' => 'required|string|max:36',
        'nama_status_mahasiswa' => 'required|string|max:255',
        'ips' => 'nullable|numeric',
        'ipk' => 'nullable|numeric',
        'sks_semester' => 'nullable',
        'sks_total' => 'nullable',
        'status_sync' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_registrasi_mahasiswa' => 'required|string|max:36'
    ];

    
}
