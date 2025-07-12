<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class JalurMasuk
 *
 * @property string $id
 * @property int $id_jalur_masuk
 * @property string $nama_jalur_masuk
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class JalurMasuk extends Model
{
    use HasUuids;
	protected $table = 'jalur_masuk';
	public $incrementing = false;

	protected $casts = [
		'id_jalur_masuk' => 'int'
	];

	protected $fillable = [
		'id_jalur_masuk',
		'nama_jalur_masuk'
	];
}
