<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class DosenPembimbing extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    


    
    public $table = 'dosen_pembimbing';

    public $fillable = [
        'nama_mahasiswa',
        'nim',
        'nidn',
        'nama_dosen',
        'pembimbing_ke',
        'jenis_aktivitas',
        'id_registrasi_mahasiswa',
        'id_dosen'
    ];

    protected $casts = [
        'id' => 'string',
        'nama_mahasiswa' => 'string',
        'nim' => 'string',
        'nama_dosen' => 'string',
        'jenis_aktivitas' => 'string',
        'id_registrasi_mahasiswa' => 'string',
        'id_dosen' => 'string'
    ];

    public static array $rules = [
        'nama_mahasiswa' => 'required|string|max:255',
        'nim' => 'required|string|max:255',
        'nidn' => 'nullable',
        'nama_dosen' => 'required|string|max:255',
        'pembimbing_ke' => 'required',
        'jenis_aktivitas' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_registrasi_mahasiswa' => 'required|string|max:36',
        'id_dosen' => 'required|string|max:36'
    ];

    
}
