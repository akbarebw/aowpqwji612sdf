<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class Negara
 *
 * @property string $id
 * @property string $id_negara
 * @property string $nama_negara
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Negara extends Model
{
    use HasUuids;
	protected $table = 'negara';
	public $incrementing = false;

	protected $fillable = [
		'id_negara',
		'nama_negara'
	];
}
