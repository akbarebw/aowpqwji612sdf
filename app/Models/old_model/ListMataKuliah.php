<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ListMataKuliah extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    
    public $table = 'list_mata_kuliah';

    public $fillable = [
        'id_jenj_didik',
        'tgl_create',
        'id_matkul',
        'jns_mk',
        'kel_mk',
        'kode_mata_kuliah',
        'nama_mata_kuliah',
        'sks_mata_kuliah',
        'id_prodi',
        'nama_program_studi',
        'id_jenis_mata_kuliah',
        'id_kelompok_mata_kuliah',
        'sks_tatap_muka',
        'sks_praktek',
        'sks_praktek_lapangan',
        'sks_simulasi',
        'metode_kuliah',
        'ada_sap',
        'ada_silabus',
        'ada_bahan_ajar',
        'ada_acara_praktek',
        'ada_diktat',
        'tanggal_mulai_efektif',
        'tanggal_selesai_efektif',
        'nama_kelompok_mata_kuliah',
        'nama_jenis_mata_kuliah',
        'status_sync'
    ];

    protected $casts = [
        'id' => 'string',
        'tgl_create' => 'datetime',
        'id_matkul' => 'string',
        'jns_mk' => 'string',
        'kel_mk' => 'string',
        'nama_mata_kuliah' => 'string',
        'sks_mata_kuliah' => 'decimal:2',
        'id_prodi' => 'string',
        'nama_program_studi' => 'string',
        'id_jenis_mata_kuliah' => 'string',
        'id_kelompok_mata_kuliah' => 'string',
        'sks_tatap_muka' => 'decimal:2',
        'sks_praktek' => 'decimal:2',
        'sks_praktek_lapangan' => 'decimal:2',
        'sks_simulasi' => 'decimal:2',
        'metode_kuliah' => 'string',
        'tanggal_mulai_efektif' => 'datetime',
        'tanggal_selesai_efektif' => 'datetime',
        'nama_kelompok_mata_kuliah' => 'string',
        'nama_jenis_mata_kuliah' => 'string',
        'status_sync' => 'string'
    ];

    public static array $rules = [
        'id_jenj_didik' => 'required',
        'tgl_create' => 'required',
        'id_matkul' => 'required|string|max:36',
        'jns_mk' => 'nullable|string|max:255',
        'kel_mk' => 'nullable|string|max:255',
        'kode_mata_kuliah' => 'required',
        'nama_mata_kuliah' => 'required|string|max:255',
        'sks_mata_kuliah' => 'required|numeric',
        'id_prodi' => 'required|string|max:36',
        'nama_program_studi' => 'required|string|max:255',
        'id_jenis_mata_kuliah' => 'nullable|string|max:255',
        'id_kelompok_mata_kuliah' => 'nullable|string|max:255',
        'sks_tatap_muka' => 'nullable|numeric',
        'sks_praktek' => 'nullable|numeric',
        'sks_praktek_lapangan' => 'nullable|numeric',
        'sks_simulasi' => 'nullable|numeric',
        'metode_kuliah' => 'nullable|string|max:255',
        'ada_sap' => 'nullable',
        'ada_silabus' => 'nullable',
        'ada_bahan_ajar' => 'nullable',
        'ada_acara_praktek' => 'nullable',
        'ada_diktat' => 'nullable',
        'tanggal_mulai_efektif' => 'nullable',
        'tanggal_selesai_efektif' => 'nullable',
        'nama_kelompok_mata_kuliah' => 'nullable|string|max:255',
        'nama_jenis_mata_kuliah' => 'nullable|string|max:255',
        'status_sync' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
