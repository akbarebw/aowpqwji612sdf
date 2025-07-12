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
 * Class JenjangPendidikan
 *
 * @property string $id
 * @property int $id_jenjang_didik
 * @property string $nama_jenjang_didik
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|ListMataKuliah[] $list_mata_kuliahs
 * @property Collection|Prodi[] $prodis
 * @property Collection|RiwayatPendidikanDosen[] $riwayat_pendidikan_dosens
 *
 * @package App\Models
 */
class JenjangPendidikan extends Model
{
    use HasUuids;
	protected $table = 'jenjang_pendidikan';
	public $incrementing = false;

	protected $casts = [
		'id_jenjang_didik' => 'int'
	];

	protected $fillable = [
		'id_jenjang_didik',
		'nama_jenjang_didik'
	];

	public function list_mata_kuliahs()
	{
		return $this->hasMany(ListMataKuliah::class, 'id_jenj_didik', 'id_jenjang_didik');
	}

	public function prodis()
	{
		return $this->hasMany(Prodi::class, 'id_jenjang_pendidikan', 'id_jenjang_didik');
	}

	public function riwayat_pendidikan_dosens()
	{
		return $this->hasMany(RiwayatPendidikanDosen::class, 'id_jenjang_pendidikan', 'id_jenjang_didik');
	}
}
