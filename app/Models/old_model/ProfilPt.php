<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class ProfilPt extends Model
{
    use HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
    
    public $table = 'profil_pt';

    public $fillable = [
        'id_perguruan_tinggi',
        'kode_perguruan_tinggi',
        'nama_perguruan_tinggi',
        'telepon',
        'faximile',
        'email',
        'website',
        'jalan',
        'dusun',
        'rt_rw',
        'kelurahan',
        'kode_pos',
        'id_wilayah',
        'nama_wilayah',
        'lintang_bujur',
        'bank',
        'unit_cabang',
        'nomor_rekening',
        'mbs',
        'luas_tanah_milik',
        'luas_tanah_bukan_milik',
        'sk_pendirian',
        'tanggal_sk_pendirian',
        'id_status_milik',
        'nama_status_milik',
        'status_perguruan_tinggi',
        'sk_izin_operasional',
        'tanggal_izin_operasional'
    ];

    protected $casts = [
        'id' => 'string',
        'id_perguruan_tinggi' => 'string',
        'nama_perguruan_tinggi' => 'string',
        'telepon' => 'string',
        'faximile' => 'string',
        'email' => 'string',
        'website' => 'string',
        'jalan' => 'string',
        'dusun' => 'string',
        'rt_rw' => 'string',
        'kelurahan' => 'string',
        'id_wilayah' => 'string',
        'nama_wilayah' => 'string',
        'lintang_bujur' => 'string',
        'bank' => 'string',
        'unit_cabang' => 'string',
        'nomor_rekening' => 'string',
        'sk_pendirian' => 'string',
        'tanggal_sk_pendirian' => 'datetime',
        'nama_status_milik' => 'string',
        'status_perguruan_tinggi' => 'string',
        'sk_izin_operasional' => 'string',
        'tanggal_izin_operasional' => 'date'
    ];

    public static array $rules = [
        'id_perguruan_tinggi' => 'required|string|max:36',
        'kode_perguruan_tinggi' => 'required',
        'nama_perguruan_tinggi' => 'required|string|max:255',
        'telepon' => 'required|string|max:255',
        'faximile' => 'required|string|max:255',
        'email' => 'required|string|max:255',
        'website' => 'required|string|max:255',
        'jalan' => 'required|string|max:255',
        'dusun' => 'nullable|string|max:255',
        'rt_rw' => 'nullable|string|max:255',
        'kelurahan' => 'required|string|max:255',
        'kode_pos' => 'required',
        'id_wilayah' => 'required|string|max:36',
        'nama_wilayah' => 'required|string|max:255',
        'lintang_bujur' => 'required|string|max:255',
        'bank' => 'nullable|string|max:255',
        'unit_cabang' => 'nullable|string|max:255',
        'nomor_rekening' => 'nullable|string|max:255',
        'mbs' => 'required',
        'luas_tanah_milik' => 'required',
        'luas_tanah_bukan_milik' => 'required',
        'sk_pendirian' => 'required|string|max:255',
        'tanggal_sk_pendirian' => 'required',
        'id_status_milik' => 'required',
        'nama_status_milik' => 'required|string|max:255',
        'status_perguruan_tinggi' => 'required|string|max:255',
        'sk_izin_operasional' => 'nullable|string|max:255',
        'tanggal_izin_operasional' => 'nullable',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
