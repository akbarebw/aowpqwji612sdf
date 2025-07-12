<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class KonversiKampusMerdeka extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    
    public $table = 'konversi_kampus_merdeka';

    public $fillable = [
        'id_konversi_aktivitas',
        'nama_mata_kuliah',
        'id_aktivitas',
        'judul',
        'id_anggota',
        'nama_mahasiswa',
        'nim',
        'sks_mata_kuliah',
        'nilai_angka',
        'nilai_indeks',
        'nilai_huruf',
        'id_semester',
        'nama_semester',
        'status_sync',
        'id_matkul'
    ];

    protected $casts = [
        'id' => 'string',
        'id_konversi_aktivitas' => 'string',
        'nama_mata_kuliah' => 'string',
        'id_aktivitas' => 'string',
        'judul' => 'string',
        'id_anggota' => 'string',
        'nama_mahasiswa' => 'string',
        'nim' => 'string',
        'sks_mata_kuliah' => 'decimal:2',
        'nilai_angka' => 'decimal:2',
        'nilai_indeks' => 'decimal:2',
        'nilai_huruf' => 'string',
        'nama_semester' => 'string',
        'status_sync' => 'string',
        'id_matkul' => 'string'
    ];

    public static array $rules = [
        'id_konversi_aktivitas' => 'required|string|max:36',
        'nama_mata_kuliah' => 'required|string|max:255',
        'id_aktivitas' => 'required|string|max:36',
        'judul' => 'required|string|max:255',
        'id_anggota' => 'required|string|max:36',
        'nama_mahasiswa' => 'required|string|max:255',
        'nim' => 'required|string|max:255',
        'sks_mata_kuliah' => 'required|numeric',
        'nilai_angka' => 'required|numeric',
        'nilai_indeks' => 'required|numeric',
        'nilai_huruf' => 'required|string|max:255',
        'id_semester' => 'required',
        'nama_semester' => 'required|string|max:255',
        'status_sync' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_matkul' => 'required|string|max:36'
    ];

    
}
