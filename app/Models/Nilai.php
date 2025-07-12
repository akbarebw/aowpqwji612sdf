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
 * Class Nilai
 *
 * @property string $id
 * @property string $id_kelas_kuliah
 * @property string $id_mahasiswa
 * @property float $nilai_akhir
 * @property bool $ikut_uas
 * @property string $keterangan
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property KelasKuliah $kelas_kuliah
 * @property Mahasiswa $mahasiswa
 * @property Collection|BobotKomponen[] $bobot_komponen
 *
 * @package App\Models
 */
class Nilai extends Model
{
	protected $table = 'nilai';
	public $incrementing = true;

	protected $casts = [
		'nilai_akhir' => 'float',
		'ikut_uas' => 'bool'
	];

	protected $fillable = [
		'id_kelas_kuliah',
		'id_mahasiswa',
		'nilai_akhir',
		'ikut_uas',
		'keterangan'
	];

	public function kelas_kuliah()
	{
		return $this->belongsTo(KelasKuliah::class, 'id_kelas_kuliah');
	}

	public function mahasiswa()
	{
		return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
	}

	public function bobot_komponen()
	{
		return $this->belongsToMany(BobotKomponen::class, 'nilai_has_bobot_komponen');
	}
}
