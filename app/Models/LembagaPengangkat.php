<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class LembagaPengangkat
 *
 * @property string $id
 * @property int $id_lembaga_angkat
 * @property string $nama_lembaga_angkat
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|BiodataDosen[] $biodata_dosens
 *
 * @package App\Models
 */
class LembagaPengangkat extends Model
{
    use HasUuids;
	protected $table = 'lembaga_pengangkat';
	public $incrementing = false;

	protected $casts = [
		'id_lembaga_angkat' => 'int'
	];

	protected $fillable = [
		'id_lembaga_angkat',
		'nama_lembaga_angkat'
	];

	public function biodata_dosens()
	{
		return $this->hasMany(BiodataDosen::class, 'id_lembaga_angkat', 'id_lembaga_angkat');
	}
}
