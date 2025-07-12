<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BobotKomponen extends Model
{
    protected $table = 'bobot_komponen';

    protected $casts = [
        'persentase' => 'int',
    ];

    protected $fillable = [
        'id_matkul',
        'id_komponen',
        'persentase',
    ];

    public function komponen()
    {
        return $this->belongsTo(Komponen::class, 'id_komponen');
    }
}
