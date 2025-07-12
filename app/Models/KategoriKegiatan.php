<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class KategoriKegiatan
 *
 * @property string $id
 * @property int $id_kategori_kegiatan
 * @property string $nama_kategori_kegiatan
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class KategoriKegiatan extends Model
{
    use HasUuids;
	protected $table = 'kategori_kegiatan';
	public $incrementing = false;

	protected $casts = [
		'id_kategori_kegiatan' => 'int'
	];

	protected $fillable = [
		'id_kategori_kegiatan',
		'nama_kategori_kegiatan'
	];
}
