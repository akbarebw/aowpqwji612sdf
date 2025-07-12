<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class PenugasanDosen extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    
    public $table = 'penugasan_dosen';

    public $fillable = [
        'id_registrasi_dosen',
        'jk',
        'nama_dosen',
        'nidn',
        'id_tahun_ajaran',
        'nama_tahun_ajaran',
        'nama_perguruan_tinggi',
        'nama_program_studi',
        'nomor_surat_tugas',
        'tanggal_surat_tugas',
        'mulai_surat_tugas',
        'tgl_create',
        'tgl_ptk_keluar',
        'id_stat_pegawai',
        'id_jns_keluar',
        'id_ikatan_kerja',
        'a_sp_homebase',
        'id_dosen',
        'id_prodi'
    ];

    protected $casts = [
        'id' => 'string',
        'id_registrasi_dosen' => 'string',
        'jk' => 'string',
        'nama_dosen' => 'string',
        'nidn' => 'string',
        'nama_tahun_ajaran' => 'string',
        'nama_perguruan_tinggi' => 'string',
        'nama_program_studi' => 'string',
        'nomor_surat_tugas' => 'string',
        'tanggal_surat_tugas' => 'date',
        'mulai_surat_tugas' => 'date',
        'tgl_create' => 'date',
        'tgl_ptk_keluar' => 'date',
        'id_jns_keluar' => 'string',
        'id_ikatan_kerja' => 'string',
        'id_dosen' => 'string',
        'id_prodi' => 'string'
    ];

    public static array $rules = [
        'id_registrasi_dosen' => 'required|string|max:36',
        'jk' => 'required|string|max:255',
        'nama_dosen' => 'required|string|max:255',
        'nidn' => 'nullable|string|max:255',
        'id_tahun_ajaran' => 'required',
        'nama_tahun_ajaran' => 'required|string|max:255',
        'nama_perguruan_tinggi' => 'required|string|max:255',
        'nama_program_studi' => 'nullable|string|max:255',
        'nomor_surat_tugas' => 'required|string|max:255',
        'tanggal_surat_tugas' => 'required',
        'mulai_surat_tugas' => 'required',
        'tgl_create' => 'required',
        'tgl_ptk_keluar' => 'nullable',
        'id_stat_pegawai' => 'required',
        'id_jns_keluar' => 'nullable|string|max:255',
        'id_ikatan_kerja' => 'required|string|max:255',
        'a_sp_homebase' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_dosen' => 'required|string|max:36',
        'id_prodi' => 'required|string|max:36'
    ];

    
}
