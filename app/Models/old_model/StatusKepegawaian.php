<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class StatusKepegawaian extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    public $table = 'status_kepegawaian';

    public $fillable = [
        'id_status_pegawai',
        'nama_status_pegawai'
    ];

    protected $casts = [
        'id' => 'string',
        'nama_status_pegawai' => 'string'
    ];

    public static array $rules = [
        'id_status_pegawai' => 'required',
        'nama_status_pegawai' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
