<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class Asets
 *
 * @property string $id
 * @property string $name
 * @property string $file
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Asets extends Model
{
    use HasUuids;
	protected $table = 'asets';
	public $incrementing = false;

	protected $fillable = [
		'name',
		'file'
	];
}
