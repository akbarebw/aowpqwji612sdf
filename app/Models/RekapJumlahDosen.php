<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class RekapJumlahDosen
 *
 * @property string $id
 * @property int $id_periode
 * @property string $nama_periode
 * @property string|null $nama_program_studi
 * @property int $jumlah_dosen_homebase
 * @property int $is_homebase
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $id_prodi
 *
 * @property Prodi|null $prodi
 *
 * @package App\Models
 */
class RekapJumlahDosen extends Model
{
    use HasUuids;
	protected $table = 'rekap_jumlah_dosen';
	public $incrementing = false;

	protected $casts = [
		'id_periode' => 'int',
		'jumlah_dosen_homebase' => 'int',
		'is_homebase' => 'int'
	];

	protected $fillable = [
		'id_periode',
		'nama_periode',
		'nama_program_studi',
		'jumlah_dosen_homebase',
		'is_homebase',
		'id_prodi'
	];

	public function prodi()
	{
		return $this->belongsTo(Prodi::class, 'id_prodi', 'id_prodi');
	}
}
