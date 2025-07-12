<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class JalurEvaluasi extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    public $table = 'jalur_evaluasi';

    public $fillable = [
        'id_jenis_evaluasi',
        'nama_jenis_evaluasi'
    ];

    protected $casts = [
        'id' => 'string',
        'nama_jenis_evaluasi' => 'string'
    ];

    public static array $rules = [
        'id_jenis_evaluasi' => 'required',
        'nama_jenis_evaluasi' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
