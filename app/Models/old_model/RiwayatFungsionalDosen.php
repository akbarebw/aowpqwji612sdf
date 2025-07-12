<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class RiwayatFungsionalDosen extends Model
{

    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    public $table = 'riwayat_fungsional_dosen';

    public $fillable = [
        'nidn',
        'nama_dosen',
        'id_jabatan_fungsional',
        'nama_jabatan_fungsional',
        'sk_jabatan_fungsional',
        'mulai_sk_jabatan',
        'id_dosen'
    ];

    protected $casts = [
        'id' => 'string',
        'nidn' => 'string',
        'nama_dosen' => 'string',
        'nama_jabatan_fungsional' => 'string',
        'sk_jabatan_fungsional' => 'string',
        'mulai_sk_jabatan' => 'date',
        'id_dosen' => 'string'
    ];

    public static array $rules = [
        'nidn' => 'nullable|string|max:255',
        'nama_dosen' => 'required|string|max:255',
        'id_jabatan_fungsional' => 'required|string|max:36',
        'nama_jabatan_fungsional' => 'required|string|max:255',
        'sk_jabatan_fungsional' => 'required|string|max:255',
        'mulai_sk_jabatan' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_dosen' => 'required|string|max:36'
    ];
}
