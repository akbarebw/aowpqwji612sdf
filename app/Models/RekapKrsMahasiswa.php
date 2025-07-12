<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class RekapKrsMahasiswa
 *
 * @property string $id
 * @property string $nama_program_studi
 * @property int $id_periode
 * @property string $nama_periode
 * @property string $id_registrasi_mahasiswa
 * @property string $nim
 * @property string $nama_mahasiswa
 * @property int $angkatan
 * @property int $id_semester
 * @property string $kode_mata_kuliah
 * @property string $nama_mata_kuliah
 * @property float $sks_mata_kuliah
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_prodi
 * @property string $id_matkul
 *
 * @property ListMataKuliah $list_mata_kuliah
 * @property Prodi $prodi
 * @property Semester $semester
 *
 * @package App\Models
 */
class RekapKrsMahasiswa extends Model
{
    use HasUuids;
	protected $table = 'rekap_krs_mahasiswa';
	public $incrementing = false;

	protected $casts = [
		'id_periode' => 'int',
		'angkatan' => 'int',
		'id_semester' => 'int',
		'sks_mata_kuliah' => 'float'
	];

	protected $fillable = [
		'nama_program_studi',
		'id_periode',
		'nama_periode',
		'id_registrasi_mahasiswa',
		'nim',
		'nama_mahasiswa',
		'angkatan',
		'id_semester',
		'kode_mata_kuliah',
		'nama_mata_kuliah',
		'sks_mata_kuliah',
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

	public function semester()
	{
		return $this->belongsTo(Semester::class, 'id_semester', 'id_semester');
	}
}
