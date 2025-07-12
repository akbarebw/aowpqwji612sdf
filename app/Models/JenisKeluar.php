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
 * Class JenisKeluar
 *
 * @property string $id
 * @property string $id_jenis_keluar
 * @property string $jenis_keluar
 * @property string $apa_mahasiswa
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|ExportDataMahasiswaLulus[] $export_data_mahasiswa_luluses
 * @property Collection|PenugasanDosen[] $penugasan_dosens
 *
 * @package App\Models
 */
class JenisKeluar extends Model
{
    use HasUuids;
	protected $table = 'jenis_keluar';
	public $incrementing = false;

	protected $fillable = [
		'id_jenis_keluar',
		'jenis_keluar',
		'apa_mahasiswa'
	];

	public function export_data_mahasiswa_luluses()
	{
		return $this->hasMany(ExportDataMahasiswaLulus::class, 'id_jenis_keluar', 'id_jenis_keluar');
	}

	public function penugasan_dosens()
	{
		return $this->hasMany(PenugasanDosen::class, 'id_jns_keluar', 'id_jenis_keluar');
	}
}
