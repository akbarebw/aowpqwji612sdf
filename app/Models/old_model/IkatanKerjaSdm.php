<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class IkatanKerjaSdm extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    public $table = 'ikatan_kerja_sdm';

    public $fillable = [
        'id_ikatan_kerja',
        'nama_ikatan_kerja'
    ];

    protected $casts = [
        'id' => 'string',
        'id_ikatan_kerja' => 'string',
        'nama_ikatan_kerja' => 'string'
    ];

    public static array $rules = [
        'id_ikatan_kerja' => 'required|string|max:255',
        'nama_ikatan_kerja' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
