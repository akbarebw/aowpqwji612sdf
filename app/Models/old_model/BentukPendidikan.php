<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class BentukPendidikan extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';


    protected $dates = ['deleted_at'];


    public $table = 'bentuk_pendidikan';

    public $fillable = [
        'id_bentuk_pendidikan',
        'nama_bentuk_pendidikan'
    ];

    protected $casts = [
        'id' => 'string',
        'nama_bentuk_pendidikan' => 'string'
    ];

    public static array $rules = [
        'id_bentuk_pendidikan' => 'required',
        'nama_bentuk_pendidikan' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
