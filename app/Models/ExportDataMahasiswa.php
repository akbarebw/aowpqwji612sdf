<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class ExportDataMahasiswa
 *
 * @property string $id
 * @property int $angkatan
 * @property string $id_mahasiswa
 * @property string $id_registrasi_mahasiswa
 * @property string $nim
 * @property string $nama_mahasiswa
 * @property string $program_studi
 * @property string $periode_masuk
 * @property string $status_mahasiswa
 * @property string $nama_jenis_daftar
 * @property string $jenis_kelamin
 * @property string $tempat_lahir
 * @property Carbon $tanggal_lahir
 * @property int $id_agama
 * @property string $nama_agama
 * @property string $status_sync
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_prodi
 * @property string $id_jenis_daftar
 *
 * @property Agama $agama
 * @property JenisPendaftaran $jenis_pendaftaran
 * @property Prodi $prodi
 *
 * @package App\Models
 */
class ExportDataMahasiswa extends Model
{
    use HasUuids;
	protected $table = 'export_data_mahasiswa';
	public $incrementing = false;

	protected $casts = [
		'angkatan' => 'int',
		'tanggal_lahir' => 'datetime',
		'id_agama' => 'int'
	];

	protected $fillable = [
		'angkatan',
		'id_mahasiswa',
		'id_registrasi_mahasiswa',
		'nim',
		'nama_mahasiswa',
		'program_studi',
		'periode_masuk',
		'status_mahasiswa',
		'nama_jenis_daftar',
		'jenis_kelamin',
		'tempat_lahir',
		'tanggal_lahir',
		'id_agama',
		'nama_agama',
		'status_sync',
		'id_prodi',
		'id_jenis_daftar'
	];

	public function agama()
	{
		return $this->belongsTo(Agama::class, 'id_agama', 'id_agama');
	}

	public function jenis_pendaftaran()
	{
		return $this->belongsTo(JenisPendaftaran::class, 'id_jenis_daftar', 'id_jenis_daftar');
	}

	public function prodi()
	{
		return $this->belongsTo(Prodi::class, 'id_prodi', 'id_prodi');
	}
}
