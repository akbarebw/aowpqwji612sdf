<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BobotKomponenKelasDosen extends Model
{
    protected $table = 'bobot_komponen_kelas_dosen';

    protected $fillable = [
        'id_dosen',
        'id_kelas_kuliah',
        'id_komponen',
        'persentase',
    ];
}
