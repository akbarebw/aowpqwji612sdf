<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class DataTerhapus
 *
 * @property string $id
 * @property string $id_mahasiswa
 * @property string $nama_mahasiswa
 * @property string $jenis_kelamin
 * @property string $tempat_lahir
 * @property Carbon $tanggal_lahir
 * @property string $nama_ibu_kandung
 * @property string $agama
 * @property int $id_agama
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 *
 * @package App\Models
 */
class DataTerhapus extends Model
{
    use HasUuids;
	protected $table = 'data_terhapus';
	public $incrementing = false;

	protected $casts = [
		'tanggal_lahir' => 'datetime',
		'id_agama' => 'int'
	];

	protected $fillable = [
		'id_mahasiswa',
		'nama_mahasiswa',
		'jenis_kelamin',
		'tempat_lahir',
		'tanggal_lahir',
		'nama_ibu_kandung',
		'agama',
		'id_agama'
	];

	public function agama()
	{
		return $this->belongsTo(Agama::class, 'id_agama', 'id_agama');
	}
}
