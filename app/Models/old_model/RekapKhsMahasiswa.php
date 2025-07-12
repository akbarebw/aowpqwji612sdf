<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class RekapKhsMahasiswa extends Model
{

    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    
    public $table = 'rekap_khs_mahasiswa';

    public $fillable = [
        'nama_program_studi',
        'nim',
        'nama_mahasiswa',
        'angkatan',
        'id_periode',
        'nama_periode',
        'nama_mata_kuliah',
        'sks_mata_kuliah',
        'nilai_angka',
        'nilai_huruf',
        'nilai_indeks',
        'sks_x_indeks',
        'id_prodi',
        'id_registrasi_mahasiswa',
        'id_matkul'
    ];

    protected $casts = [
        'id' => 'string',
        'nama_program_studi' => 'string',
        'nim' => 'string',
        'nama_mahasiswa' => 'string',
        'nama_periode' => 'string',
        'nama_mata_kuliah' => 'string',
        'sks_mata_kuliah' => 'decimal:2',
        'nilai_angka' => 'decimal:2',
        'nilai_huruf' => 'string',
        'nilai_indeks' => 'decimal:2',
        'sks_x_indeks' => 'decimal:4',
        'id_prodi' => 'string',
        'id_registrasi_mahasiswa' => 'string',
        'id_matkul' => 'string'
    ];

    public static array $rules = [
        'nama_program_studi' => 'required|string|max:255',
        'nim' => 'required|string|max:255',
        'nama_mahasiswa' => 'required|string|max:255',
        'angkatan' => 'required',
        'id_periode' => 'required',
        'nama_periode' => 'required|string|max:255',
        'nama_mata_kuliah' => 'required|string|max:255',
        'sks_mata_kuliah' => 'nullable|numeric',
        'nilai_angka' => 'nullable|numeric',
        'nilai_huruf' => 'nullable|string|max:255',
        'nilai_indeks' => 'nullable|numeric',
        'sks_x_indeks' => 'nullable|numeric',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_prodi' => 'required|string|max:36',
        'id_registrasi_mahasiswa' => 'required|string|max:36',
        'id_matkul' => 'required|string|max:36'
    ];
}
