<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class JalurMasuk extends Model
{
    use HasUuids;
    
    public $incrementing = false;
    protected $keyType = 'string';
    

    public $table = 'jalur_masuk';

    public $fillable = [
        'id_jalur_masuk',
        'nama_jalur_masuk'
    ];

    protected $casts = [
        'id' => 'string',
        'nama_jalur_masuk' => 'string'
    ];

    public static array $rules = [
        'id_jalur_masuk' => 'required',
        'nama_jalur_masuk' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
