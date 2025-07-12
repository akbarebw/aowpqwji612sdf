<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class JenisSubstansi extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    
    public $table = 'jenis_substansi';

    public $fillable = [
        'id_jenis_substansi',
        'nama_jenis_substansi'
    ];

    protected $casts = [
        'id' => 'string',
        'nama_jenis_substansi' => 'string'
    ];

    public static array $rules = [
        'id_jenis_substansi' => 'required',
        'nama_jenis_substansi' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
