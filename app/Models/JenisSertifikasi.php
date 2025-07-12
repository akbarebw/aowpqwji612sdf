<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class JenisSertifikasi
 *
 * @property string $id
 * @property int $id_jenis_sertifikasi
 * @property string $nama_jenis_sertifikasi
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class JenisSertifikasi extends Model
{
    use HasUuids;
	protected $table = 'jenis_sertifikasi';
	public $incrementing = false;

	protected $casts = [
		'id_jenis_sertifikasi' => 'int'
	];

	protected $fillable = [
		'id_jenis_sertifikasi',
		'nama_jenis_sertifikasi'
	];
}
