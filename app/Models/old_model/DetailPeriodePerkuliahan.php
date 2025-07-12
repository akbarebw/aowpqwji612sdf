<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class DetailPeriodePerkuliahan extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    
    public $table = 'detail_periode_perkuliahan';

    public $fillable = [
        'nama_program_studi',
        'id_semester',
        'nama_semester',
        'jumlah_target_mahasiswa_baru',
        'jumlah_pendaftar_ikut_seleksi',
        'jumlah_pendaftar_lulus_seleksi',
        'jumlah_daftar_ulang',
        'jumlah_mengundurkan_diri',
        'tanggal_awal_perkuliahan',
        'tanggal_akhir_perkuliahan',
        'jumlah_minggu_pertemuan',
        'status_sync',
        'id_prodi'
    ];

    protected $casts = [
        'id' => 'string',
        'nama_program_studi' => 'string',
        'nama_semester' => 'string',
        'tanggal_awal_perkuliahan' => 'date',
        'tanggal_akhir_perkuliahan' => 'date',
        'status_sync' => 'string',
        'id_prodi' => 'string'
    ];

    public static array $rules = [
        'nama_program_studi' => 'required|string|max:255',
        'id_semester' => 'required',
        'nama_semester' => 'required|string|max:255',
        'jumlah_target_mahasiswa_baru' => 'required',
        'jumlah_pendaftar_ikut_seleksi' => 'required',
        'jumlah_pendaftar_lulus_seleksi' => 'required',
        'jumlah_daftar_ulang' => 'required',
        'jumlah_mengundurkan_diri' => 'required',
        'tanggal_awal_perkuliahan' => 'required',
        'tanggal_akhir_perkuliahan' => 'required',
        'jumlah_minggu_pertemuan' => 'required',
        'status_sync' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_prodi' => 'required|string|max:36'
    ];

    
}
