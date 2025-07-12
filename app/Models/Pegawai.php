<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasUuids;
    use HasFactory;

    protected $table = 'pegawai';

    protected $fillable = [
        'nama',
        'email',
        'nip',
        'kontak',
        'foto',
        'tempat_lahir',
        'tanggal_lahir',
        'umur',
        'jenis_kelamin',
        'id_agama',
        'alamat',
        'kewaranegaraan',
        'status_perkawinan',
        'kontak_darurat',
        'user_id',
        'pangkat_golongan_id'
    ];
/*************  ✨ Windsurf Command ⭐  *************/
/**
 * Get the Agama that owns the Pegawai.
 *
 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */

/*******  78337e3c-8309-401f-a42b-4b16d1d4c0f7  *******/
    public function agama()
    {
        return $this->belongsTo(Agama::class, 'id_agama', 'id_agama');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function jabatanStruktural()
    {
        return $this->belongsToMany(
            JabatanStruktural::class,         // Model tujuan relasi
            'pegawai_jabatan_struktural',      // Nama tabel pivot
            'pegawai_id',                     // Foreign key di tabel pivot mengarah ke Pegawai
            'jabatan_struktural_id'            // Foreign key di tabel pivot mengarah ke JabatanStruktural
        )
        ->withPivot(['status','is_aktif'])                 // Ambil juga field 'status' dari tabel pivot
        ->withTimestamps();                   // Pivot punya kolom created_at dan updated_at
    }

    public function jabatanFungsional()
    {
        return $this->belongsToMany(
            JabatanFungsional::class,
            'pegawai_jabatan_fungsional',
            'pegawai_id',
            'jabatan_fungsional_id'
        )
        ->withPivot(['status','is_aktif'])
        ->withTimestamps();
    }
}
