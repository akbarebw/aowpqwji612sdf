<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class NilaiTransferPendidikanMahasiswa extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    public $table = 'nilai_transfer_pendidikan_mahasiswa';

    public $fillable = [
        'id_transfer',
        'id_registrasi_mahasiswa',
        'nim',
        'nama_mahasiswa',
        'id_prodi',
        'nama_program_studi',
        'id_periode_masuk',
        'kode_mata_kuliah_asal',
        'nama_mata_kuliah_asal',
        'sks_mata_kuliah_asal',
        'nilai_huruf_asal',
        'id_matkul',
        'kode_matkul_diakui',
        'nama_mata_kuliah_diakui',
        'sks_mata_kuliah_diakui',
        'nilai_huruf_diakui',
        'nilai_angka_diakui',
        'id_perguruan_tinggi',
        'id_aktivitas',
        'judul',
        'id_jenis_aktivitas',
        'nama_jenis_aktivitas',
        'id_semester',
        'nama_semester',
        'status_sync'
    ];

    protected $casts = [
        'id' => 'string',
        'id_transfer' => 'string',
        'id_registrasi_mahasiswa' => 'string',
        'nim' => 'string',
        'nama_mahasiswa' => 'string',
        'id_prodi' => 'string',
        'nama_program_studi' => 'string',
        'id_periode_masuk' => 'string',
        'kode_mata_kuliah_asal' => 'string',
        'nilai_huruf_asal' => 'string',
        'id_matkul' => 'string',
        'kode_matkul_diakui' => 'string',
        'nama_mata_kuliah_diakui' => 'string',
        'nilai_huruf_diakui' => 'string',
        'nilai_angka_diakui' => 'decimal:2',
        'id_perguruan_tinggi' => 'string',
        'id_aktivitas' => 'string',
        'judul' => 'string',
        'nama_jenis_aktivitas' => 'string',
        'nama_semester' => 'string',
        'status_sync' => 'string'
    ];

    public static array $rules = [
        'id_transfer' => 'required|string|max:36',
        'id_registrasi_mahasiswa' => 'required|string|max:36',
        'nim' => 'required|string|max:255',
        'nama_mahasiswa' => 'required|string|max:255',
        'id_prodi' => 'required|string|max:36',
        'nama_program_studi' => 'required|string|max:255',
        'id_periode_masuk' => 'required|string|max:255',
        'kode_mata_kuliah_asal' => 'required|string|max:255',
        'sks_mata_kuliah_asal' => 'required',
        'nilai_huruf_asal' => 'required|string|max:255',
        'id_matkul' => 'required|string|max:36',
        'kode_matkul_diakui' => 'required|string|max:255',
        'nama_mata_kuliah_diakui' => 'required|string|max:255',
        'sks_mata_kuliah_diakui' => 'required',
        'nilai_huruf_diakui' => 'required|string|max:255',
        'nilai_angka_diakui' => 'required|numeric',
        'id_perguruan_tinggi' => 'nullable|string|max:36',
        'id_aktivitas' => 'nullable|string|max:36',
        'judul' => 'nullable|string|max:255',
        'id_jenis_aktivitas' => 'nullable',
        'nama_jenis_aktivitas' => 'nullable|string|max:255',
        'id_semester' => 'nullable',
        'nama_semester' => 'nullable|string|max:255',
        'status_sync' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
