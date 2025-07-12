<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisBidang extends Model
{
    use HasFactory;
    use HasUuids;

    public $table = 'jenis_bidang';

    public $fillable = [
        'name'
    ];

    protected $dates = ['deleted_at'];
}
