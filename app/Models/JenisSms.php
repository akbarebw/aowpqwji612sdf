<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class JenisSms
 *
 * @property string $id
 * @property int $id_jenis_sms
 * @property string $nama_jenis_sms
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class JenisSms extends Model
{
    use HasUuids;
	protected $table = 'jenis_sms';
	public $incrementing = false;

	protected $casts = [
		'id_jenis_sms' => 'int'
	];

	protected $fillable = [
		'id_jenis_sms',
		'nama_jenis_sms'
	];
}
