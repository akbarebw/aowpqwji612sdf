<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class LevelWilayah
 *
 * @property string $id
 * @property int $id_level_wilayah
 * @property string $nama_level_wilayah
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|Wilayah[] $wilayahs
 *
 * @package App\Models
 */
class LevelWilayah extends Model
{
    use HasUuids;
	protected $table = 'level_wilayah';
	public $incrementing = false;

	protected $casts = [
		'id_level_wilayah' => 'int'
	];

	protected $fillable = [
		'id_level_wilayah',
		'nama_level_wilayah'
	];

	public function wilayahs()
	{
		return $this->hasMany(Wilayah::class, 'id_level_wilayah', 'id_level_wilayah');
	}
}
