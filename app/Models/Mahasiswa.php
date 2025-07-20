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
 * Class Mahasiswa
 *
 * @property string $id
 * @property string $nama_mahasiswa
 * @property string $jenis_kelamin
 * @property Carbon $tanggal_lahir
 * @property string $nipd
 * @property float|null $ipk
 * @property float|null $total_sks
 * @property string $id_sms
 * @property string $id_mahasiswa
 * @property int $id_agama
 * @property string $nama_agama
 * @property string $nama_program_studi
 * @property string|null $id_status_mahasiswa
 * @property string $nama_status_mahasiswa
 * @property string $nim
 * @property string $id_periode
 * @property string $nama_periode_masuk
 * @property string $id_registrasi_mahasiswa
 * @property string|null $id_periode_keluar
 * @property Carbon|null $tanggal_keluar
 * @property Carbon $last_update
 * @property Carbon $tgl_create
 * @property string $status_sync
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_perguruan_tinggi
 * @property string $id_prodi
 *
 * @property Agama $agama
 * @property ProfilPt $profil_pt
 * @property Prodi $prodi
 * @property Collection|Nilai[] $nilais
 *
 * @package App\Models
 */
class Mahasiswa extends Model
{
	use HasUuids;
	protected $table = 'mahasiswa';
	public $incrementing = false;

	protected $casts = [
		'tanggal_lahir' => 'datetime',
		'ipk' => 'float',
		'total_sks' => 'float',
		'id_agama' => 'int',
		'tanggal_keluar' => 'datetime',
		'last_update' => 'datetime',
		'tgl_create' => 'datetime'
	];

	protected $fillable = [
		'nama_mahasiswa',
		'jenis_kelamin',
		'tanggal_lahir',
		'nipd',
		'ipk',
		'total_sks',
		'id_sms',
		'id_mahasiswa',
		'id_agama',
		'nama_agama',
		'nama_program_studi',
		'id_status_mahasiswa',
		'nama_status_mahasiswa',
		'nim',
		'id_periode',
		'nama_periode_masuk',
		'id_registrasi_mahasiswa',
		'id_periode_keluar',
		'tanggal_keluar',
		'last_update',
		'tgl_create',
		'status_sync',
		'id_perguruan_tinggi',
		'id_prodi'
	];

	public function agama()
	{
		return $this->belongsTo(Agama::class, 'id_agama', 'id_agama');
	}

	public function profil_pt()
	{
		return $this->belongsTo(ProfilPt::class, 'id_perguruan_tinggi', 'id_perguruan_tinggi');
	}

	public function prodi()
	{
		return $this->belongsTo(Prodi::class, 'id_prodi', 'id_prodi');
	}

	public function krs()
	{
		return $this->hasMany(KrsMahasiswa::class, 'nim', 'nim');
	}

	// Relasi dengan Nilai
	public function nilai()
	{
		return $this->hasMany(Nilai::class, 'id_mahasiswa', 'nim');
	}
	public function mataKuliah()
	{
		return $this->belongsToMany(MataKuliah::class, 'krs_mahasiswa', 'nim', 'id_matkul');
	}
}
