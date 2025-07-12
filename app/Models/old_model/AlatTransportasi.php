<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class AlatTransportasi extends Model
{
    use HasUuids;

    public $incrementing = false;

    public $keyType = 'string';

    public $table = 'alat_transportasi';

    public $fillable = [
        'id_alat_transportasi',
        'nama_alat_transportasi'
    ];

    protected $casts = [
        'id' => 'string',
        'nama_alat_transportasi' => 'string'
    ];

    public static array $rules = [
        'id_alat_transportasi' => 'required',
        'nama_alat_transportasi' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
