<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class StatusKeaktifanPegawai extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    public $table = 'status_keaktifan_pegawai';

    public $fillable = [
        'id_status_aktif',
        'nama_status_aktif'
    ];

    protected $casts = [
        'id' => 'string',
        'nama_status_aktif' => 'string'
    ];

    public static array $rules = [
        'id_status_aktif' => 'required',
        'nama_status_aktif' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
