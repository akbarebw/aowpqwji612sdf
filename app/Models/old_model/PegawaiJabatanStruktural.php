<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PegawaiJabatanStruktural extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = "pegawai_jabatan_struktural";

    protected $fillable = [
        'jabatan_struktural_id',
        'pegawai_id',
        'status',
        'mulai_menjabat',
        'selesai_menjabat',
        'is_aktif',
    ];

    public function jabatanStruktural()
    {
        return $this->belongsTo(JabatanStruktural::class);
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
