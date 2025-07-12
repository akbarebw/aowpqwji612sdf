<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class Penghasilan
 *
 * @property string $id
 * @property int $id_penghasilan
 * @property string $nama_penghasilan
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Penghasilan extends Model
{
    use HasUuids;
	protected $table = 'penghasilan';
	public $incrementing = false;

	protected $casts = [
		'id_penghasilan' => 'int'
	];

	protected $fillable = [
		'id_penghasilan',
		'nama_penghasilan'
	];
}
