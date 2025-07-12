<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Spatie\MediaLibrary\MediaCollections\Models\Concerns\HasUuid;

class ExportDataMahasiswaLulus extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    public $table = 'export_data_mahasiswa_lulus';

    public $fillable = [
        'id_registrasi_mahasiswa',
        'nim',
        'nama_mahasiswa',
        'jenis_kelamin',
        'id_prodi',
        'nama_program_studi',
        'id_periode',
        'nama_periode_masuk',
        'id_jenis_keluar',
        'nama_jenis_keluar',
        'nomor_ijazah',
        'tanggal_keluar',
        'keterangan',
        'status_sync',
    ];

    protected $casts = [
        'id' => 'string',
        'id_registrasi_mahasiswa' => 'string',
        'nim' => 'string',
        'nama_mahasiswa' => 'string',
        'jenis_kelamin' => 'string',
         'id_prodi' => 'string',
        'nama_program_studi' => 'string',
        'id_periode' => 'string',
        'nama_periode_masuk' => 'string',
        'id_jenis_keluar' => 'string',
        'nama_jenis_keluar' => 'string',
        'tanggal_keluar' => 'date',
        'keterangan' => 'string',
        'status_sync' => 'string',
    ];

    public static array $rules = [
        'id_registrasi_mahasiswa' => 'required|string|max:36',
        'nim' => 'required|string|max:255',
        'nama_mahasiswa' => 'required|string|max:255',
        'jenis_kelamin' => 'required|string|max:255',
        'id_prodi' => 'required|string|max:36',
        'nama_program_studi' => 'required|string|max:255',
        'id_periode' => 'required|string|max:255',
        'nama_periode_masuk' => 'required|string|max:255',
        'id_jenis_keluar' => 'required|string|max:255',
        'nama_jenis_keluar' => 'required|string|max:255',
        'nomor_ijazah' => 'nullable',
        'tanggal_keluar' => 'required',
        'keterangan' => 'nullable|string|max:255',
        'status_sync' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
    ];


}
