<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class RiwayatPenelitianDosen
 *
 * @property string $id
 * @property string|null $nidn
 * @property string $nama_dosen
 * @property string $id_penelitian
 * @property string $judul_penelitian
 * @property string|null $id_kelompok_bidang
 * @property int|null $kode_kelompok_bidang
 * @property string|null $nama_kelompok_bidang
 * @property string $id_lembaga_iptek
 * @property string $nama_lembaga_iptek
 * @property string $tahun_kegiatan
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_dosen
 *
 * @property Dosen $dosen
 *
 * @package App\Models
 */
class RiwayatPenelitianDosen extends Model
{
    use HasUuids;
	protected $table = 'riwayat_penelitian_dosen';
	public $incrementing = false;

	protected $casts = [
		'kode_kelompok_bidang' => 'int'
	];

	protected $fillable = [
		'nidn',
		'nama_dosen',
		'id_penelitian',
		'judul_penelitian',
		'id_kelompok_bidang',
		'kode_kelompok_bidang',
		'nama_kelompok_bidang',
		'id_lembaga_iptek',
		'nama_lembaga_iptek',
		'tahun_kegiatan',
		'id_dosen'
	];

	public function dosen()
	{
		return $this->belongsTo(Dosen::class, 'id_dosen', 'id_dosen');
	}
}
