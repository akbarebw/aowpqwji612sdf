<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StatusKepegawaian;

class PegawaiAset extends Model
{
    use HasFactory;
    use HasUuids;

    protected $guarded = [];

    public function aset()
    {
        return $this->belongsTo(Aset::class, 'aset_id', 'id');
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
