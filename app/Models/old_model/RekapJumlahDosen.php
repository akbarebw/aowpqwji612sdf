<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class RekapJumlahDosen extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    
    public $table = 'rekap_jumlah_dosen';

    public $fillable = [
        'id_periode',
        'nama_periode',
        'nama_program_studi',
        'jumlah_dosen_homebase',
        'is_homebase',
        'id_prodi'
    ];

    protected $casts = [
        'id' => 'string',
        'nama_periode' => 'string',
        'nama_program_studi' => 'string',
        'id_prodi' => 'string'
    ];

    public static array $rules = [
        'id_periode' => 'required',
        'nama_periode' => 'required|string|max:255',
        'nama_program_studi' => 'nullable|string|max:255',
        'jumlah_dosen_homebase' => 'required',
        'is_homebase' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_prodi' => 'required|string|max:36'
    ];

    
}
