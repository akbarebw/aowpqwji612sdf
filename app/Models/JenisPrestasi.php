<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class JenisPrestasi
 *
 * @property string $id
 * @property int $id_jenis_prestasi
 * @property string $nama_jenis_prestasi
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class JenisPrestasi extends Model
{
    use HasUuids;
	protected $table = 'jenis_prestasi';
	public $incrementing = false;

	protected $casts = [
		'id_jenis_prestasi' => 'int'
	];

	protected $fillable = [
		'id_jenis_prestasi',
		'nama_jenis_prestasi'
	];
}
