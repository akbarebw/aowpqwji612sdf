<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class JenisAktivitas extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';  

    public $table = 'jenis_aktivitas';

    public $fillable = [
        'id_jenis_aktivitas',
        'nama_jenis_aktivitas',
        'untuk_kampus_merdeka'
    ];

    protected $casts = [
        'id' => 'string',
        'nama_jenis_aktivitas' => 'string'
    ];

    public static array $rules = [
        'id_jenis_aktivitas' => 'required',
        'nama_jenis_aktivitas' => 'required|string|max:255',
        'untuk_kampus_merdeka' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
