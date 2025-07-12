<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class PerhitunganSks extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    public $table = 'perhitungan_sks';

    public $fillable = [
        'id_kelas_kuliah',
        'id_registrasi_dosen',
        'id_dosen',
        'nidn',
        'nama_dosen',
        'nama_kelas_kuliah',
        'id_substansi',
        'nama_substansi',
        'rencana_minggu_pertemuan',
        'perhitungan_sks'
    ];

    protected $casts = [
        'id' => 'string',
        'id_kelas_kuliah' => 'string',
        'id_registrasi_dosen' => 'string',
        'id_dosen' => 'string',
        'nidn' => 'string',
        'nama_dosen' => 'string',
        'nama_kelas_kuliah' => 'string',
        'id_substansi' => 'string',
        'nama_substansi' => 'string',
        'rencana_minggu_pertemuan' => 'string',
        'perhitungan_sks' => 'string'
    ];

    public static array $rules = [
        'id_kelas_kuliah' => 'required|string|max:36',
        'id_registrasi_dosen' => 'required|string|max:36',
        'id_dosen' => 'required|string|max:36',
        'nidn' => 'required|string|max:255',
        'nama_dosen' => 'required|string|max:255',
        'nama_kelas_kuliah' => 'required|string|max:255',
        'id_substansi' => 'nullable|string|max:36',
        'nama_substansi' => 'nullable|string|max:255',
        'rencana_minggu_pertemuan' => 'required|string|max:255',
        'perhitungan_sks' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
