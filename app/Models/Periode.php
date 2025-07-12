<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class Periode
 *
 * @property string $id
 * @property int|null $kode_prodi
 * @property string $nama_program_studi
 * @property string $status_prodi
 * @property string $jenjang_pendidikan
 * @property int $periode_pelaporan
 * @property int $tipe_periode
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_prodi
 *
 * @property Prodi $prodi
 *
 * @package App\Models
 */
class Periode extends Model
{
    use HasUuids;
	protected $table = 'periode';
	public $incrementing = false;

	protected $casts = [
		'kode_prodi' => 'int',
		'periode_pelaporan' => 'int',
		'tipe_periode' => 'int'
	];

	protected $fillable = [
		'kode_prodi',
		'nama_program_studi',
		'status_prodi',
		'jenjang_pendidikan',
		'periode_pelaporan',
		'tipe_periode',
		'id_prodi'
	];

	public function prodi()
	{
		return $this->belongsTo(Prodi::class, 'id_prodi', 'id_prodi');
	}
}
