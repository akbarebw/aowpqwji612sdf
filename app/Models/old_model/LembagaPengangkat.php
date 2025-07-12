<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class LembagaPengangkat extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    public $table = 'lembaga_pengangkat';

    public $fillable = [
        'id_lembaga_angkat',
        'nama_lembaga_angkat'
    ];

    protected $casts = [
        'id' => 'string',
        'nama_lembaga_angkat' => 'string'
    ];

    public static array $rules = [
        'id_lembaga_angkat' => 'required',
        'nama_lembaga_angkat' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
