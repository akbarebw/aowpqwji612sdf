<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class JenisKeluar extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    public $table = 'jenis_keluar';

    public $fillable = [
        'id_jenis_keluar',
        'jenis_keluar',
        'apa_mahasiswa'
    ];

    protected $casts = [
        'id' => 'string',
        'jenis_keluar' => 'string',
        'apa_mahasiswa' => 'string'
    ];

    public static array $rules = [
        'id_jenis_keluar' => 'required',
        'jenis_keluar' => 'required|string|max:255',
        'apa_mahasiswa' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
