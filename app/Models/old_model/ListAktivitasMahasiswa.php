<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ListAktivitasMahasiswa extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';  

    public $table = 'list_aktivitas_mahasiswa';

    public $fillable = [
        'asal_data',
        'nm_asaldata',
        'id_aktivitas',
        'program_mbkm',
        'nama_program_mbkm',
        'jenis_anggota',
        'nama_jenis_anggota',
        'id_jenis_aktivitas',
        'nama_jenis_aktivitas',
        'id_prodi',
        'nama_prodi',
        'id_semester',
        'nama_semester',
        'judul',
        'keterangan',
        'lokasi',
        'sk_tugas',
        'sumber_data',
        'tanggal_sk_tugas',
        'tanggal_mulai',
        'tanggal_selesai',
        'untuk_kampus_merdeka',
        'status_sync'
    ];

    protected $casts = [
        'id' => 'string',
        'nm_asaldata' => 'string',
        'id_aktivitas' => 'string',
        'nama_program_mbkm' => 'string',
        'nama_jenis_anggota' => 'string',
        'nama_jenis_aktivitas' => 'string',
        'id_prodi' => 'string',
        'nama_prodi' => 'string',
        'nama_semester' => 'string',
        'judul' => 'string',
        'keterangan' => 'string',
        'lokasi' => 'string',
        'sumber_data' => 'string',
        'tanggal_sk_tugas' => 'datetime',
        'tanggal_mulai' => 'datetime',
        'tanggal_selesai' => 'datetime',
        'status_sync' => 'string'
    ];

    public static array $rules = [
        'asal_data' => 'required',
        'nm_asaldata' => 'required|string|max:255',
        'id_aktivitas' => 'required|string|max:36',
        'program_mbkm' => 'required',
        'nama_program_mbkm' => 'required|string|max:255',
        'jenis_anggota' => 'required',
        'nama_jenis_anggota' => 'required|string|max:255',
        'id_jenis_aktivitas' => 'required',
        'nama_jenis_aktivitas' => 'required|string|max:255',
        'id_prodi' => 'required|string|max:36',
        'nama_prodi' => 'required|string|max:255',
        'id_semester' => 'required',
        'nama_semester' => 'required|string|max:255',
        'judul' => 'required|string',
        'keterangan' => 'nullable|string',
        'lokasi' => 'nullable|string|max:255',
        'sumber_data' => 'nullable|string|max:255',
        'tanggal_sk_tugas' => 'required',
        'tanggal_mulai' => 'nullable',
        'tanggal_selesai' => 'nullable',
        'untuk_kampus_merdeka' => 'required',
        'status_sync' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
