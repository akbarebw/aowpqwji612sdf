<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class RencanaPembelajaran
 *
 * @property string $id
 * @property string $id_rencana_ajar
 * @property string $nama_mata_kuliah
 * @property string $kode_mata_kuliah
 * @property int $sks_mata_kuliah
 * @property string $nama_program_studi
 * @property int $pertemuan
 * @property string $materi_indonesia
 * @property string|null $materi_inggris
 * @property string $status_sync
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_matkul
 * @property string $id_prodi
 *
 * @property Prodi $prodi
 *
 * @package App\Models
 */
class RencanaPembelajaran extends Model
{
    use HasUuids;
	protected $table = 'rencana_pembelajaran';
	public $incrementing = false;

	protected $casts = [
		'sks_mata_kuliah' => 'int',
		'pertemuan' => 'int'
	];

	protected $fillable = [
		'id_rencana_ajar',
		'nama_mata_kuliah',
		'kode_mata_kuliah',
		'sks_mata_kuliah',
		'nama_program_studi',
		'pertemuan',
		'materi_indonesia',
		'materi_inggris',
		'status_sync',
		'id_matkul',
		'id_prodi'
	];

	public function prodi()
	{
		return $this->belongsTo(Prodi::class, 'id_prodi', 'id_prodi');
	}
}
