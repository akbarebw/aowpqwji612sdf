<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class Wilayah
 *
 * @property string $id
 * @property int $id_level_wilayah
 * @property string $id_wilayah
 * @property string $id_negara
 * @property string $nama_wilayah
 * @property int|null $id_induk_wilayah
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property LevelWilayah $level_wilayah
 *
 * @package App\Models
 */
class Wilayah extends Model
{
    use HasUuids;
	protected $table = 'wilayah';
	public $incrementing = false;

	protected $casts = [
		'id_level_wilayah' => 'int',
		'id_induk_wilayah' => 'int'
	];

	protected $fillable = [
		'id_level_wilayah',
		'id_wilayah',
		'id_negara',
		'nama_wilayah',
		'id_induk_wilayah'
	];

	public function level_wilayah()
	{
		return $this->belongsTo(LevelWilayah::class, 'id_level_wilayah', 'id_level_wilayah');
	}
}
