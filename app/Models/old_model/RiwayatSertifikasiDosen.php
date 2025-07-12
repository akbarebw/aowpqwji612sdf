<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class RiwayatSertifikasiDosen extends Model
{

    use HasUuids;

    public $incrementing = false;
    public $keyType = 'string';

    
    public $table = 'riwayat_sertifikasi_dosen';

    public $fillable = [
        'nidn',
        'nama_dosen',
        'nomor_peserta',
        'id_bidang_studi',
        'nama_bidang_studi',
        'id_jenis_sertifikasi',
        'nama_jenis_sertifikasi',
        'tahun_sertifikasi',
        'sk_sertifikasi',
        'id_dosen'
    ];

    protected $casts = [
        'id' => 'string',
        'nidn' => 'string',
        'nama_dosen' => 'string',
        'nama_jenis_studi' => 'string',
        'nama_jenis_sertifikasi' => 'string',
        'sk_sertifikasi' => 'string',
        'id_dosen' => 'string'
    ];

    public static array $rules = [
        'nidn' => 'required|string|max:255',
        'nama_dosen' => 'required|string|max:255',
        'nomor_peserta' => 'nullable',
        'id_bidang_studi' => 'required',
        'nama_bidang_studi' => 'required|string|max:255',
        'id_jenis_sertifikasi' => 'required',
        'nama_jenis_sertifikasi' => 'required|string|max:255',
        'tahun_sertifikasi' => 'required',
        'sk_sertifikasi' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_dosen' => 'required|string|max:36'
    ];

    
}
