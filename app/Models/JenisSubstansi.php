<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class JenisSubstansi
 *
 * @property string $id
 * @property int $id_jenis_substansi
 * @property string $nama_jenis_substansi
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class JenisSubstansi extends Model
{
    use HasUuids;
	protected $table = 'jenis_substansi';
	public $incrementing = false;

	protected $casts = [
		'id_jenis_substansi' => 'int'
	];

	protected $fillable = [
		'id_jenis_substansi',
		'nama_jenis_substansi'
	];
}
