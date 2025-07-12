<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class ExportDataMatkulProdi
 *
 * @property string $id
 * @property string $id_program_studi
 * @property string $nama_program_studi
 * @property string $kode_mata_kuliah
 * @property string $nama_mata_kuliah
 * @property float $sks_mata_kuliah
 * @property string|null $id_jenis_mata_kuliah
 * @property string|null $id_kelompok_mata_kuliah
 * @property string $status_sync
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_matkul
 *
 * @property ListMataKuliah $list_mata_kuliah
 *
 * @package App\Models
 */
class ExportDataMatkulProdi extends Model
{
    use HasUuids;
	protected $table = 'export_data_matkul_prodi';
	public $incrementing = false;

	protected $casts = [
		'sks_mata_kuliah' => 'float'
	];

	protected $fillable = [
		'id_program_studi',
		'nama_program_studi',
		'kode_mata_kuliah',
		'nama_mata_kuliah',
		'sks_mata_kuliah',
		'id_jenis_mata_kuliah',
		'id_kelompok_mata_kuliah',
		'status_sync',
		'id_matkul'
	];

	public function list_mata_kuliah()
	{
		return $this->belongsTo(ListMataKuliah::class, 'id_matkul', 'id_matkul');
	}
}
