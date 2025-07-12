<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Agama extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';


    public $table = 'agama';

    public $fillable = [
        'id_agama',
        'nama_agama'
    ];

    protected $casts = [
        'id' => 'string',
        'nama_agama' => 'string'
    ];

    public static array $rules = [
        'id_agama' => 'required',
        'nama_agama' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
