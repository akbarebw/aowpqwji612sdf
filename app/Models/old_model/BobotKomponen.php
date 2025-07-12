<?php

namespace App\Models;

use App\Models\ListMataKuliah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BobotKomponen extends Model
{
    use HasFactory;
    use HasUuids;

    public $table = 'bobot_komponen';

    public $fillable = [
        'id_matkul',
        'id_komponen',
        'persentase',
    ];

    public function komponen()
    {
        return $this->belongsTo(Komponen::class, 'id_komponen', 'id');
    }

    public function listMataKuliah()
    {
        return $this->belongsTo(ListMataKuliah::class, 'id_matkul', 'id');
    }

    public function nilaiKomponen()
    {
        return $this->belongsToMany(Nilai::class, 'nilai_has_bobot_komponen');
    }

}
