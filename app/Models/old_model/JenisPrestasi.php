<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class JenisPrestasi extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    

    public $table = 'jenis_prestasi';

    public $fillable = [
        'id_jenis_prestasi',
        'nama_jenis_prestasi'
    ];

    protected $casts = [
        'id' => 'string',
        'nama_jenis_prestasi' => 'string'
    ];

    public static array $rules = [
        'id_jenis_prestasi' => 'required',
        'nama_jenis_prestasi' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
