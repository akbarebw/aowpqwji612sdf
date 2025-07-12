<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class JenisPendaftaran extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    
    public $table = 'jenis_pendaftaran';

    public $fillable = [
        'id_jenis_daftar',
        'nama_jenis_daftar',
        'untuk_daftar_sekolah'
    ];

    protected $casts = [
        'id' => 'string',
        'id_jenis_daftar' => 'string',
        'nama_jenis_daftar' => 'string'
    ];

    public static array $rules = [
        'id_jenis_daftar' => 'required|string|max:36',
        'nama_jenis_daftar' => 'required|string|max:255',
        'untuk_daftar_sekolah' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
