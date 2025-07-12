<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bidang extends Model
{
    use HasFactory;
    use HasUuids;

    public $table = 'bidangs';

    public $fillable = [
        'name',
        'id_jenis_bidang',
    ];

    protected $dates = ['deleted_at'];

    public function jenisbidang()
    {
        return $this->belongsTo(JenisBidang::class, 'id_jenis_bidang', 'id');
    }
}
