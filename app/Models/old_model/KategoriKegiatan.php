<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class KategoriKegiatan extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';


    public $table = 'kategori_kegiatan';

    public $fillable = [
        'id_kategori_kegiatan',
        'nama_kategori_kegiatan'
    ];

    protected $casts = [
        'id' => 'string',
        'nama_kategori_kegiatan' => 'string'
    ];

    public static array $rules = [
        'id_kategori_kegiatan' => 'required',
        'nama_kategori_kegiatan' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
