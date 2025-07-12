<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class DataTerhapus extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    
    public $table = 'data_terhapus';

    public $fillable = [
        'nama_mahasiswa',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'nama_ibu_kandung',
        'agama',
        'id_agama',
        'id_mahasiswa'
    ];

    protected $casts = [
        'id' => 'string',
        'nama_mahasiswa' => 'string',
        'jenis_kelamin' => 'string',
        'tempat_lahir' => 'string',
        'tanggal_lahir' => 'datetime',
        'nama_ibu_kandung' => 'string',
        'agama' => 'string',
        'id_mahasiswa' => 'string'
    ];

    public static array $rules = [
        'nama_mahasiswa' => 'required|string|max:255',
        'jenis_kelamin' => 'required|string|max:255',
        'tempat_lahir' => 'required|string|max:255',
        'tanggal_lahir' => 'required',
        'nama_ibu_kandung' => 'required|string|max:255',
        'agama' => 'required|string|max:255',
        'id_agama' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_mahasiswa' => 'required|string|max:36'
    ];

    
}
