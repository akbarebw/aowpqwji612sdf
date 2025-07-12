<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class KrsMahasiswa
 *
 * @property string $id
 * @property string $id_registrasi_mahasiswa
 * @property int $id_periode
 * @property string $nama_program_studi
 * @property string $kode_mata_kuliah
 * @property string $nama_mata_kuliah
 * @property string $id_kelas
 * @property string $nama_kelas_kuliah
 * @property float $sks_mata_kuliah
 * @property string $nim
 * @property string $nama_mahasiswa
 * @property int $angkatan
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_prodi
 * @property string $id_matkul
 *
 * @property ListMataKuliah $list_mata_kuliah
 * @property Prodi $prodi
 *
 * @package App\Models
 */
class KrsMahasiswa extends Model
{
	use HasUuids;
	protected $table = 'krs_mahasiswa';
	public $incrementing = false;

	protected $casts = [
		'id_periode' => 'int',
		'sks_mata_kuliah' => 'float',
		'angkatan' => 'int'
	];

	protected $fillable = [
		'id_registrasi_mahasiswa',
		'id_periode',
		'nama_program_studi',
		'kode_mata_kuliah',
		'nama_mata_kuliah',
		'id_kelas',
		'nama_kelas_kuliah',
		'sks_mata_kuliah',
		'nim',
		'nama_mahasiswa',
		'angkatan',
		'id_prodi',
		'id_matkul'
	];

	public function list_mata_kuliah()
	{
		return $this->belongsTo(ListMataKuliah::class, 'id_matkul', 'id_matkul');
	}

	public function prodi()
	{
		return $this->belongsTo(Prodi::class, 'id_prodi', 'id_prodi');
	}

	public function mahasiswa()
	{
		return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
	}

	// Relasi ke Kelas Kuliah
	public function kelasKuliah()
	{
		return $this->belongsTo(KelasKuliah::class, 'id_kelas', 'id_kelas_kuliah');
	}
}
