<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class KebutuhanKhusus extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    
    public $table = 'kebutuhan_khusus';

    public $fillable = [
        'id_kebutuhan_khusus',
        'nama_kebutuhan_khusus'
    ];

    protected $casts = [
        'id' => 'string',
        'nama_kebutuhan_khusus' => 'string'
    ];

    public static array $rules = [
        'id_kebutuhan_khusus' => 'required',
        'nama_kebutuhan_khusus' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
