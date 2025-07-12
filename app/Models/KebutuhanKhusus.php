<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class KebutuhanKhusus
 *
 * @property string $id
 * @property int $id_kebutuhan_khusus
 * @property string $nama_kebutuhan_khusus
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class KebutuhanKhusus extends Model
{
    use HasUuids;
	protected $table = 'kebutuhan_khusus';
	public $incrementing = false;

	protected $casts = [
		'id_kebutuhan_khusus' => 'int'
	];

	protected $fillable = [
		'id_kebutuhan_khusus',
		'nama_kebutuhan_khusus'
	];
}
