<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Prodi extends Model
{
    use HasUuids;

    public $table = 'prodi';

    public $fillable = [
        'id_prodi',
        'kode_program_studi',
        'nama_program_studi',
        'status',
        'id_jenjang_pendidikan',
        'nama_jenjang_pendidikan'
    ];

    protected $casts = [
        'id' => 'string',
        'id_prodi' => 'string',
        'nama_program_studi' => 'string',
        'status' => 'string',
        'nama_jenjang_pendidikan' => 'string'
    ];

    public static array $rules = [
        'id_prodi' => 'required|string|max:36',
        'kode_program_studi' => 'required',
        'nama_program_studi' => 'required|string|max:255',
        'status' => 'required|string|max:255',
        'id_jenjang_pendidikan' => 'required',
        'nama_jenjang_pendidikan' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
