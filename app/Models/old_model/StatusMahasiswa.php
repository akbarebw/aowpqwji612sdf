<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class StatusMahasiswa extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    
    public $table = 'status_mahasiswa';

    public $fillable = [
        'id_status_mahasiswa',
        'nama_status_mahasiswa'
    ];

    protected $casts = [
        'id' => 'string',
        'id_status_mahasiswa' => 'string',
        'nama_status_mahasiswa' => 'string'
    ];

    public static array $rules = [
        'id_status_mahasiswa' => 'required|string|max:36',
        'nama_status_mahasiswa' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
