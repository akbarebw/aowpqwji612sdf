<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class RiwayatPenelitianDosen extends Model
{

    use HasUuids;
    public $incrementing = false;
    public $keyType = 'string';


    public $table = 'riwayat_penelitian_dosen';

    public $fillable = [
        'nidn',
        'nama_dosen',
        'id_penelitian',
        'judul_penelitian',
        'id_kelompok_bidang',
        'kode_kelompok_bidang',
        'nama_kelompok_bidang',
        'id_lembaga_iptek',
        'nama_lembaga_iptek',
        'tahun_kegiatan',
        'id_dosen'
    ];

    protected $casts = [
        'id' => 'string',
        'nidn' => 'string',
        'nama_dosen' => 'string',
        'id_penelitian' => 'string',
        'judul_penelitian' => 'string',
        'id_kelompok_bidang' => 'string',
        'nama_kelompok_penelitian' => 'string',
        'id_lembaga_iptek' => 'string',
        'nama_lembaga_iptek' => 'string',
        'id_dosen' => 'string'
    ];

    public static array $rules = [
        'nidn' => 'required|string|max:255',
        'nama_dosen' => 'required|string|max:255',
        'id_penelitian' => 'required|string|max:36',
        'judul_penelitian' => 'required|string|max:255',
        'id_kelompok_bidang' => 'nullable|string|max:36',
        'kode_kelompok_bidang' => 'nullable',
        'nama_kelompok_penelitian' => 'nullable|string|max:255',
        'id_lembaga_iptek' => 'required|string|max:36',
        'nama_lembaga_iptek' => 'required|string|max:255',
        'tahun_kegiatan' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_dosen' => 'required|string|max:36'
    ];

    
}
