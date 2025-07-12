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
 * Class Agama
 *
 * @property string $id
 * @property int $id_agama
 * @property string $nama_agama
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|BiodataDosen[] $biodata_dosens
 * @property Collection|BiodataMahasiswa[] $biodata_mahasiswas
 * @property Collection|DataLengkapMahasiswaProdi[] $data_lengkap_mahasiswa_prodis
 * @property Collection|DataTerhapus[] $data_terhapuses
 * @property Collection|Dosen[] $dosens
 * @property Collection|ExportDataMahasiswa[] $export_data_mahasiswas
 * @property Collection|ExportDataPenugasanDosen[] $export_data_penugasan_dosens
 * @property Collection|Mahasiswa[] $mahasiswas
 *
 * @package App\Models
 */
class Agama extends Model
{
    use HasUuids;
	protected $table = 'agama';
	public $incrementing = false;

	protected $casts = [
		'id_agama' => 'int'
	];

	protected $fillable = [
		'id_agama',
		'nama_agama'
	];

	public function biodata_dosens()
	{
		return $this->hasMany(BiodataDosen::class, 'id_agama', 'id_agama');
	}

	public function biodata_mahasiswas()
	{
		return $this->hasMany(BiodataMahasiswa::class, 'id_agama', 'id_agama');
	}

	public function data_lengkap_mahasiswa_prodis()
	{
		return $this->hasMany(DataLengkapMahasiswaProdi::class, 'id_agama', 'id_agama');
	}

	public function data_terhapuses()
	{
		return $this->hasMany(DataTerhapus::class, 'id_agama', 'id_agama');
	}

	public function dosens()
	{
		return $this->hasMany(Dosen::class, 'id_agama', 'id_agama');
	}

	public function export_data_mahasiswas()
	{
		return $this->hasMany(ExportDataMahasiswa::class, 'id_agama', 'id_agama');
	}

	public function export_data_penugasan_dosens()
	{
		return $this->hasMany(ExportDataPenugasanDosen::class, 'id_agama', 'id_agama');
	}

	public function mahasiswas()
	{
		return $this->hasMany(Mahasiswa::class, 'id_agama', 'id_agama');
	}
}
