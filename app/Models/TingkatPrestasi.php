<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class TingkatPrestasi
 *
 * @property string $id
 * @property int $id_tingkat_prestasi
 * @property string $nama_tingkat_prestasi
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class TingkatPrestasi extends Model
{
    use HasUuids;
	protected $table = 'tingkat_prestasi';
	public $incrementing = false;

	protected $casts = [
		'id_tingkat_prestasi' => 'int'
	];

	protected $fillable = [
		'id_tingkat_prestasi',
		'nama_tingkat_prestasi'
	];
}
