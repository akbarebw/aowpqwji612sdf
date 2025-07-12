<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class RencanaEvaluasi extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string'; 
    
    public $table = 'rencana_evaluasi';

    public $fillable = [
        'id_jenis_evaluasi',
        'id_rencana_evaluasi',
        'jenis_evaluasi',
        'nama_mata_kuliah',
        'kode_mata_kuliah',
        'sks_mata_kuliah',
        'nama_program_studi',
        'nama_evaluasi',
        'deskripsi_indonesia',
        'deskrips_inggris',
        'nomor_urut',
        'bobot_evaluasi',
        'status_sync',
        'id_matkul',
        'id_prodi'
    ];

    protected $casts = [
        'id' => 'string',
        'id_rencana_evaluasi' => 'string',
        'jenis_evaluasi' => 'string',
        'nama_mata_kuliah' => 'string',
        'kode_mata_kuliah' => 'string',
        'sks_mata_kuliah' => 'decimal:2',
        'nama_program_studi' => 'string',
        'nama_evaluasi' => 'string',
        'deskripsi_indonesia' => 'string',
        'deskrips_inggris' => 'string',
        'bobot_evaluasi' => 'decimal:4',
        'status_sync' => 'string',
        'id_matkul' => 'string',
        'id_prodi' => 'string'
    ];

    public static array $rules = [
        'id_jenis_evaluasi' => 'required',
        'id_rencana_evaluasi' => 'required|string|max:36',
        'jenis_evaluasi' => 'required|string|max:255',
        'nama_mata_kuliah' => 'required|string|max:255',
        'kode_mata_kuliah' => 'required|string|max:255',
        'sks_mata_kuliah' => 'required|numeric',
        'nama_program_studi' => 'required|string|max:255',
        'nama_evaluasi' => 'required|string|max:255',
        'deskripsi_indonesia' => 'required|string|max:255',
        'deskrips_inggris' => 'required|string|max:255',
        'nomor_urut' => 'required',
        'bobot_evaluasi' => 'required|numeric',
        'status_sync' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_matkul' => 'required|string|max:36',
        'id_prodi' => 'required|string|max:36'
    ];

    
}
