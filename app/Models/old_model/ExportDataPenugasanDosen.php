<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ExportDataPenugasanDosen extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    
    public $table = 'export_data_penugasan_dosen';

    public $fillable = [
        'id_registrasi_dosen',
        'nidn',
        'nama_dosen',
        'id_prodi',
        'nama_program_studi',
        'periode_mengajar',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'id_agama',
        'nama_agama'
    ];

    protected $casts = [
        'id' => 'string',
        'id_registrasi_dosen' => 'string',
        'nidn' => 'string',
        'nama_dosen' => 'string',
        'id_prodi' => 'string',
        'nama_program_studi' => 'string',
        'periode_mengajar' => 'string',
        'jenis_kelamin' => 'string',
        'tempat_lahir' => 'string',
        'tanggal_lahir' => 'date',
        'nama_agama' => 'string'
    ];

    public static array $rules = [
        'id_registrasi_dosen' => 'required|string|max:36',
        'nidn' => 'required|string|max:255',
        'nama_dosen' => 'required|string|max:255',
        'id_prodi' => 'required|string|max:36',
        'nama_program_studi' => 'required|string|max:255',
        'periode_mengajar' => 'required|string|max:255',
        'jenis_kelamin' => 'required|string|max:255',
        'tempat_lahir' => 'required|string|max:255',
        'tanggal_lahir' => 'required',
        'id_agama' => 'required',
        'nama_agama' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
