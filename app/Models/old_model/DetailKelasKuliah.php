<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class DetailKelasKuliah extends Model
{
    use HasUuids;

    public $incrementing = false;

    public $keyType = 'string';

    public $table = 'detail_kelas_kuliah';

    public $fillable = [
        'nama_program_studi',
        'id_semester',
        'nama_semester',
        'kode_mata_kuliah',
        'nama_mata_kuliah',
        'nama_kelas_kuliah',
        'bahasan',
        'tanggal_mulai_aktif',
        'tanggal_akhir_aktif',
        'kapasitas',
        'tanggal_tutup_daftar',
        'prodi_penyelenggara',
        'perguruan_tinggi_penyelenggara',
        'id_kelas_kuliah',
        'id_prodi',
        'id_matkul'
    ];

    protected $casts = [
        'id' => 'string',
        'nama_program_studi' => 'string',
        'nama_semester' => 'string',
        'kode_mata_kuliah' => 'string',
        'nama_mata_kuliah' => 'string',
        'nama_kelas_kuliah' => 'string',
        'bahasan' => 'string',
        'tanggal_mulai_aktif' => 'date',
        'tanggal_akhir_aktif' => 'date',
        'kapasitas' => 'string',
        'tanggal_tutup_daftar' => 'date',
        'prodi_penyelenggara' => 'string',
        'perguruan_tinggi_penyelenggara' => 'string',
        'id_kelas_kuliah' => 'string',
        'id_prodi' => 'string',
        'id_matkul' => 'string'
    ];

    public static array $rules = [
        'nama_program_studi' => 'required|string|max:255',
        'id_semester' => 'required',
        'nama_semester' => 'required|string|max:255',
        'kode_mata_kuliah' => 'required|string|max:255',
        'nama_mata_kuliah' => 'required|string|max:255',
        'nama_kelas_kuliah' => 'required|string|max:255',
        'bahasan' => 'nullable|string|max:255',
        'tanggal_mulai_aktif' => 'nullable',
        'tanggal_akhir_aktif' => 'nullable',
        'kapasitas' => 'nullable|string|max:255',
        'tanggal_tutup_daftar' => 'nullable',
        'prodi_penyelenggara' => 'nullable|string|max:255',
        'perguruan_tinggi_penyelenggara' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_kelas_kuliah' => 'required|string|max:36',
        'id_prodi' => 'required|string|max:36',
        'id_matkul' => 'required|string|max:36'
    ];

    
}
