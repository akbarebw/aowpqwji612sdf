<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Periode extends Model
{
    use HasUuids;

    public $incrementing = false;

    protected $keyType = 'string';

    public $table = 'periode';

    public $fillable = [
        'kode_prodi',
        'nama_program_studi',
        'status_prodi',
        'jenjang_pendidikan',
        'periode_pelaporan',
        'tipe_periode',
        'id_prodi'
    ];

    protected $casts = [
        'id' => 'string',
        'nama_program_studi' => 'string',
        'status_prodi' => 'string',
        'jenjang_pendidikan' => 'string',
        'id_prodi' => 'string'
    ];

    public static array $rules = [
        'kode_prodi' => 'nullable',
        'nama_program_studi' => 'required|string|max:255',
        'status_prodi' => 'required|string|max:255',
        'jenjang_pendidikan' => 'required|string|max:255',
        'periode_pelaporan' => 'required',
        'tipe_periode' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_prodi' => 'required|string|max:36'
    ];

    
}
