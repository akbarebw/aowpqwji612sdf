<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\StatusKepegawaian;

class PegawaiStatusKepegawaian extends Model
{
    use HasFactory;
    use HasUuids;

    protected $guarded = [];

    public function statusKepegawaian()
    {
        return $this->belongsTo(StatusKepegawaian::class, 'status_kepegawaian_id', 'id');
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
