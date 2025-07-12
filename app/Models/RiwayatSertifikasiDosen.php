<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class RiwayatSertifikasiDosen
 *
 * @property string $id
 * @property string $nidn
 * @property string $nama_dosen
 * @property string|null $nomor_peserta
 * @property int $id_bidang_studi
 * @property string $nama_bidang_studi
 * @property int $id_jenis_sertifikasi
 * @property string $nama_jenis_sertifikasi
 * @property int $tahun_sertifikasi
 * @property string $sk_sertifikasi
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_dosen
 *
 * @property Dosen $dosen
 *
 * @package App\Models
 */
class RiwayatSertifikasiDosen extends Model
{
    use HasUuids;
	protected $table = 'riwayat_sertifikasi_dosen';
	public $incrementing = false;

	protected $casts = [
		'id_bidang_studi' => 'int',
		'id_jenis_sertifikasi' => 'int',
		'tahun_sertifikasi' => 'int'
	];

	protected $fillable = [
		'nidn',
		'nama_dosen',
		'nomor_peserta',
		'id_bidang_studi',
		'nama_bidang_studi',
		'id_jenis_sertifikasi',
		'nama_jenis_sertifikasi',
		'tahun_sertifikasi',
		'sk_sertifikasi',
		'id_dosen'
	];

	public function dosen()
	{
		return $this->belongsTo(Dosen::class, 'id_dosen', 'id_dosen');
	}
}
