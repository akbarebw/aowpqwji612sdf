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
 * Class StatusKeaktifanPegawai
 *
 * @property string $id
 * @property int $id_status_aktif
 * @property string $nama_status_aktif
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|BiodataDosen[] $biodata_dosens
 * @property Collection|Dosen[] $dosens
 *
 * @package App\Models
 */
class StatusKeaktifanPegawai extends Model
{
    use HasUuids;
	protected $table = 'status_keaktifan_pegawai';
	public $incrementing = false;

	protected $casts = [
		'id_status_aktif' => 'int'
	];

	protected $fillable = [
		'id_status_aktif',
		'nama_status_aktif'
	];

	public function biodata_dosens()
	{
		return $this->hasMany(BiodataDosen::class, 'id_status_aktif', 'id_status_aktif');
	}

	public function dosens()
	{
		return $this->hasMany(Dosen::class, 'id_status_aktif', 'id_status_aktif');
	}
}
