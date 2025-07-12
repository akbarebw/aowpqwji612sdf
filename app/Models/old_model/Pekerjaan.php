<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Pekerjaan extends Model
{
    use HasUuids;

    public $incrementing = false;

    public $keyType = 'string';

    public $table = 'pekerjaan';

    public $fillable = [
        'id_pekerjaan',
        'nama_pekerjaan'
    ];

    protected $casts = [
        'id' => 'string',
        'nama_pekerjaan' => 'string'
    ];

    public static array $rules = [
        'id_pekerjaan' => 'required',
        'nama_pekerjaan' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
