<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Komponen extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'komponen';
    protected $fillable = ['name'];

    public function pengaturan()
    {
        return $this->belongsToMany(
            PengaturanKomponen::class,'komponen_has_pengaturan','komponen_id','pengaturan_komponen_id')->withTimestamps();
    }
}
