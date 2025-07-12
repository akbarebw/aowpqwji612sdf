<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;

    protected $fillable = [
       'id_kelas_kuliah',
       'id_mahasiswa',
       'nilai_akhir',
       'ikut_uas',
       'keterangan',
    ];

    public function kelasKuliah()
    {
        return $this->belongsTo(KelasKuliah::class, 'id_kelas_kuliah');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }

    public function bobotKomponen()
    {
        return $this->belongsToMany(BobotKomponen::class, 'nilai_has_bobot_komponen');
    }

}
