<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class PenugasanSemuaDosen extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    
    public $table = 'penugasan_semua_dosen';

    public $fillable = [
        'id_registrasi_dosen',
        'nama_dosen',
        'nidn',
        'jenis_kelamin',
        'id_tahun_ajaran',
        'nama_tahun_ajaran',
        'program_studi',
        'nomor_surat_tugas',
        'tanggal_surat_tugas',
        'apakah_homebase',
        'id_dosen',
        'id_prodi'
    ];

    protected $casts = [
        'id' => 'string',
        'id_registrasi_dosen' => 'string',
        'nama_dosen' => 'string',
        'nidn' => 'string',
        'jenis_kelamin' => 'string',
        'nama_tahun_ajaran' => 'string',
        'program_studi' => 'string',
        'nomor_surat_tugas' => 'string',
        'tanggal_surat_tugas' => 'date',
        'apakah_homebase' => 'string',
        'id_dosen' => 'string',
        'id_prodi' => 'string'
    ];

    public static array $rules = [
        'id_registrasi_dosen' => 'required|string|max:36',
        'nama_dosen' => 'required|string|max:255',
        'nidn' => 'required|string|max:255',
        'jenis_kelamin' => 'required|string|max:255',
        'id_tahun_ajaran' => 'required',
        'nama_tahun_ajaran' => 'required|string|max:255',
        'program_studi' => 'required|string|max:255',
        'nomor_surat_tugas' => 'required|string|max:255',
        'tanggal_surat_tugas' => 'required',
        'apakah_homebase' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_dosen' => 'required|string|max:36',
        'id_prodi' => 'required|string|max:36'
    ];

    
}
