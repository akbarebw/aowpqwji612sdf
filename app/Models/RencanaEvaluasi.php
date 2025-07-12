<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class RencanaEvaluasi
 *
 * @property string $id
 * @property int $id_jenis_evaluasi
 * @property string $id_rencana_evaluasi
 * @property string $jenis_evaluasi
 * @property string $nama_mata_kuliah
 * @property string $kode_mata_kuliah
 * @property float $sks_mata_kuliah
 * @property string $nama_program_studi
 * @property string|null $nama_evaluasi
 * @property string $deskripsi_indonesia
 * @property string $deskrips_inggris
 * @property int $nomor_urut
 * @property float $bobot_evaluasi
 * @property string $status_sync
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_matkul
 * @property string $id_prodi
 *
 * @property MataKuliah $mata_kuliah
 * @property Prodi $prodi
 *
 * @package App\Models
 */
class RencanaEvaluasi extends Model
{
    use HasUuids;
	protected $table = 'rencana_evaluasi';
	public $incrementing = false;

	protected $casts = [
		'id_jenis_evaluasi' => 'int',
		'sks_mata_kuliah' => 'float',
		'nomor_urut' => 'int',
		'bobot_evaluasi' => 'float'
	];

	protected $fillable = [
		'id_jenis_evaluasi',
		'id_rencana_evaluasi',
		'jenis_evaluasi',
		'nama_mata_kuliah',
		'kode_mata_kuliah',
		'sks_mata_kuliah',
		'nama_program_studi',
		'nama_evaluasi',
		'deskripsi_indonesia',
		'deskrips_inggris',
		'nomor_urut',
		'bobot_evaluasi',
		'status_sync',
		'id_matkul',
		'id_prodi'
	];

	public function jenis_evaluasi()
	{
		return $this->belongsTo(JenisEvaluasi::class, 'id_jenis_evaluasi', 'id_jenis_evaluasi');
	}

	public function mata_kuliah()
	{
		return $this->belongsTo(MataKuliah::class, 'id_matkul', 'id_matkul');
	}

	public function prodi()
	{
		return $this->belongsTo(Prodi::class, 'id_prodi', 'id_prodi');
	}
}
