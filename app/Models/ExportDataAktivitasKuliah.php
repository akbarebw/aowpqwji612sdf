<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class ExportDataAktivitasKuliah
 *
 * @property string $id
 * @property string $id_periode
 * @property string $nama_periode
 * @property string $id_registrasi_mahasiswa
 * @property string $nim
 * @property string $nama_mahasiswa
 * @property string $nama_status_mahasiswa
 * @property string|null $ips
 * @property float|null $sks_semester
 * @property string|null $ipk
 * @property float|null $total_sks
 * @property string $status_sync
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_prodi
 * @property string $id_status_mahasiswa
 *
 * @property Prodi $prodi
 * @property StatusMahasiswa $status_mahasiswa
 *
 * @package App\Models
 */
class ExportDataAktivitasKuliah extends Model
{
    use HasUuids;
	protected $table = 'export_data_aktivitas_kuliah';
	public $incrementing = false;

	protected $casts = [
		'sks_semester' => 'float',
		'total_sks' => 'float'
	];

	protected $fillable = [
		'id_periode',
		'nama_periode',
		'id_registrasi_mahasiswa',
		'nim',
		'nama_mahasiswa',
		'nama_status_mahasiswa',
		'ips',
		'sks_semester',
		'ipk',
		'total_sks',
		'status_sync',
		'id_prodi',
		'id_status_mahasiswa'
	];

	public function prodi()
	{
		return $this->belongsTo(Prodi::class, 'id_prodi', 'id_prodi');
	}

	public function status_mahasiswa()
	{
		return $this->belongsTo(StatusMahasiswa::class, 'id_status_mahasiswa', 'id_status_mahasiswa');
	}
}
