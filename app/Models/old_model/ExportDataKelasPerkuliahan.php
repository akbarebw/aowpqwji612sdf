<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ExportDataKelasPerkuliahan extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    
    public $table = 'export_data_kelas_perkuliahan';

    public $fillable = [
        'nama_program_studi',
        'id_periode',
        'nama_periode',
        'kode_mata_kuliah',
        'nama_mata_kuliah',
        'nama_kelas_kuliah',
        'sks_mata_kuliah',
        'jumlah_krs',
        'jumlah_dosen',
        'status_sync',
        'id_prodi',
        'id_matkul',
        'id_kelas_kuliah'
    ];

    protected $casts = [
        'id' => 'string',
        'nama_program_studi' => 'string',
        'id_periode' => 'string',
        'nama_periode' => 'string',
        'kode_mata_kuliah' => 'string',
        'nama_mata_kuliah' => 'string',
        'nama_kelas_kuliah' => 'string',
        'sks_mata_kuliah' => 'decimal:2',
        'status_sync' => 'string',
        'id_prodi' => 'string',
        'id_matkul' => 'string',
        'id_kelas_kuliah' => 'string'
    ];

    public static array $rules = [
        'nama_program_studi' => 'required|string|max:255',
        'id_periode' => 'required|string|max:255',
        'nama_periode' => 'required|string|max:255',
        'kode_mata_kuliah' => 'required|string|max:255',
        'nama_mata_kuliah' => 'required|string|max:255',
        'nama_kelas_kuliah' => 'required|string|max:255',
        'sks_mata_kuliah' => 'required|numeric',
        'jumlah_krs' => 'required',
        'jumlah_dosen' => 'required',
        'status_sync' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_prodi' => 'required|string|max:36',
        'id_matkul' => 'required|string|max:36',
        'id_kelas_kuliah' => 'required|string|max:36'
    ];

    
}
