<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Bidangs
 * 
 * @property string $id
 * @property string $name
 * @property string $id_jenis_bidang
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property JenisBidang $jenis_bidang
 *
 * @package App\Models
 */
class Bidangs extends Model
{
	use SoftDeletes;
	protected $table = 'bidangs';
	public $incrementing = false;

	protected $fillable = [
		'name',
		'id_jenis_bidang'
	];

	public function jenis_bidang()
	{
		return $this->belongsTo(JenisBidang::class, 'id_jenis_bidang');
	}
}
