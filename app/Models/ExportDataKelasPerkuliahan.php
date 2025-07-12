<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class ExportDataKelasPerkuliahan
 *
 * @property string $id
 * @property string $nama_program_studi
 * @property string $id_periode
 * @property string $nama_periode
 * @property string $kode_mata_kuliah
 * @property string $nama_mata_kuliah
 * @property string $nama_kelas_kuliah
 * @property float $sks_mata_kuliah
 * @property int $jumlah_krs
 * @property int $jumlah_dosen
 * @property string $status_sync
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_prodi
 * @property string $id_matkul
 * @property string $id_kelas_kuliah
 *
 * @property KelasKuliah $kelas_kuliah
 * @property ListMataKuliah $list_mata_kuliah
 * @property Prodi $prodi
 *
 * @package App\Models
 */
class ExportDataKelasPerkuliahan extends Model
{
    use HasUuids;
	protected $table = 'export_data_kelas_perkuliahan';
	public $incrementing = false;

	protected $casts = [
		'sks_mata_kuliah' => 'float',
		'jumlah_krs' => 'int',
		'jumlah_dosen' => 'int'
	];

	protected $fillable = [
		'nama_program_studi',
		'id_periode',
		'nama_periode',
		'kode_mata_kuliah',
		'nama_mata_kuliah',
		'nama_kelas_kuliah',
		'sks_mata_kuliah',
		'jumlah_krs',
		'jumlah_dosen',
		'status_sync',
		'id_prodi',
		'id_matkul',
		'id_kelas_kuliah'
	];

	public function kelas_kuliah()
	{
		return $this->belongsTo(KelasKuliah::class, 'id_kelas_kuliah', 'id_kelas_kuliah');
	}

	public function list_mata_kuliah()
	{
		return $this->belongsTo(ListMataKuliah::class, 'id_matkul', 'id_matkul');
	}

	public function prodi()
	{
		return $this->belongsTo(Prodi::class, 'id_prodi', 'id_prodi');
	}
}
