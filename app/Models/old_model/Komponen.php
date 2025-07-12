<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Komponen extends Model
{
    use HasFactory;
    use HasUuids;

    public $table = 'komponen';

    public $fillable = [
        'name'
    ];

    protected $dates = ['deleted_at'];
}
