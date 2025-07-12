<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class TahunAjaran extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    
    public $table = 'tahun_ajaran';

    public $fillable = [
        'id_tahun_ajaran',
        'nama_tahun_ajaran',
        'a_periode_aktif',
        'tanggal_mulai',
        'tanggal_selesai'
    ];

    protected $casts = [
        'id' => 'string',
        'tanggal_mulai' => 'datetime',
        'tanggal_selesai' => 'datetime'
    ];

    public static array $rules = [
        'id_tahun_ajaran' => 'required',
        'nama_tahun_ajaran' => 'required',
        'a_periode_aktif' => 'required',
        'tanggal_mulai' => 'required',
        'tanggal_selesai' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

}
