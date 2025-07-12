<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class PangkatGolongan extends Model
{
    use HasUuids;

    public $incrementing = false;

    public $keyType = 'string';

    public $table = 'pangkat_golongan';

    public $fillable = [
        'id_pangkat_golongan',
        'kode_golongan',
        'nama_pangkat'
    ];

    protected $casts = [
        'id' => 'string',
        'kode_golongan' => 'string',
        'nama_pangkat' => 'string'
    ];

    public static array $rules = [
        'id_pangkat_golongan' => 'required',
        'kode_golongan' => 'required|string|max:255',
        'nama_pangkat' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
