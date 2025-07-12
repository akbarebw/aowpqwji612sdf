<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class MahasiswaBimbinganDosen
 *
 * @property string $id
 * @property string $judul
 * @property string $id_bimbing_mahasiswa
 * @property int $id_kategori_kegiatan
 * @property string $nama_kategori_kegiatan
 * @property string $nidn
 * @property string $nama_dosen
 * @property int $pembimbing_ke
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_dosen
 * @property string $id_aktivitas
 *
 * @property ListAktivitasMahasiswa $list_aktivitas_mahasiswa
 * @property Dosen $dosen
 *
 * @package App\Models
 */
class MahasiswaBimbinganDosen extends Model
{
    use HasUuids;
	protected $table = 'mahasiswa_bimbingan_dosen';
	public $incrementing = false;

	protected $casts = [
		'id_kategori_kegiatan' => 'int',
		'pembimbing_ke' => 'int'
	];

	protected $fillable = [
		'judul',
		'id_bimbing_mahasiswa',
		'id_kategori_kegiatan',
		'nama_kategori_kegiatan',
		'nidn',
		'nama_dosen',
		'pembimbing_ke',
		'id_dosen',
		'id_aktivitas'
	];

	public function list_aktivitas_mahasiswa()
	{
		return $this->belongsTo(ListAktivitasMahasiswa::class, 'id_aktivitas', 'id_aktivitas');
	}

	public function dosen()
	{
		return $this->belongsTo(Dosen::class, 'id_dosen', 'id_dosen');
	}
}
