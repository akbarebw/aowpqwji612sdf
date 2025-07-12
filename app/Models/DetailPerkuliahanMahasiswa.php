<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class DetailPerkuliahanMahasiswa
 *
 * @property string $id
 * @property string $id_registrasi_mahasiswa
 * @property string $nama_program_studi
 * @property int $angkatan
 * @property int $id_semester
 * @property string $nim
 * @property string $nama_mahasiswa
 * @property string $nama_semester
 * @property string $id_status_mahasiswa
 * @property string $nama_status_mahasiswa
 * @property float|null $ips
 * @property float|null $ipk
 * @property int|null $sks_semester
 * @property int|null $sks_total
 * @property string $status_sync
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_prodi
 *
 * @property Prodi $prodi
 * @property Semester $semester
 * @property StatusMahasiswa $status_mahasiswa
 *
 * @package App\Models
 */
class DetailPerkuliahanMahasiswa extends Model
{
    use HasUuids;
	protected $table = 'detail_perkuliahan_mahasiswa';
	public $incrementing = false;

	protected $casts = [
		'angkatan' => 'int',
		'id_semester' => 'int',
		'ips' => 'float',
		'ipk' => 'float',
		'sks_semester' => 'int',
		'sks_total' => 'int'
	];

	protected $fillable = [
		'id_registrasi_mahasiswa',
		'nama_program_studi',
		'angkatan',
		'id_semester',
		'nim',
		'nama_mahasiswa',
		'nama_semester',
		'id_status_mahasiswa',
		'nama_status_mahasiswa',
		'ips',
		'ipk',
		'sks_semester',
		'sks_total',
		'status_sync',
		'id_prodi'
	];

	public function prodi()
	{
		return $this->belongsTo(Prodi::class, 'id_prodi', 'id_prodi');
	}

	public function semester()
	{
		return $this->belongsTo(Semester::class, 'id_semester', 'id_semester');
	}

	public function status_mahasiswa()
	{
		return $this->belongsTo(StatusMahasiswa::class, 'id_status_mahasiswa', 'id_status_mahasiswa');
	}
}
