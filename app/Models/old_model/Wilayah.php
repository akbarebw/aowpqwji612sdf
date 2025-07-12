<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Wilayah extends Model
{
    use HasUuids;
    
    public $incrementing = false;
    protected $keyType = 'string';

    public $table = 'wilayah';

    public $fillable = [
        'id_level_wilayah',
        'id_wilayah',
        'id_negara',
        'nama_wilayah',
        'id_induk_wilayah'
    ];

    protected $casts = [
        'id' => 'string',
        'id_wilayah' => 'string',
        'id_negara' => 'string',
        'nama_wilayah' => 'string'
    ];

    public static array $rules = [
        'id_level_wilayah' => 'required',
        'id_wilayah' => 'required|string|max:36',
        'id_negara' => 'required|string|max:255',
        'nama_wilayah' => 'required|string|max:255',
        'id_induk_wilayah' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
