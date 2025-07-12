<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class KelasKuliah extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    
    public $table = 'kelas_kuliah';

    public $fillable = [
        'id_kelas_kuliah',
        'nama_program_studi',
        'id_semester',
        'nama_semester',
        'kode_mata_kuliah',
        'nama_mata_kuliah',
        'nama_kelas_kuliah',
        'sks',
        'nama_dosen',
        'jumlah_mahasiswa',
        'apa_untuk_pditt',
        'id_prodi',
        'id_matkul',
        'id_dosen'
    ];

    protected $casts = [
        'id' => 'string',
        'id_kelas_kuliah' => 'string',
        'nama_program_studi' => 'string',
        'nama_semester' => 'string',
        'kode_mata_kuliah' => 'string',
        'nama_mata_kuliah' => 'string',
        'nama_kelas_kuliah' => 'string',
        'sks' => 'decimal:2',
        'nama_dosen' => 'string',
        'id_prodi' => 'string',
        'id_matkul' => 'string',
        'id_dosen' => 'string'
    ];

    public static array $rules = [
        'id_kelas_kuliah' => 'required|string|max:36',
        'nama_program_studi' => 'required|string|max:255',
        'id_semester' => 'required',
        'nama_semester' => 'required|string|max:255',
        'kode_mata_kuliah' => 'required|string|max:255',
        'nama_mata_kuliah' => 'required|string|max:255',
        'nama_kelas_kuliah' => 'required|string|max:255',
        'sks' => 'required|numeric',
        'nama_dosen' => 'required|string|max:255',
        'jumlah_mahasiswa' => 'required',
        'apa_untuk_pditt' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_prodi' => 'required|string|max:36',
        'id_matkul' => 'required|string|max:36',
        'id_dosen' => 'required|string|max:36'
    ];

    
}
