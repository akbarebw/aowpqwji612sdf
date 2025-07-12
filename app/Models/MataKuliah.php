<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class MataKuliah
 * 
 * @property string $id
 * @property string $id_matkul
 * @property string $kode_mata_kuliah
 * @property string $nama_mata_kuliah
 * @property int $sks_mata_kuliah
 * @property string $id_prodi
 * @property string $nama_program_studi
 * @property string|null $id_jenis_mata_kuliah
 * @property string|null $id_kelompok_mata_kuliah
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Prodi $prodi
 * @property Collection|KonversiKampusMerdeka[] $konversi_kampus_merdekas
 * @property Collection|RencanaEvaluasi[] $rencana_evaluasis
 *
 * @package App\Models
 */
class MataKuliah extends Model
{
	Use HasUuids;
	protected $table = 'mata_kuliah';
	public $incrementing = false;

	protected $casts = [
		'sks_mata_kuliah' => 'int'
	];

	protected $fillable = [
		'id_matkul',
		'kode_mata_kuliah',
		'nama_mata_kuliah',
		'sks_mata_kuliah',
		'id_prodi',
		'nama_program_studi',
		'id_jenis_mata_kuliah',
		'id_kelompok_mata_kuliah'
	];

	public function prodi()
	{
		return $this->belongsTo(Prodi::class, 'id_prodi', 'id_prodi');
	}

	public function konversi_kampus_merdekas()
	{
		return $this->hasMany(KonversiKampusMerdeka::class, 'id_matkul', 'id_matkul');
	}

	public function rencana_evaluasis()
	{
		return $this->hasMany(RencanaEvaluasi::class, 'id_matkul', 'id_matkul');
	}
}
