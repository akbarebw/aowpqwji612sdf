<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class ListNilaiPerkuliahanMahasiswa
 *
 * @property string $id
 * @property string $id_registrasi_mahasiswa
 * @property string $nim
 * @property string $nama_mahasiswa
 * @property string $nama_program_studi
 * @property int $angkatan
 * @property string $id_periode_masuk
 * @property int $id_semester
 * @property string $nama_semester
 * @property string $nama_status_mahasiswa
 * @property float $ips
 * @property float $ipk
 * @property int $sks_semester
 * @property int $sks_total
 * @property int|null $biaya_kuliah_smt
 * @property int $id_pembiayaan
 * @property string $status_sync
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_prodi
 * @property string $id_status_mahasiswa
 *
 * @property Pembiayaan $pembiayaan
 * @property Prodi $prodi
 * @property Semester $semester
 * @property StatusMahasiswa $status_mahasiswa
 *
 * @package App\Models
 */
class ListNilaiPerkuliahanMahasiswa extends Model
{
    use HasUuids;
	protected $table = 'list_nilai_perkuliahan_mahasiswa';
	public $incrementing = false;

	protected $casts = [
		'angkatan' => 'int',
		'id_semester' => 'int',
		'ips' => 'float',
		'ipk' => 'float',
		'sks_semester' => 'int',
		'sks_total' => 'int',
		'biaya_kuliah_smt' => 'int',
		'id_pembiayaan' => 'int'
	];

	protected $fillable = [
		'id_registrasi_mahasiswa',
		'nim',
		'nama_mahasiswa',
		'nama_program_studi',
		'angkatan',
		'id_periode_masuk',
		'id_semester',
		'nama_semester',
		'nama_status_mahasiswa',
		'ips',
		'ipk',
		'sks_semester',
		'sks_total',
		'biaya_kuliah_smt',
		'id_pembiayaan',
		'status_sync',
		'id_prodi',
		'id_status_mahasiswa'
	];

	public function pembiayaan()
	{
		return $this->belongsTo(Pembiayaan::class, 'id_pembiayaan', 'id_pembiayaan');
	}

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
