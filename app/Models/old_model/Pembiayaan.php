<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Pembiayaan extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    
    public $table = 'pembiayaan';

    public $fillable = [
        'id_pembiayaan',
        'nama_pembiayaan'
    ];

    protected $casts = [
        'id' => 'string',
        'nama_pembiayaan' => 'string'
    ];

    public static array $rules = [
        'id_pembiayaan' => 'required',
        'nama_pembiayaan' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
