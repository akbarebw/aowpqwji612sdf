<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengajuan extends Model
{
    use HasFactory;
    use HasUuids;

    public $table = 'pengajuan';

    protected $fillable = [
        'sk_pangkat_terakhir',
        'sk_pns',
        'dp3_skp',
    ];
}
