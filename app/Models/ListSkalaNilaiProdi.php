<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class ListSkalaNilaiProdi
 *
 * @property string $id
 * @property Carbon $tgl_create
 * @property string $id_bobot_nilai
 * @property string $nama_program_studi
 * @property string $nilai_huruf
 * @property string $nilai_indeks
 * @property string $bobot_minimum
 * @property string $bobot_maksimum
 * @property Carbon $tanggal_mulai_efektif
 * @property Carbon $tanggal_akhir_efektif
 * @property string $status_sync
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_prodi
 *
 * @property Prodi $prodi
 *
 * @package App\Models
 */
class ListSkalaNilaiProdi extends Model
{
    use HasUuids;
	protected $table = 'list_skala_nilai_prodi';
	public $incrementing = false;

	protected $casts = [
		'tgl_create' => 'datetime',
		'tanggal_mulai_efektif' => 'datetime',
		'tanggal_akhir_efektif' => 'datetime'
	];

	protected $fillable = [
		'tgl_create',
		'id_bobot_nilai',
		'nama_program_studi',
		'nilai_huruf',
		'nilai_indeks',
		'bobot_minimum',
		'bobot_maksimum',
		'tanggal_mulai_efektif',
		'tanggal_akhir_efektif',
		'status_sync',
		'id_prodi'
	];

	public function prodi()
	{
		return $this->belongsTo(Prodi::class, 'id_prodi', 'id_prodi');
	}
}
