<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class JenisTinggal extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    public $table = 'jenis_tinggal';

    public $fillable = [
        'id_jenis_tinggal',
        'nama_jenis_tinggal'
    ];

    protected $casts = [
        'id' => 'string',
        'nama_jenis_tinggal' => 'string'
    ];

    public static array $rules = [
        'id_jenis_tinggal' => 'required',
        'nama_jenis_tinggal' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
