<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PengaturanKomponen extends Model
{

    use HasFactory, SoftDeletes;
    protected $table = 'pengaturan_komponen';

    protected $fillable = ['jenis', 'bobot_standar'];

    public function komponen()
    {
        return $this->belongsToMany(Komponen::class, 'komponen_has_pengaturan', 'pengaturan_komponen_id', 'komponen_id')->withTimestamps();
    }
    public function komponenPivot()
    {
        return $this->hasMany(KomponenHasPengaturan::class, 'pengaturan_komponen_id');
    }
}
