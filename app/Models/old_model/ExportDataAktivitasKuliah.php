<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ExportDataAktivitasKuliah extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    
    public $table = 'export_data_aktivitas_kuliah';

    public $fillable = [
        'id_periode',
        'nama_periode',
        'id_registrasi_mahasiswa',
        'nim',
        'nama_mahasiswa',
        'nama_status_mahasiswa',
        'ips',
        'sks_semester',
        'ipk',
        'total_sks',
        'status_sync',
        'id_prodi',
        'id_status_mahasiswa'
    ];

    protected $casts = [
        'id' => 'string',
        'id_periode' => 'string',
        'nama_periode' => 'string',
        'id_registrasi_mahasiswa' => 'string',
        'nim' => 'string',
        'nama_mahasiswa' => 'string',
        'nama_status_mahasiswa' => 'string',
        'ips' => 'string',
        'sks_semester' => 'decimal:2',
        'ipk' => 'string',
        'total_sks' => 'decimal:2',
        'status_sync' => 'string',
        'id_prodi' => 'string',
        'id_status_mahasiswa' => 'string'
    ];

    public static array $rules = [
        'id_periode' => 'required|string|max:255',
        'nama_periode' => 'required|string|max:255',
        'id_registrasi_mahasiswa' => 'required|string|max:36',
        'nim' => 'required|string|max:255',
        'nama_mahasiswa' => 'required|string|max:255',
        'nama_status_mahasiswa' => 'required|string|max:255',
        'ips' => 'required|string|max:255',
        'sks_semester' => 'required|numeric',
        'ipk' => 'required|string|max:255',
        'total_sks' => 'required|numeric',
        'status_sync' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_prodi' => 'required|string|max:36',
        'id_status_mahasiswa' => 'required|string|max:36'
    ];

    
}
