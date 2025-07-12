<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class RiwayatNilaiMahasiswa extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    
    public $table = 'riwayat_nilai_mahasiswa';

    public $fillable = [
        'id_registrasi_mahasiswa',
        'id_prodi',
        'nama_program_studi',
        'id_periode',
        'id_matkul',
        'nama_mata_kuliah',
        'id_kelas',
        'nama_kelas_kuliah',
        'sks_mata_kuliah',
        'nilai_angka',
        'nilai_huruf',
        'nilai_indeks',
        'nim',
        'nama_mahasiswa',
        'angkatan',
        'status_sync'
    ];

    protected $casts = [
        'id' => 'string',
        'id_registrasi_mahasiswa' => 'string',
        'id_prodi' => 'string',
        'nama_program_studi' => 'string',
        'id_periode' => 'string',
        'id_matkul' => 'string',
        'nama_mata_kuliah' => 'string',
        'id_kelas' => 'string',
        'nama_kelas_kuliah' => 'string',
        'sks_mata_kuliah' => 'string',
        'nilai_huruf' => 'string',
        'nilai_indeks' => 'string',
        'nim' => 'string',
        'nama_mahasiswa' => 'string',
        'angkatan' => 'string',
        'status_sync' => 'string'
    ];

    public static array $rules = [
        'id_registrasi_mahasiswa' => 'required|string|max:36',
        'id_prodi' => 'required|string|max:36',
        'nama_program_studi' => 'required|string|max:255',
        'id_periode' => 'required|string|max:255',
        'id_matkul' => 'required|string|max:36',
        'nama_mata_kuliah' => 'required|string|max:255',
        'id_kelas' => 'required|string|max:36',
        'nama_kelas_kuliah' => 'required|string|max:255',
        'sks_mata_kuliah' => 'required|string|max:255',
        'nilai_angka' => 'nullable',
        'nilai_huruf' => 'required|string|max:255',
        'nilai_indeks' => 'required|string|max:255',
        'nim' => 'required|string|max:255',
        'nama_mahasiswa' => 'required|string|max:255',
        'angkatan' => 'required|string|max:255',
        'status_sync' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
