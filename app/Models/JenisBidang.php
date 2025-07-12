<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class JenisBidang
 * 
 * @property string $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Bidangs[] $bidangs
 *
 * @package App\Models
 */
class JenisBidang extends Model
{
	use SoftDeletes;
	protected $table = 'jenis_bidang';
	public $incrementing = false;

	protected $fillable = [
		'name'
	];

	public function bidangs()
	{
		return $this->hasMany(Bidangs::class, 'id_jenis_bidang');
	}
}
