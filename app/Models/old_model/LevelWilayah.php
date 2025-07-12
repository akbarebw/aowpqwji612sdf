<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class LevelWilayah extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    public $table = 'level_wilayah';

    public $fillable = [
        'id_level_wilayah',
        'nama_level_wilayah'
    ];

    protected $casts = [
        'id' => 'string',
        'nama_level_wilayah' => 'string'
    ];

    public static array $rules = [
        'id_level_wilayah' => 'required',
        'nama_level_wilayah' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
