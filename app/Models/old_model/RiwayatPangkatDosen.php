<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class RiwayatPangkatDosen extends Model
{
    use HasUuids;

    public $incrementing = false;   
    protected $keyType = 'string';
    
    public $table = 'riwayat_pangkat_dosen';

    public $fillable = [
        'nidn',
        'nama_dosen',
        'id_pangkat_golongan',
        'nama_pangkat_golongan',
        'sk_pangkat',
        'tanggal_sk_pangkat',
        'mulai_sk_pangkat',
        'masa_kerja_dalam_tahun',
        'masa_kerja_dalam_bulan',
        'id_dosen'
    ];

    protected $casts = [
        'id' => 'string',
        'nidn' => 'string',
        'nama_dosen' => 'string',
        'nama_pangkat_golongan' => 'string',
        'sk_pangkat' => 'string',
        'tanggal_sk_pangkat' => 'date',
        'mulai_sk_pangkat' => 'date',
        'id_dosen' => 'string'
    ];

    public static array $rules = [
        'nidn' => 'nullable|string|max:255',
        'nama_dosen' => 'required|string|max:255',
        'id_pangkat_golongan' => 'required',
        'nama_pangkat_golongan' => 'required|string|max:255',
        'sk_pangkat' => 'required|string|max:255',
        'tanggal_sk_pangkat' => 'required',
        'mulai_sk_pangkat' => 'required',
        'masa_kerja_dalam_tahun' => 'required',
        'masa_kerja_dalam_bulan' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_dosen' => 'required|string|max:36'
    ];

    
}
