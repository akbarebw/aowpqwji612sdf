<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Kurikulum extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    
    public $table = 'kurikulum';

    public $fillable = [
        'id_kurikulum',
        'id_semester',
        'nama_kurikulum',
        'nama_program_studi',
        'tahun_ajaran',
        'semester_mulai_berlaku',
        'jumlah_sks_lulus',
        'jumlah_sks_wajib',
        'jumlah_sks_pilihan',
        'jumlah_sks_mata_kuliah_wajib',
        'jumlah_sks_mata_kuliah_pilihan',
        'id_prodi'
    ];

    protected $casts = [
        'id' => 'string',
        'id_kurikulum' => 'string',
        'nama_kurikulum' => 'string',
        'nama_program_studi' => 'string',
        'semester_mulai_berlaku' => 'string',
        'id_prodi' => 'string'
    ];

    public static array $rules = [
        'id_kurikulum' => 'required|string|max:36',
        'id_semester' => 'required',
        'nama_kurikulum' => 'required|string|max:255',
        'nama_program_studi' => 'required|string|max:255',
        'tahun_ajaran' => 'required',
        'semester_mulai_berlaku' => 'required|string|max:255',
        'jumlah_sks_lulus' => 'required',
        'jumlah_sks_wajib' => 'required',
        'jumlah_sks_pilihan' => 'required',
        'jumlah_sks_mata_kuliah_wajib' => 'nullable',
        'jumlah_sks_mata_kuliah_pilihan' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_prodi' => 'required|string|max:36'
    ];

    
}
