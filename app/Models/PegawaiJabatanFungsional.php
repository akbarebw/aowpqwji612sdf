<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PegawaiJabatanFungsional extends Model
{
    use HasFactory;

    use HasUuids;

    protected $table = "pegawai_jabatan_fungsional";

    protected $fillable = [
        'jabatan_fungsional_id',
        'pegawai_id',
        'status',
        'mulai_menjabat',
        'selesai_menjabat',
        'is_aktif',
    ];

    public function jabatanFungsional()
    {
        return $this->belongsTo(JabatanFungsional::class, 'jabatan_fungsional_id', 'id');
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
