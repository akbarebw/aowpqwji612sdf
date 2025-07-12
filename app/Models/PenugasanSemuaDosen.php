<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class PenugasanSemuaDosen
 *
 * @property string $id
 * @property string $id_registrasi_dosen
 * @property string $nama_dosen
 * @property string $nidn
 * @property string $jenis_kelamin
 * @property int $id_tahun_ajaran
 * @property string $nama_tahun_ajaran
 * @property string $program_studi
 * @property string $nomor_surat_tugas
 * @property Carbon $tanggal_surat_tugas
 * @property string $apakah_homebase
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_dosen
 * @property string $id_prodi
 *
 * @property Dosen $dosen
 * @property Prodi $prodi
 * @property TahunAjaran $tahun_ajaran
 *
 * @package App\Models
 */
class PenugasanSemuaDosen extends Model
{
    use HasUuids;
	protected $table = 'penugasan_semua_dosen';
	public $incrementing = false;

	protected $casts = [
		'id_tahun_ajaran' => 'int',
		'tanggal_surat_tugas' => 'datetime'
	];

	protected $fillable = [
		'id_registrasi_dosen',
		'nama_dosen',
		'nidn',
		'jenis_kelamin',
		'id_tahun_ajaran',
		'nama_tahun_ajaran',
		'program_studi',
		'nomor_surat_tugas',
		'tanggal_surat_tugas',
		'apakah_homebase',
		'id_dosen',
		'id_prodi'
	];

	public function dosen()
	{
		return $this->belongsTo(Dosen::class, 'id_dosen', 'id_dosen');
	}

	public function prodi()
	{
		return $this->belongsTo(Prodi::class, 'id_prodi', 'id_prodi');
	}

	public function tahun_ajaran()
	{
		return $this->belongsTo(TahunAjaran::class, 'id_tahun_ajaran', 'id_tahun_ajaran');
	}
}
