<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class ExportDataPenugasanDosen
 *
 * @property string $id
 * @property string $id_registrasi_dosen
 * @property int|null $nidn
 * @property string $nama_dosen
 * @property string|null $nama_program_studi
 * @property int $periode_mengajar
 * @property string $jenis_kelamin
 * @property string $tempat_lahir
 * @property Carbon $tanggal_lahir
 * @property int $id_agama
 * @property string $nama_agama
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $id_prodi
 *
 * @property Agama $agama
 * @property Prodi|null $prodi
 *
 * @package App\Models
 */
class ExportDataPenugasanDosen extends Model
{
    use HasUuids;
	protected $table = 'export_data_penugasan_dosen';
	public $incrementing = false;

	protected $casts = [
		'nidn' => 'int',
		'periode_mengajar' => 'int',
		'tanggal_lahir' => 'datetime',
		'id_agama' => 'int'
	];

	protected $fillable = [
		'id_registrasi_dosen',
		'nidn',
		'nama_dosen',
		'nama_program_studi',
		'periode_mengajar',
		'jenis_kelamin',
		'tempat_lahir',
		'tanggal_lahir',
		'id_agama',
		'nama_agama',
		'id_prodi'
	];

	public function agama()
	{
		return $this->belongsTo(Agama::class, 'id_agama', 'id_agama');
	}

	public function prodi()
	{
		return $this->belongsTo(Prodi::class, 'id_prodi', 'id_prodi');
	}
}
