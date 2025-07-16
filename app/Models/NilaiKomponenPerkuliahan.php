<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class NilaiKomponenPerkuliahan extends Model
{
    protected $table = 'nilai_komponen_perkuliahan';
    public $incrementing = false;
    protected $keyType = 'string'; // jika UUID, atau int jika numeric

    protected $fillable = [
        'id',
        'id_detail_nilai',
        'id_komponen',
        'id_bobot_komponen',
        'nilai',
    ];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }
    public function detailNilai()
    {
        return $this->belongsTo(DetailNilaiPerkuliahan::class, 'id_detail_nilai');
    }
}
