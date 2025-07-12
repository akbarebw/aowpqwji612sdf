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
 * Class JabatanFungsional
 *
 * @property string $id
 * @property int $id_jabatan_fungsional
 * @property string $nama_jabatan_fungsional
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|Pegawai[] $pegawai
 *
 * @package App\Models
 */
class JabatanFungsional extends Model
{
    use HasUuids;
	protected $table = 'jabatan_fungsional';
	public $incrementing = false;

	protected $casts = [
		'id_jabatan_fungsional' => 'int'
	];

	protected $fillable = [
		'id_jabatan_fungsional',
		'nama_jabatan_fungsional'
	];

	public function pegawai()
	{
		return $this->belongsToMany(Pegawai::class, 'pegawai_jabatan_fungsional')
					->withPivot('id', 'status', 'mulai_menjabat', 'selesai_menjabat', 'is_aktif')
					->withTimestamps();
	}
}
