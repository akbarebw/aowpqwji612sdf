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
 * Class TahunAjaran
 *
 * @property string $id
 * @property int $id_tahun_ajaran
 * @property string $nama_tahun_ajaran
 * @property int $a_periode_aktif
 * @property Carbon|null $tanggal_mulai
 * @property Carbon|null $tanggal_selesai
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|PenugasanDosen[] $penugasan_dosens
 * @property Collection|PenugasanSemuaDosen[] $penugasan_semua_dosens
 *
 * @package App\Models
 */
class TahunAjaran extends Model
{
    use HasUuids;
	protected $table = 'tahun_ajaran';
	public $incrementing = false;

	protected $casts = [
		'id_tahun_ajaran' => 'int',
		'a_periode_aktif' => 'int',
		'tanggal_mulai' => 'datetime',
		'tanggal_selesai' => 'datetime'
	];

	protected $fillable = [
		'id_tahun_ajaran',
		'nama_tahun_ajaran',
		'a_periode_aktif',
		'tanggal_mulai',
		'tanggal_selesai'
	];

	public function penugasan_dosens()
	{
		return $this->hasMany(PenugasanDosen::class, 'id_tahun_ajaran', 'id_tahun_ajaran');
	}

	public function penugasan_semua_dosens()
	{
		return $this->hasMany(PenugasanSemuaDosen::class, 'id_tahun_ajaran', 'id_tahun_ajaran');
	}
}
