<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class JenisSms extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    
    public $table = 'jenis_sms';

    public $fillable = [
        'id_jenis_sms',
        'nama_jenis_sms'
    ];

    protected $casts = [
        'id' => 'string',
        'nama_jenis_sms' => 'string'
    ];

    public static array $rules = [
        'id_jenis_sms' => 'required',
        'nama_jenis_sms' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
