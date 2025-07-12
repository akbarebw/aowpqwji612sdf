<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class Pekerjaan
 *
 * @property string $id
 * @property int $id_pekerjaan
 * @property string $nama_pekerjaan
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Pekerjaan extends Model
{
    use HasUuids;
	protected $table = 'pekerjaan';
	public $incrementing = false;

	protected $casts = [
		'id_pekerjaan' => 'int'
	];

	protected $fillable = [
		'id_pekerjaan',
		'nama_pekerjaan'
	];
}
