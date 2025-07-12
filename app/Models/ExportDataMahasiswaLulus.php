<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class ExportDataMahasiswaLulus
 *
 * @property string $id
 * @property string $id_registrasi_mahasiswa
 * @property string $nim
 * @property string $nama_mahasiswa
 * @property string $jenis_kelamin
 * @property string $nama_program_studi
 * @property string $id_periode
 * @property string $nama_periode_masuk
 * @property string $id_jenis_keluar
 * @property string $nama_jenis_keluar
 * @property string|null $nomor_ijazah
 * @property Carbon|null $tanggal_keluar
 * @property string|null $keterangan
 * @property string $status_sync
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_prodi
 *
 * @property JenisKeluar $jenis_keluar
 * @property Prodi $prodi
 *
 * @package App\Models
 */
class ExportDataMahasiswaLulus extends Model
{
    use HasUuids;
	protected $table = 'export_data_mahasiswa_lulus';
	public $incrementing = false;

	protected $casts = [
		'tanggal_keluar' => 'datetime'
	];

	protected $fillable = [
		'id_registrasi_mahasiswa',
		'nim',
		'nama_mahasiswa',
		'jenis_kelamin',
		'nama_program_studi',
		'id_periode',
		'nama_periode_masuk',
		'id_jenis_keluar',
		'nama_jenis_keluar',
		'nomor_ijazah',
		'tanggal_keluar',
		'keterangan',
		'status_sync',
		'id_prodi'
	];

	public function jenis_keluar()
	{
		return $this->belongsTo(JenisKeluar::class, 'id_jenis_keluar', 'id_jenis_keluar');
	}

	public function prodi()
	{
		return $this->belongsTo(Prodi::class, 'id_prodi', 'id_prodi');
	}
}
