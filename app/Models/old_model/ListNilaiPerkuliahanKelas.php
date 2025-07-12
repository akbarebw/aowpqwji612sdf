<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ListNilaiPerkuliahanKelas extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    public $table = 'list_nilai_perkuliahan_kelas';

    public $fillable = [
        'id_matkul',
        'kode_mata_kuliah',
        'nama_mata_kuliah',
        'id_kelas_kuliah',
        'nama_kelas_kuliah',
        'sks_mata_kuliah',
        'jumlah_mahasiswa_krs',
        'jumlah_mahasiswa_dapat_nilai',
        'sks_tm',
        'sks_prak',
        'sks_prak_lap',
        'sks_sim',
        'bahasan_case',
        'a_selenggara_pditt',
        'a_pengguna_pditt',
        'kuota_pditt',
        'tgl_mulai_koas',
        'tgl_selesai_koas',
        'id_mou',
        'id_kls_pditt',
        'id_sms',
        'id_smt',
        'tgl_create',
        'lingkup_kelas',
        'mode_kuliah',
        'nm_smt',
        'nama_prodi',
        'status_sync'
    ];

    protected $casts = [
        'id' => 'string',
        'id_matkul' => 'string',
        'kode_mata_kuliah' => 'string',
        'nama_mata_kuliah' => 'string',
        'id_kelas_kuliah' => 'string',
        'nama_kelas_kuliah' => 'string',
        'sks_mata_kuliah' => 'string',
        'sks_tm' => 'string',
        'sks_prak' => 'string',
        'sks_prak_lap' => 'string',
        'sks_sim' => 'string',
        'bahasan_case' => 'string',
        'tgl_mulai_koas' => 'date',
        'tgl_selesai_koas' => 'date',
        'id_mou' => 'string',
        'id_kls_pditt' => 'string',
        'id_sms' => 'string',
        'id_smt' => 'string',
        'tgl_create' => 'date',
        'lingkup_kelas' => 'string',
        'mode_kuliah' => 'string',
        'nm_smt' => 'string',
        'nama_prodi' => 'string',
        'status_sync' => 'string'
    ];

    public static array $rules = [
        'id_matkul' => 'required|string|max:36',
        'kode_mata_kuliah' => 'required|string|max:255',
        'nama_mata_kuliah' => 'required|string|max:255',
        'id_kelas_kuliah' => 'required|string|max:36',
        'nama_kelas_kuliah' => 'required|string|max:255',
        'sks_mata_kuliah' => 'required|string|max:255',
        'jumlah_mahasiswa_krs' => 'required',
        'jumlah_mahasiswa_dapat_nilai' => 'required',
        'sks_tm' => 'required|string|max:255',
        'sks_prak' => 'required|string|max:255',
        'sks_prak_lap' => 'required|string|max:255',
        'sks_sim' => 'nullable|string|max:255',
        'bahasan_case' => 'required|string|max:255',
        'a_selenggara_pditt' => 'required',
        'a_pengguna_pditt' => 'required',
        'kuota_pditt' => 'required',
        'tgl_mulai_koas' => 'required',
        'tgl_selesai_koas' => 'required',
        'id_mou' => 'nullable|string|max:255',
        'id_kls_pditt' => 'nullable|string|max:255',
        'id_sms' => 'required|string|max:36',
        'id_smt' => 'required|string|max:255',
        'tgl_create' => 'required',
        'lingkup_kelas' => 'nullable|string|max:255',
        'mode_kuliah' => 'nullable|string|max:255',
        'nm_smt' => 'required|string|max:255',
        'nama_prodi' => 'required|string|max:255',
        'status_sync' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
