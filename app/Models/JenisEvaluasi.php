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
 * Class JenisEvaluasi
 *
 * @property string $id
 * @property int $id_jenis_evaluasi
 * @property string $nama_jenis_evaluasi
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|DosenPengajarKelasKuliah[] $dosen_pengajar_kelas_kuliahs
 * @property Collection|RencanaEvaluasi[] $rencana_evaluasis
 *
 * @package App\Models
 */
class JenisEvaluasi extends Model
{
    use HasUuids;
	protected $table = 'jenis_evaluasi';
	public $incrementing = false;

	protected $casts = [
		'id_jenis_evaluasi' => 'int'
	];

	protected $fillable = [
		'id_jenis_evaluasi',
		'nama_jenis_evaluasi'
	];

	public function dosen_pengajar_kelas_kuliahs()
	{
		return $this->hasMany(DosenPengajarKelasKuliah::class, 'id_jenis_evaluasi', 'id_jenis_evaluasi');
	}

	public function rencana_evaluasis()
	{
		return $this->hasMany(RencanaEvaluasi::class, 'id_jenis_evaluasi', 'id_jenis_evaluasi');
	}
}
