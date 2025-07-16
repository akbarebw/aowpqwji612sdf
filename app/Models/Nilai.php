<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Nilai extends Model
{
	use HasFactory;

	protected $table = 'nilai';
	public $incrementing = true;

	protected $fillable = [
		'id_kelas_kuliah',
		'id_mahasiswa',
		'ikut_uas',
		'nilai_angka',
		'nilai_huruf',
		'keterangan',
	];

	protected $casts = [
		'ikut_uas' => 'boolean',
		'nilai_angka' => 'float',
	];

	public function kelas_kuliah()
	{
		return $this->belongsTo(KelasKuliah::class, 'id_kelas_kuliah', 'id_kelas_kuliah');
	}

	public function mahasiswa()
	{
		return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa', 'id_mahasiswa');
	}

	public function bobot_komponen()
	{
		return $this->belongsToMany(BobotKomponen::class, 'nilai_has_bobot_komponen')
			->withTimestamps();
	}
}
