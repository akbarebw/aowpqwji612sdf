<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JabatanStruktural extends Model
{
    use HasFactory;
    use HasUuids;

    public $table = 'jabatan_struktural';

    public $fillable = [
        'name',
        'bidang_id'
    ];

public function bidang()
{
    return $this->belongsTo(Bidang::class);

}
}
