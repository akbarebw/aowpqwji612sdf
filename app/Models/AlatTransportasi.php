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
 * Class AlatTransportasi
 *
 * @property string $id
 * @property int $id_alat_transportasi
 * @property string $nama_alat_transportasi
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|BiodataMahasiswa[] $biodata_mahasiswas
 *
 * @package App\Models
 */
class AlatTransportasi extends Model
{
    use HasUuids;
	protected $table = 'alat_transportasi';
	public $incrementing = false;

	protected $casts = [
		'id_alat_transportasi' => 'int'
	];

	protected $fillable = [
		'id_alat_transportasi',
		'nama_alat_transportasi'
	];

	public function biodata_mahasiswas()
	{
		return $this->hasMany(BiodataMahasiswa::class, 'id_alat_transportasi', 'id_alat_transportasi');
	}
}
