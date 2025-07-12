<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class DetailMataKuliah
 *
 * @property string $id
 * @property string $kode_mata_kuliah
 * @property string $nama_mata_kuliah
 * @property string $nama_program_studi
 * @property string|null $id_jenis_mata_kuliah
 * @property string|null $id_kelompok_mata_kuliah
 * @property int|null $sks_mata_kuliah
 * @property int|null $sks_tatap_muka
 * @property int|null $sks_praktek
 * @property int|null $sks_praktek_lapangan
 * @property int|null $sks_simulasi
 * @property string|null $metode_kuliah
 * @property string|null $ada_sap
 * @property string|null $ada_silabus
 * @property string|null $ada_bahan_ajar
 * @property string|null $ada_acara_praktek
 * @property string|null $ada_diktat
 * @property Carbon|null $tanggal_mulai_efektif
 * @property Carbon|null $tanggal_selesai_efektif
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_matkul
 * @property string $id_prodi
 *
 * @property Prodi $prodi
 *
 * @package App\Models
 */
class DetailMataKuliah extends Model
{
    use HasUuids;
	protected $table = 'detail_mata_kuliah';
	public $incrementing = false;

	protected $casts = [
		'sks_mata_kuliah' => 'int',
		'sks_tatap_muka' => 'int',
		'sks_praktek' => 'int',
		'sks_praktek_lapangan' => 'int',
		'sks_simulasi' => 'int',
		'tanggal_mulai_efektif' => 'datetime',
		'tanggal_selesai_efektif' => 'datetime'
	];

	protected $fillable = [
		'kode_mata_kuliah',
		'nama_mata_kuliah',
		'nama_program_studi',
		'id_jenis_mata_kuliah',
		'id_kelompok_mata_kuliah',
		'sks_mata_kuliah',
		'sks_tatap_muka',
		'sks_praktek',
		'sks_praktek_lapangan',
		'sks_simulasi',
		'metode_kuliah',
		'ada_sap',
		'ada_silabus',
		'ada_bahan_ajar',
		'ada_acara_praktek',
		'ada_diktat',
		'tanggal_mulai_efektif',
		'tanggal_selesai_efektif',
		'id_matkul',
		'id_prodi'
	];

	public function prodi()
	{
		return $this->belongsTo(Prodi::class, 'id_prodi', 'id_prodi');
	}
}
