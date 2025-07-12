<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class MatkulKurikulum extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    
    public $table = 'matkul_kurikulum';

    public $fillable = [
        'tgl_create',
        'id_kurikulum',
        'nama_kurikulum',
        'kode_mata_kuliah',
        'nama_mata_kuliah',
        'nama_program_studi',
        'semester',
        'semester_mulai_berlaku',
        'sks_mata_kuliah',
        'sks_tatap_muka',
        'sks_praktek',
        'sks_praktek_lapangan',
        'sks_simulasi',
        'apakah_wajib',
        'status_sync',
        'id_semester',
        'id_prodi',
        'id_matkul'
    ];

    protected $casts = [
        'id' => 'string',
        'tgl_create' => 'date',
        'id_kurikulum' => 'string',
        'nama_kurikulum' => 'string',
        'kode_mata_kuliah' => 'string',
        'nama_mata_kuliah' => 'string',
        'nama_program_studi' => 'string',
        'semester_mulai_berlaku' => 'string',
        'status_sync' => 'string',
        'id_prodi' => 'string',
        'id_matkul' => 'string'
    ];

    public static array $rules = [
        'tgl_create' => 'required',
        'id_kurikulum' => 'required|string|max:36',
        'nama_kurikulum' => 'required|string|max:255',
        'kode_mata_kuliah' => 'required|string|max:255',
        'nama_mata_kuliah' => 'required|string|max:255',
        'nama_program_studi' => 'required|string|max:255',
        'semester' => 'required',
        'semester_mulai_berlaku' => 'required|string|max:255',
        'sks_mata_kuliah' => 'required',
        'sks_tatap_muka' => 'required',
        'sks_praktek' => 'required',
        'sks_praktek_lapangan' => 'required',
        'sks_simulasi' => 'required',
        'apakah_wajib' => 'required',
        'status_sync' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_semester' => 'required',
        'id_prodi' => 'required|string|max:36',
        'id_matkul' => 'required|string|max:36'
    ];

    
}
