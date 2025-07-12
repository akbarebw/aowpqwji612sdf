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
 * Class PangkatGolongan
 *
 * @property string $id
 * @property int $id_pangkat_golongan
 * @property string $kode_golongan
 * @property string $nama_pangkat
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|BiodataDosen[] $biodata_dosens
 * @property Collection|RiwayatPangkatDosen[] $riwayat_pangkat_dosens
 *
 * @package App\Models
 */
class PangkatGolongan extends Model
{
    use HasUuids;
	protected $table = 'pangkat_golongan';
	public $incrementing = false;

	protected $casts = [
		'id_pangkat_golongan' => 'int'
	];

	protected $fillable = [
		'id_pangkat_golongan',
		'kode_golongan',
		'nama_pangkat'
	];

	public function biodata_dosens()
	{
		return $this->hasMany(BiodataDosen::class, 'id_pangkat_golongan', 'id_pangkat_golongan');
	}

	public function riwayat_pangkat_dosens()
	{
		return $this->hasMany(RiwayatPangkatDosen::class, 'id_pangkat_golongan', 'id_pangkat_golongan');
	}
}
