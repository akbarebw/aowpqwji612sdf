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
 * Class IkatanKerjaSdm
 *
 * @property string $id
 * @property string $id_ikatan_kerja
 * @property string $nama_ikatan_kerja
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|PenugasanDosen[] $penugasan_dosens
 *
 * @package App\Models
 */
class IkatanKerjaSdm extends Model
{
    use HasUuids;
	protected $table = 'ikatan_kerja_sdm';
	public $incrementing = false;

	protected $fillable = [
		'id_ikatan_kerja',
		'nama_ikatan_kerja'
	];

	public function penugasan_dosens()
	{
		return $this->hasMany(PenugasanDosen::class, 'id_ikatan_kerja', 'id_ikatan_kerja');
	}
}
