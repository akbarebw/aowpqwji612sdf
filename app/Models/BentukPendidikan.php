<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class BentukPendidikan
 *
 * @property string $id
 * @property int $id_bentuk_pendidikan
 * @property string $nama_bentuk_pendidikan
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class BentukPendidikan extends Model
{
    use HasUuids;
	protected $table = 'bentuk_pendidikan';
	public $incrementing = false;

	protected $casts = [
		'id_bentuk_pendidikan' => 'int'
	];

	protected $fillable = [
		'id_bentuk_pendidikan',
		'nama_bentuk_pendidikan'
	];
}
