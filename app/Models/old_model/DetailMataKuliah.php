<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class DetailMataKuliah extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    
    public $table = 'detail_mata_kuliah';

    public $fillable = [
        'kode_mata_kuliah',
        'nama_mata_kuliah',
        'nama_program_studi',
        'id_jenis_mata_kuliah',
        'id_kelompok_mata_kuliah',
        'sks_mata_kuliah',
        'sks_tatap_muka',
        'sks_praktek',
        'sks_praktek_lapangan',
        'sks_semulasi',
        'metode_kuliah',
        'ada_sap',
        'ada_silabus',
        'ada_bahan_ajar',
        'ada_acara_praktek',
        'ada_diktat',
        'tanggal_mulai_efektif',
        'tanggal_selesai_efektif',
        'id_matkul',
        'id_prodi'
    ];

    protected $casts = [
        'id' => 'string',
        'kode_mata_kuliah' => 'string',
        'nama_mata_kuliah' => 'string',
        'nama_program_studi' => 'string',
        'id_jenis_mata_kuliah' => 'string',
        'id_kelompok_mata_kuliah' => 'string',
        'metode_kuliah' => 'string',
        'ada_sap' => 'string',
        'ada_silabus' => 'string',
        'ada_bahan_ajar' => 'string',
        'ada_acara_praktek' => 'string',
        'ada_diktat' => 'string',
        'tanggal_mulai_efektif' => 'datetime',
        'tanggal_selesai_efektif' => 'datetime',
        'id_matkul' => 'string',
        'id_prodi' => 'string'
    ];

    public static array $rules = [
        'kode_mata_kuliah' => 'required|string|max:255',
        'nama_mata_kuliah' => 'required|string|max:255',
        'nama_program_studi' => 'required|string|max:255',
        'id_jenis_mata_kuliah' => 'required|string|max:255',
        'id_kelompok_mata_kuliah' => 'nullable|string|max:255',
        'sks_mata_kuliah' => 'required',
        'sks_tatap_muka' => 'required',
        'sks_praktek' => 'required',
        'sks_praktek_lapangan' => 'required',
        'sks_semulasi' => 'required',
        'metode_kuliah' => 'nullable|string|max:255',
        'ada_sap' => 'nullable|string|max:255',
        'ada_silabus' => 'nullable|string|max:255',
        'ada_bahan_ajar' => 'nullable|string|max:255',
        'ada_acara_praktek' => 'nullable|string|max:255',
        'ada_diktat' => 'nullable|string|max:255',
        'tanggal_mulai_efektif' => 'nullable',
        'tanggal_selesai_efektif' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_matkul' => 'required|string|max:36',
        'id_prodi' => 'required|string|max:36'
    ];

    
}
