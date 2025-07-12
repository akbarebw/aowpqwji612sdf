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
 * Class JenisTinggal
 *
 * @property string $id
 * @property int $id_jenis_tinggal
 * @property string $nama_jenis_tinggal
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|BiodataMahasiswa[] $biodata_mahasiswas
 *
 * @package App\Models
 */
class JenisTinggal extends Model
{
    use HasUuids;
	protected $table = 'jenis_tinggal';
	public $incrementing = false;

	protected $casts = [
		'id_jenis_tinggal' => 'int'
	];

	protected $fillable = [
		'id_jenis_tinggal',
		'nama_jenis_tinggal'
	];

	public function biodata_mahasiswas()
	{
		return $this->hasMany(BiodataMahasiswa::class, 'id_jenis_tinggal', 'id_jenis_tinggal');
	}
}
