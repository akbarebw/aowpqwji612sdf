<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ExportDataMatkulProdi extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    
    public $table = 'export_data_matkul_prodi';

    public $fillable = [
        'id_program_studi',
        'nama_program_studi',
        'kode_mata_kuliah',
        'nama_mata_kuliah',
        'sks_mata_kuliah',
        'id_jenis_mata_kuliah',
        'id_kelompok_mata_kuliah',
        'status_sync',
        'id_matkul'
    ];

    protected $casts = [
        'id' => 'string',
        'id_program_studi' => 'string',
        'nama_program_studi' => 'string',
        'kode_mata_kuliah' => 'string',
        'nama_mata_kuliah' => 'string',
        'sks_mata_kuliah' => 'decimal:2',
        'id_jenis_mata_kuliah' => 'string',
        'id_kelompok_mata_kuliah' => 'string',
        'status_sync' => 'string',
        'id_matkul' => 'string'
    ];

    public static array $rules = [
        'id_program_studi' => 'required|string|max:36',
        'nama_program_studi' => 'required|string|max:255',
        'kode_mata_kuliah' => 'required|string|max:255',
        'nama_mata_kuliah' => 'required|string|max:255',
        'sks_mata_kuliah' => 'required|numeric',
        'id_jenis_mata_kuliah' => 'required|string|max:255',
        'id_kelompok_mata_kuliah' => 'nullable|string|max:255',
        'status_sync' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_matkul' => 'required|string|max:36'
    ];

    
}
