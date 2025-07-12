<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class MahasiswaBimbinganDosen extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    

    public $table = 'mahasiswa_bimbingan_dosen';

    public $fillable = [
        'judul',
        'id_bimbing_mahasiswa',
        'id_kategori_kegiatan',
        'nama_kategori_kegiatan',
        'nidn',
        'nama_dosen',
        'pembimbing_ke',
        'id_dosen',
        'id_aktivitas'
    ];

    protected $casts = [
        'id' => 'string',
        'judul' => 'string',
        'id_bimbing_mahasiswa' => 'string',
        'id_kategori_kegiatan' => 'string',
        'nama_kategori_kegiatan' => 'string',
        'nidn' => 'string',
        'nama_dosen' => 'string',
        'pembimbing_ke' => 'string',
        'id_dosen' => 'string',
        'id_aktivitas' => 'string'
    ];

    public static array $rules = [
        'judul' => 'required|string|max:255',
        'id_bimbing_mahasiswa' => 'required|string|max:36',
        'id_kategori_kegiatan' => 'required',
        'nama_kategori_kegiatan' => 'required|string|max:255',
        'nidn' => 'required|string|max:255',
        'nama_dosen' => 'required|string|max:255',
        'pembimbing_ke' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_dosen' => 'required|string|max:36',
        'id_aktivitas' => 'required|string|max:36'
    ];

    
}
