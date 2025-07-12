<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Penghasilan extends Model
{
    use HasUuids;

    public $incrementing = false;

    public $keyType = 'string';

    public $table = 'penghasilan';

    public $fillable = [
        'id_penghasilan',
        'nama_penghasilan'
    ];

    protected $casts = [
        'id' => 'string',
        'nama_penghasilan' => 'string'
    ];

    public static array $rules = [
        'id_penghasilan' => 'required',
        'nama_penghasilan' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
