<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class RencanaPembelajaran extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    
    public $table = 'rencana_pembelajaran';

    public $fillable = [
        'id_rencana_ajar',
        'nama_mata_kuliah',
        'kode_mata_kuliah',
        'sks_mata_kuliah',
        'nama_program_studi',
        'pertemuan',
        'materi_indonesia',
        'materi_inggris',
        'status_sync',
        'id_matkul',
        'id_prodi'
    ];

    protected $casts = [
        'id' => 'string',
        'nama_mata_kuliah' => 'string',
        'kode_mata_kuliah' => 'string',
        'nama_program_studi' => 'string',
        'materi_indonesia' => 'string',
        'materi_inggris' => 'string',
        'status_sync' => 'string',
        'id_matkul' => 'string',
        'id_prodi' => 'string'
    ];

    public static array $rules = [
        'nama_mata_kuliah' => 'required|string|max:255',
        'kode_mata_kuliah' => 'required|string|max:255',
        'sks_mata_kuliah' => 'required',
        'nama_program_studi' => 'required|string|max:255',
        'pertemuan' => 'required',
        'materi_indonesia' => 'required|string|max:255',
        'materi_inggris' => 'nullable|string|max:255',
        'status_sync' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_matkul' => 'required|string|max:36',
        'id_prodi' => 'required|string|max:36'
    ];

    
}
