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
 * Class Pembiayaan
 *
 * @property string $id
 * @property int $id_pembiayaan
 * @property string $nama_pembiayaan
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|ListNilaiPerkuliahanMahasiswa[] $list_nilai_perkuliahan_mahasiswas
 * @property Collection|ListPerkuliahanMahasiswa[] $list_perkuliahan_mahasiswas
 *
 * @package App\Models
 */
class Pembiayaan extends Model
{
    use HasUuids;
	protected $table = 'pembiayaan';
	public $incrementing = false;

	protected $casts = [
		'id_pembiayaan' => 'int'
	];

	protected $fillable = [
		'id_pembiayaan',
		'nama_pembiayaan'
	];

	public function list_nilai_perkuliahan_mahasiswas()
	{
		return $this->hasMany(ListNilaiPerkuliahanMahasiswa::class, 'id_pembiayaan', 'id_pembiayaan');
	}

	public function list_perkuliahan_mahasiswas()
	{
		return $this->hasMany(ListPerkuliahanMahasiswa::class, 'id_pembiayaan', 'id_pembiayaan');
	}
}
