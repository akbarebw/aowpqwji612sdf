<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class MatkulKurikulum
 *
 * @property string $id
 * @property Carbon|null $tgl_create
 * @property string|null $nama_kurikulum
 * @property string|null $kode_mata_kuliah
 * @property string|null $nama_mata_kuliah
 * @property string|null $nama_program_studi
 * @property int|null $semester
 * @property string|null $semester_mulai_berlaku
 * @property int|null $sks_mata_kuliah
 * @property int|null $sks_tatap_muka
 * @property int|null $sks_praktek
 * @property int|null $sks_praktek_lapangan
 * @property int|null $sks_simulasi
 * @property int|null $apakah_wajib
 * @property string|null $status_sync
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $id_semester
 * @property string $id_kurikulum
 * @property string $id_prodi
 * @property string $id_matkul
 *
 * @property Kurikulum $kurikulum
 * @property Prodi $prodi
 *
 * @package App\Models
 */
class MatkulKurikulum extends Model
{
    use HasUuids;
	protected $table = 'matkul_kurikulum';
	public $incrementing = false;

	protected $casts = [
		'tgl_create' => 'datetime',
		'semester' => 'int',
		'sks_mata_kuliah' => 'int',
		'sks_tatap_muka' => 'int',
		'sks_praktek' => 'int',
		'sks_praktek_lapangan' => 'int',
		'sks_simulasi' => 'int',
		'apakah_wajib' => 'int',
		'id_semester' => 'int'
	];

	protected $fillable = [
		'tgl_create',
		'nama_kurikulum',
		'kode_mata_kuliah',
		'nama_mata_kuliah',
		'nama_program_studi',
		'semester',
		'semester_mulai_berlaku',
		'sks_mata_kuliah',
		'sks_tatap_muka',
		'sks_praktek',
		'sks_praktek_lapangan',
		'sks_simulasi',
		'apakah_wajib',
		'status_sync',
		'id_semester',
		'id_kurikulum',
		'id_prodi',
		'id_matkul'
	];

	public function kurikulum()
	{
		return $this->belongsTo(Kurikulum::class, 'id_kurikulum', 'id_kurikulum');
	}

	public function prodi()
	{
		return $this->belongsTo(Prodi::class, 'id_prodi', 'id_prodi');
	}

	public function semester()
	{
		return $this->belongsTo(Semester::class, 'id_semester', 'id_semester');
	}
}
