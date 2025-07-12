<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ListSkalaNilaiProdi extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    

    public $table = 'list_skala_nilai_prodi';

    public $fillable = [
        'tgl_create',
        'id_bobot_nilai',
        'nama_program_studi',
        'nilai_huruf',
        'nilai_indeks',
        'bobot_minimum',
        'bobot_maksimum',
        'tanggal_mulai_efektif',
        'tanggal_akhir_efektif',
        'status_sync',
        'id_prodi'
    ];

    protected $casts = [
        'id' => 'string',
        'tgl_create' => 'date',
        'id_bobot_nilai' => 'string',
        'nama_program_studi' => 'string',
        'nilai_huruf' => 'string',
        'nilai_indeks' => 'string',
        'bobot_minimum' => 'string',
        'bobot_maksimum' => 'string',
        'tanggal_mulai_efektif' => 'date',
        'tanggal_akhir_efektif' => 'date',
        'status_sync' => 'string',
        'id_prodi' => 'string'
    ];

    public static array $rules = [
        'tgl_create' => 'required',
        'id_bobot_nilai' => 'required|string|max:36',
        'nama_program_studi' => 'required|string|max:255',
        'nilai_huruf' => 'required|string|max:255',
        'nilai_indeks' => 'required|string|max:255',
        'bobot_minimum' => 'required|string|max:255',
        'bobot_maksimum' => 'required|string|max:255',
        'tanggal_mulai_efektif' => 'required',
        'tanggal_akhir_efektif' => 'required',
        'status_sync' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'id_prodi' => 'required|string|max:36'
    ];

    
}
