<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class DosenPengajarKelasKuliah extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    public $table = 'dosen_pengajar_kelas_kuliah';

    public $fillable = [
        'id_aktivitas_mengajar',
        'id_registrasi_dosen',
        'nidn',
        'nama_dosen',
        'nama_kelas_kuliah',
        'id_substansi',
        'sks_substansi_total',
        'rencana_minggu_pertemuan',
        'realisasi_minggu_pertemuan',
        'id_jenis_evaluasi',
        'nama_jenis_evaluasi',
        'id_semester',
        'id_dosen',
        'id_prodi',
        'id_kelas_kuliah'
    ];

    protected $casts = [
        'id' => 'string',
        'id_aktivitas_mengajar' => 'string',
        'id_registrasi_dosen' => 'string',
        'nidn' => 'string',
        'nama_dosen' => 'string',
        'nama_kelas_kuliah' => 'string',
        'id_substansi' => 'string',
        'sks_substansi_total' => 'string',
        'rencana_minggu_pertemuan' => 'string',
        'realisasi_minggu_pertemuan' => 'string',
        'id_jenis_evaluasi' => 'string',
        'nama_jenis_evaluasi' => 'string',
        'id_semester' => 'string',
        'id_dosen' => 'string',
        'id_prodi' => 'string',
        'id_kelas_kuliah' => 'string'
    ];

    public static array $rules = [
        'id_aktivitas_mengajar' => 'required|string|max:36',
        'id_registrasi_dosen' => 'required|string|max:36',
        'nidn' => 'required|string|max:255',
        'nama_dosen' => 'required|string|max:255',
        'nama_kelas_kuliah' => 'required|string|max:255',
        'id_substansi' => 'nullable|string|max:36',
        'sks_substansi_total' => 'required|string|max:255',
        'rencana_minggu_pertemuan' => 'required',
        'realisasi_minggu_pertemuan' => 'required',
        'id_jenis_evaluasi' => 'required',
        'nama_jenis_evaluasi' => 'required|string|max:255',
        'id_semester' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_dosen' => 'required|string|max:36',
        'id_prodi' => 'required|string|max:36',
        'id_kelas_kuliah' => 'required|string|max:36'
    ];

    
}
