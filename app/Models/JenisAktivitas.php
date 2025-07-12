<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class JenisAktivitas
 *
 * @property string $id
 * @property int $id_jenis_aktivitas
 * @property string $nama_jenis_aktivitas
 * @property int $untuk_kampus_merdeka
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class JenisAktivitas extends Model
{
    use HasUuids;
	protected $table = 'jenis_aktivitas';
	public $incrementing = false;

	protected $casts = [
		'id_jenis_aktivitas' => 'int',
		'untuk_kampus_merdeka' => 'int'
	];

	protected $fillable = [
		'id_jenis_aktivitas',
		'nama_jenis_aktivitas',
		'untuk_kampus_merdeka'
	];
}
