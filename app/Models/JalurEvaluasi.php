<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class JalurEvaluasi
 *
 * @property string $id
 * @property int $id_jenis_evaluasi
 * @property string $nama_jenis_evaluasi
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class JalurEvaluasi extends Model
{
    use HasUuids;
	protected $table = 'jalur_evaluasi';
	public $incrementing = false;

	protected $casts = [
		'id_jenis_evaluasi' => 'int'
	];

	protected $fillable = [
		'id_jenis_evaluasi',
		'nama_jenis_evaluasi'
	];
}
