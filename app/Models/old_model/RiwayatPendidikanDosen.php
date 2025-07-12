<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class RiwayatPendidikanDosen extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';


    public $table = 'riwayat_pendidikan_dosen';

    public $fillable = [
        'nidn',
        'nama_dosen',
        'id_bidang_studi',
        'nama_bidang_studi',
        'id_jenjang_pendidikan',
        'nama_jenjang_pendidikan',
        'id_gelar_akademik',
        'nama_gelar_akademik',
        'nama_perguruan_tinggi',
        'fakultas',
        'tahun_lulus',
        'sks_lulus',
        'ipk',
        'id_dosen',
        'id_perguruan_tinggi'
    ];

    protected $casts = [
        'id' => 'string',
        'nidn' => 'string',
        'nama_dosen' => 'string',
        'id_bidang_studi' => 'string',
        'nama_bidang_studi' => 'string',
        'id_jenjang_pendidikan' => 'string',
        'nama_jenjang_pendidikan' => 'string',
        'id_gelar_akademik' => 'string',
        'nama_gelar_akademik' => 'string',
        'nama_perguruan_tinggi' => 'string',
        'fakultas' => 'string',
        'tahun_lulus' => 'integer',
        'sks_lulus' => 'integer',
        'ipk' => 'decimal:2',
        'id_dosen' => 'string',
        'id_perguruan_tinggi' => 'string'
    ];

    public static array $rules = [
        'nidn' => 'required|string|max:255',
        'nama_dosen' => 'required|string|max:255',
        'id_bidang_studi' => 'required',
        'nama_bidang_studi' => 'required|string|max:255',
        'id_jenjang_pendidikan' => 'required',
        'nama_jenjang_pendidikan' => 'required|string|max:255',
        'id_gelar_akademik' => 'required',
        'nama_gelar_akademik' => 'required|string|max:255',
        'nama_perguruan_tinggi' => 'required|string|max:255',
        'fakultas' => 'nullable|string|max:255',
        'tahun_lulus' => 'required',
        'sks_lulus' => 'required',
        'ipk' => 'required|numeric',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_dosen' => 'required|string|max:36',
        'id_perguruan_tinggi' => 'nullable|string|max:36'
    ];

    
}
