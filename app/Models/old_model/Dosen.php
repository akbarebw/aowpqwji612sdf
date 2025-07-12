<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Dosen extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    
    public $table = 'dosen';

    public $fillable = [
        'id_dosen',
        'nidn',
        'jenis_kelamin',
        'id_agama',
        'nama_agama',
        'tanggal_lahir',
        'id_status_aktif',
        'nama_status_aktif'
    ];

    protected $casts = [
        'id' => 'string',
        'id_dosen' => 'string',
        'nidn' => 'string',
        'jenis_kelamin' => 'string',
        'nama_agama' => 'string',
        'tanggal_lahir' => 'date',
        'nama_status_aktif' => 'string'
    ];

    public static array $rules = [
        'id_dosen' => 'required|string|max:36',
        'nidn' => 'required|string|max:255',
        'jenis_kelamin' => 'required|string|max:255',
        'id_agama' => 'required',
        'nama_agama' => 'required|string|max:255',
        'tanggal_lahir' => 'required',
        'id_status_aktif' => 'required',
        'nama_status_aktif' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
