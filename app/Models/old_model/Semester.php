<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Semester extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    
    public $table = 'semester';

    public $fillable = [
        'id_semester',
        'id_tahun_ajaran',
        'nama_semester',
        'semester',
        'a_periode_aktif',
        'tanggal_mulai',
        'tanggal_selesai'
    ];

    protected $casts = [
        'id' => 'string',
        'nama_semester' => 'string',
        'tanggal_mulai' => 'datetime',
        'tanggal_selesai' => 'datetime'
    ];

    public static array $rules = [
        'id_semester' => 'required',
        'id_tahun_ajaran' => 'required',
        'nama_semester' => 'required|string|max:255',
        'semester' => 'required',
        'a_periode_aktif' => 'required',
        'tanggal_mulai' => 'required',
        'tanggal_selesai' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
