<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class DetailNilaiPerkuliahanKelas extends Model
{
    use HasUuids;
    
    public $incrementing = false;
    public $keyType = 'string';

    public $table = 'detail_nilai_perkuliahan';

    public $fillable = [
        'nama_program_studi',
        'id_semester',
        'nama_semester',
        'kode_mata_kuliah',
        'nama_mata_kuliah',
        'sks_mata_kuliah',
        'nama_kelas_kuliah',
        'nama_mahasiswa',
        'jurusan',
        'angkatan',
        'nilai_angka',
        'nilai_indeks',
        'nilai_huruf',
        'id_prodi',
        'id_matkul',
        'id_kelas_kuliah',
        'id_registrasi_mahasiswa',
        'id_mahasiswa'
    ];

    protected $casts = [
        'id' => 'string',
        'nama_program_studi' => 'string',
        'nama_semester' => 'string',
        'kode_mata_kuliah' => 'string',
        'nama_mata_kuliah' => 'string',
        'sks_mata_kuliah' => 'decimal:2',
        'nama_kelas_kuliah' => 'string',
        'nama_mahasiswa' => 'string',
        'jurusan' => 'string',
        'angkatan' => 'string',
        'nilai_huruf' => 'string',
        'id_prodi' => 'string',
        'id_matkul' => 'string',
        'id_kelas_kuliah' => 'string',
        'id_registrasi_mahasiswa' => 'string',
        'id_mahasiswa' => 'string'
    ];

    public static array $rules = [
        'nama_program_studi' => 'required|string|max:255',
        'id_semester' => 'required',
        'nama_semester' => 'required|string|max:255',
        'kode_mata_kuliah' => 'required|string|max:255',
        'nama_mata_kuliah' => 'required|string|max:255',
        'sks_mata_kuliah' => 'required|numeric',
        'nama_kelas_kuliah' => 'required|string|max:255',
        'nama_mahasiswa' => 'required|string|max:255',
        'jurusan' => 'required|string|max:255',
        'angkatan' => 'required|string|max:255',
        'nilai_angka' => 'required',
        'nilai_indeks' => 'required',
        'nilai_huruf' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_prodi' => 'required|string|max:36',
        'id_matkul' => 'required|string|max:36',
        'id_kelas_kuliah' => 'required|string|max:36',
        'id_registrasi_mahasiswa' => 'required|string|max:36',
        'id_mahasiswa' => 'required|string|max:36'
    ];

    
}
