<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class PeriodePerkuliahan extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    
    public $table = 'periode_perkuliahan';



    public $fillable = [
        'id_prodi',
        'nama_program_studi',
        'id_semester',
        'nama_semester',
        'jumlah_target_mahasiswa_baru',
        'tanggal_awal_perkuliahan',
        'tanggal_akhir_perkuliahan',
        'calon_ikut_seleksi',
        'calon_lulus_seleksi',
        'daftar_sbg_mhs',
        'pst_undur_diri',
        'jml_mgu_kul',
        'metode_kul',
        'metode_kul_eks',
        'tgl_create',
        'last_update',
        'status_sync'
    ];

    protected $casts = [
        'id_priode' => 'string',
        'id_prodi' => 'string',
        'nama_program_studi' => 'string',
        'id_semester' => 'string',
        'nama_semester' => 'string',
        'tanggal_awal_perkuliahan' => 'date',
        'tanggal_akhir_perkuliahan' => 'date',
        'metode_kul' => 'string',
        'metode_kul_eks' => 'string',
        'tgl_create' => 'date',
        'last_update' => 'date',
        'status_sync' => 'string'
    ];

    public static array $rules = [
        'id_prodi' => 'nullable|string|max:36',
        'nama_program_studi' => 'nullable|string|max:255',
        'id_semester' => 'nullable|string|max:36',
        'nama_semester' => 'nullable|string|max:255',
        'jumlah_target_mahasiswa_baru' => 'nullable',
        'tanggal_awal_perkuliahan' => 'nullable',
        'tanggal_akhir_perkuliahan' => 'nullable',
        'calon_ikut_seleksi' => 'nullable',
        'calon_lulus_seleksi' => 'nullable',
        'daftar_sbg_mhs' => 'nullable',
        'pst_undur_diri' => 'nullable',
        'jml_mgu_kul' => 'nullable',
        'metode_kul' => 'nullable|string|max:255',
        'metode_kul_eks' => 'nullable|string|max:255',
        'tgl_create' => 'nullable',
        'last_update' => 'nullable',
        'status_sync' => 'nullable|string|max:255',
        'created_at' => 'required',
        'updated_at' => 'required'
    ];

    public function idProdi(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Prodi::class, 'id_prodi');
    }


    public function idSemester(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(\App\Models\Semester::class, 'id_semester');
    }

    public function riwayatNilaiMahasiswas(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(\App\Models\RiwayatNilaiMahasiswa::class, 'id_periode');
    }
}
