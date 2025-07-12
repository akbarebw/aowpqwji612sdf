<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class MataKuliah extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    
    public $table = 'mata_kuliah';

    public $fillable = [
        'id_matkul',
        'kode_mata_kuliah',
        'nama_mata_kuliah',
        'sks_mata_kuliah',
        'id_prodi',
        'nama_program_studi',
        'id_jenis_mata_kuliah',
        'id_kelompok_mata_kuliah'
    ];

    protected $casts = [
        'id' => 'string',
        'id_matkul' => 'string',
        'kode_mata_kuliah' => 'string',
        'nama_mata_kuliah' => 'string',
        'id_prodi' => 'string',
        'nama_program_studi' => 'string',
        'id_jenis_mata_kuliah' => 'string',
        'id_kelompok_mata_kuliah' => 'string'
    ];

    public static array $rules = [
        'id_matkul' => 'required|string|max:36',
        'kode_mata_kuliah' => 'required|string|max:255',
        'nama_mata_kuliah' => 'required|string|max:255',
        'sks_mata_kuliah' => 'required',
        'id_prodi' => 'required|string|max:36',
        'nama_program_studi' => 'required|string|max:255',
        'id_jenis_mata_kuliah' => 'required|string|max:255',
        'id_kelompok_mata_kuliah' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
