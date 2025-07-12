<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class TingkatPrestasi extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';


    public $table = 'tingkat_prestasi';

    public $fillable = [
        'id_tingkat_prestasi',
        'nama_tingkat_prestasi'
    ];

    protected $casts = [
        'id' => 'string',
        'nama_tingkat_prestasi' => 'string'
    ];

    public static array $rules = [
        'id_tingkat_prestasi' => 'required',
        'nama_tingkat_prestasi' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
