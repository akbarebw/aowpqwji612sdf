<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AllProfilPt extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = 'all_profil_pt';

    protected $fillable = [
        'id_perguruan_tinggi',
        'kode_perguruan_tinggi',
        'nama_perguruan_tinggi',
        'nama_singkat',

    ];

    

}
