<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class JenisSertifikasi extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    public $table = 'jenis_sertifikasi';

    public $fillable = [
        'id_jenis_sertifikasi',
        'nama_jenis_sertifikasi'
    ];

    protected $casts = [
        'id' => 'string',
        'nama_jenis_sertifikasi' => 'string'
    ];

    public static array $rules = [
        'id_jenis_sertifikasi' => 'required',
        'nama_jenis_sertifikasi' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
