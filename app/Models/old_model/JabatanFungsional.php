<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class JabatanFungsional extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    public $table = 'jabatan_fungsional';

    public $fillable = [
        'id_jabatan_fungsional',
        'nama_jabatan_fungsional'
    ];

    protected $casts = [
        'id' => 'string',
        'nama_jabatan_fungsional' => 'string'
    ];

    public static array $rules = [
        'id_jabatan_fungsional' => 'required',
        'nama_jabatan_fungsional' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
