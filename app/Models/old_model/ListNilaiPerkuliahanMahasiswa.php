<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ListNilaiPerkuliahanMahasiswa extends Model
{

    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    
    public $table = 'list_nilai_perkuliahan_mahasiswa';

    public $fillable = [
        'id_registrasi_mahasiswa',
        'nim',
        'nama_mahasiswa',
        'nama_program_studi',
        'angkatan',
        'id_periode_masuk',
        'id_semester',
        'nama_semester',
        'nama_status_mahasiswa',
        'ips',
        'ipk',
        'sks_semester',
        'sks_total',
        'biaya_kuliah_smt',
        'id_pembiayaan',
        'status_sync',
        'id_prodi',
        'id_status_mahasiswa'
    ];

    protected $casts = [
        'id' => 'string',
        'id_registrasi_mahasiswa' => 'string',
        'nim' => 'string',
        'nama_mahasiswa' => 'string',
        'nama_program_studi' => 'string',
        'id_periode_masuk' => 'string',
        'nama_semester' => 'string',
        'nama_status_mahasiswa' => 'string',
        'ips' => 'decimal:2',
        'ipk' => 'decimal:2',
        'status_sync' => 'string',
        'id_prodi' => 'string',
        'id_status_mahasiswa' => 'string'
    ];

    public static array $rules = [
        'id_registrasi_mahasiswa' => 'required|string|max:36',
        'nim' => 'required|string|max:255',
        'nama_mahasiswa' => 'required|string|max:255',
        'nama_program_studi' => 'required|string|max:255',
        'angkatan' => 'required',
        'id_periode_masuk' => 'required|string|max:255',
        'id_semester' => 'required',
        'nama_semester' => 'required|string|max:255',
        'nama_status_mahasiswa' => 'required|string|max:255',
        'ips' => 'required|numeric',
        'ipk' => 'required|numeric',
        'sks_semester' => 'required',
        'sks_total' => 'required',
        'biaya_kuliah_smt' => 'nullable',
        'id_pembiayaan' => 'required',
        'status_sync' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_prodi' => 'required|string|max:36',
        'id_status_mahasiswa' => 'required|string|max:36'
    ];

    
}
