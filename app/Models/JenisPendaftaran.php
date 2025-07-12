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
 * Class JenisPendaftaran
 *
 * @property string $id
 * @property string $id_jenis_daftar
 * @property string $nama_jenis_daftar
 * @property int $untuk_daftar_sekolah
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|ExportDataMahasiswa[] $export_data_mahasiswas
 *
 * @package App\Models
 */
class JenisPendaftaran extends Model
{
    use HasUuids;
	protected $table = 'jenis_pendaftaran';
	public $incrementing = false;

	protected $casts = [
		'untuk_daftar_sekolah' => 'int'
	];

	protected $fillable = [
		'id_jenis_daftar',
		'nama_jenis_daftar',
		'untuk_daftar_sekolah'
	];

	public function export_data_mahasiswas()
	{
		return $this->hasMany(ExportDataMahasiswa::class, 'id_jenis_daftar', 'id_jenis_daftar');
	}
}
