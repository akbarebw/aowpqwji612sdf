<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class RiwayatFungsionalDosen
 *
 * @property string $id
 * @property string|null $nidn
 * @property string $nama_dosen
 * @property string $id_jabatan_fungsional
 * @property string $nama_jabatan_fungsional
 * @property string $sk_jabatan_fungsional
 * @property Carbon $mulai_sk_jabatan
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_dosen
 *
 * @property Dosen $dosen
 *
 * @package App\Models
 */
class RiwayatFungsionalDosen extends Model
{
    use HasUuids;
	protected $table = 'riwayat_fungsional_dosen';
	public $incrementing = false;

	protected $casts = [
		'mulai_sk_jabatan' => 'datetime'
	];

	protected $fillable = [
		'nidn',
		'nama_dosen',
		'id_jabatan_fungsional',
		'nama_jabatan_fungsional',
		'sk_jabatan_fungsional',
		'mulai_sk_jabatan',
		'id_dosen'
	];

	public function dosen()
	{
		return $this->belongsTo(Dosen::class, 'id_dosen', 'id_dosen');
	}
}
