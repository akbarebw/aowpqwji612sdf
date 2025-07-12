<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class AktivitasMengajarDosen extends Model
{   
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    public $table = 'aktivitas_mengajar_dosen';

    public $fillable = [
        'id_registrasi_dosen',
        'id_dosen',
        'nama_dosen',
        'id_periode',
        'nama_periode',
        'id_prodi',
        'nama_program_studi',
        'id_matkul',
        'nama_mata_kuliah',
        'id_kelas',
        'nama_kelas_kuliah',
        'rencana_minggu_pertemuan',
        'realisi_minggu_pertemuan'
    ];

    protected $casts = [
        'id' => 'string',
        'id_registrasi_dosen' => 'string',
        'id_dosen' => 'string',
        'nama_dosen' => 'string',
        'id_periode' => 'string',
        'nama_periode' => 'string',
        'id_prodi' => 'string',
        'nama_program_studi' => 'string',
        'id_matkul' => 'string',
        'nama_mata_kuliah' => 'string',
        'id_kelas' => 'string',
        'nama_kelas_kuliah' => 'string',
        'rencana_minggu_pertemuan' => 'string',
        'realisi_minggu_pertemuan' => 'string'
    ];

    public static array $rules = [
        'id_registrasi_dosen' => 'required|string|max:36',
        'id_dosen' => 'required|string|max:36',
        'nama_dosen' => 'required|string|max:255',
        'id_periode' => 'required|string|max:255',
        'nama_periode' => 'required|string|max:255',
        'id_prodi' => 'required|string|max:36',
        'nama_program_studi' => 'required|string|max:255',
        'id_matkul' => 'required|string|max:36',
        'nama_mata_kuliah' => 'required|string|max:255',
        'id_kelas' => 'required|string|max:36',
        'nama_kelas_kuliah' => 'required|string|max:255',
        'rencana_minggu_pertemuan' => 'required',
        'realisi_minggu_pertemuan' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
