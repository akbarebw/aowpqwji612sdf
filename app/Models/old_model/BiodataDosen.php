<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class BiodataDosen extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    public $table = 'biodata_dosen';

    public $fillable = [
        'nama_dosen',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'id_agama',
        'nama_agama',
        'id_status_aktif',
        'nama_status_aktif',
        'nidn',
        'nama_ibu_kandung',
        'nik',
        'nip',
        'npwp',
        'id_jenis_sdm',
        'nama_jenis_sdm',
        'no_sk_cpns',
        'tanggal_sk_cpns',
        'no_sk_pengangkatan',
        'mulai_sk_pengangkatan',
        'id_lembaga_angkat',
        'nama_lembaga_pengangkatan',
        'id_pangkat_golongan',
        'nama_pangkat_golongan',
        'id_sumber_gaji',
        'nama_sumber_gaji',
        'jalan',
        'dusun',
        'rt',
        'rw',
        'ds_kel',
        'kode_pos',
        'id_wilayah',
        'nama_wilayah',
        'telepon',
        'handphone',
        'email',
        'status_pernikahan',
        'nama_suami_istri',
        'nip_suami_istri',
        'tanggal_mulai_pns',
        'id_pekerjaan_suami_istri',
        'nama_pekerjaan_suami_istri',
        'id_dosen'
    ];

    protected $casts = [
        'id' => 'string',
        'nama_dosen' => 'string',
        'tempat_lahir' => 'string',
        'tanggal_lahir' => 'date',
        'jenis_kelamin' => 'string',
        'nama_agama' => 'string',
        'nama_status_aktif' => 'string',
        'nidn' => 'string',
        'nama_ibu_kandung' => 'string',
        'nik' => 'string',
        'nip' => 'string',
        'npwp' => 'string',
        'nama_jenis_sdm' => 'string',
        'no_sk_cpns' => 'string',
        'tanggal_sk_cpns' => 'date',
        'mulai_sk_pengangkatan' => 'date',
        'nama_lembaga_pengangkatan' => 'string',
        'nama_pangkat_golongan' => 'string',
        'nama_sumber_gaji' => 'string',
        'jalan' => 'string',
        'dusun' => 'string',
        'rt' => 'string',
        'rw' => 'string',
        'ds_kel' => 'string',
        'kode_pos' => 'string',
        'id_wilayah' => 'string',
        'nama_wilayah' => 'string',
        'telepon' => 'string',
        'handphone' => 'string',
        'email' => 'string',
        'status_pernikahan' => 'string',
        'nama_suami_istri' => 'string',
        'nip_suami_istri' => 'string',
        'tanggal_mulai_pns' => 'date',
        'id_pekerjaan_suami_istri' => 'string',
        'nama_pekerjaan_suami_istri' => 'string',
        'id_dosen' => 'string'
    ];

    public static array $rules = [
        'nama_dosen' => 'required|string|max:255',
        'tempat_lahir' => 'required|string|max:255',
        'tanggal_lahir' => 'required',
        'jenis_kelamin' => 'required|string|max:255',
        'id_agama' => 'required',
        'nama_agama' => 'required|string|max:255',
        'id_status_aktif' => 'required',
        'nama_status_aktif' => 'required|string|max:255',
        'nidn' => 'required|string|max:255',
        'nama_ibu_kandung' => 'required|string|max:255',
        'nik' => 'required|string|max:255',
        'nip' => 'required|string|max:255',
        'npwp' => 'nullable|string|max:255',
        'id_jenis_sdm' => 'required',
        'nama_jenis_sdm' => 'required|string|max:255',
        'no_sk_cpns' => 'nullable|string|max:255',
        'tanggal_sk_cpns' => 'nullable',
        'no_sk_pengangkatan' => 'nullable',
        'mulai_sk_pengangkatan' => 'nullable',
        'id_lembaga_angkat' => 'required',
        'nama_lembaga_pengangkatan' => 'required|string|max:255',
        'id_pangkat_golongan' => 'nullable',
        'nama_pangkat_golongan' => 'nullable|string|max:255',
        'id_sumber_gaji' => 'required',
        'nama_sumber_gaji' => 'required|string|max:255',
        'jalan' => 'required|string|max:255',
        'dusun' => 'nullable|string|max:255',
        'rt' => 'nullable|string|max:255',
        'rw' => 'nullable|string|max:255',
        'ds_kel' => 'required|string|max:255',
        'kode_pos' => 'nullable|string|max:255',
        'id_wilayah' => 'required|string|max:36',
        'nama_wilayah' => 'required|string|max:255',
        'telepon' => 'nullable|string|max:255',
        'handphone' => 'nullable|string|max:255',
        'email' => 'required|string|max:255',
        'status_pernikahan' => 'required|string|max:255',
        'nama_suami_istri' => 'nullable|string|max:255',
        'nip_suami_istri' => 'nullable|string|max:255',
        'tanggal_mulai_pns' => 'nullable',
        'id_pekerjaan_suami_istri' => 'required|string|max:255',
        'nama_pekerjaan_suami_istri' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_dosen' => 'required|string|max:36'
    ];

    
}
