<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class PerhitunganSks
 *
 * @property string $id
 * @property string $id_kelas_kuliah
 * @property string $id_registrasi_dosen
 * @property string $id_dosen
 * @property string $nidn
 * @property string $nama_dosen
 * @property string $nama_kelas_kuliah
 * @property string|null $id_substansi
 * @property string|null $nama_substansi
 * @property string $rencana_minggu_pertemuan
 * @property string $perhitungan_sks
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Dosen $dosen
 *
 * @package App\Models
 */
class PerhitunganSks extends Model
{
    use HasUuids;
	protected $table = 'perhitungan_sks';
	public $incrementing = false;

	protected $fillable = [
		'id_kelas_kuliah',
		'id_registrasi_dosen',
		'id_dosen',
		'nidn',
		'nama_dosen',
		'nama_kelas_kuliah',
		'id_substansi',
		'nama_substansi',
		'rencana_minggu_pertemuan',
		'perhitungan_sks'
	];

	public function dosen()
	{
		return $this->belongsTo(Dosen::class, 'id_dosen', 'id_dosen');
	}
}
