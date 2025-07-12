<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class DetailKurikulum extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    
    public $table = 'detail_kurikulum';

    public $fillable = [
        'nama_kurikulum',
        'nama_program_studi',
        'id_semester',
        'semester_mulai_berlaku',
        'jumlah_sks_lulus',
        'jumlah_sks_wajib',
        'jumlah_sks_pilihan',
        'status_sync',
        'id_kurikulum',
        'id_prodi'
    ];

    protected $casts = [
        'id' => 'string',
        'nama_kurikulum' => 'string',
        'nama_program_studi' => 'string',
        'semester_mulai_berlaku' => 'string',
        'status_sync' => 'string',
        'id_kurikulum' => 'string',
        'id_prodi' => 'string'
    ];

    public static array $rules = [
        'nama_kurikulum' => 'required|string|max:255',
        'nama_program_studi' => 'required|string|max:255',
        'id_semester' => 'required',
        'semester_mulai_berlaku' => 'required|string|max:255',
        'jumlah_sks_lulus' => 'required',
        'jumlah_sks_wajib' => 'required',
        'jumlah_sks_pilihan' => 'required',
        'status_sync' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_kurikulum' => 'required|string|max:36',
        'id_prodi' => 'required|string|max:36'
    ];

    
}
