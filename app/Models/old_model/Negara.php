<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Negara extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    
    public $table = 'negara';

    public $fillable = [
        'id_negara',
        'nama_negara'
    ];

    protected $casts = [
        'id' => 'string',
        'id_negara' => 'string',
        'nama_negara' => 'string'
    ];

    public static array $rules = [
        'id_negara' => 'required|string|max:255',
        'nama_negara' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
