<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class JenjangPendidikan extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    public $table = 'jenjang_pendidikan';

    public $fillable = [
        'id_jenjang_didik',
        'nama_jenjang_didik'
    ];

    protected $casts = [
        'id' => 'string',
        'nama_jenjang_didik' => 'string'
    ];

    public static array $rules = [
        'id_jenjang_didik' => 'required',
        'nama_jenjang_didik' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
