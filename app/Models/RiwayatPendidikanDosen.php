<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class RiwayatPendidikanDosen
 *
 * @property string $id
 * @property string $nidn
 * @property string $nama_dosen
 * @property int $id_bidang_studi
 * @property string $nama_bidang_studi
 * @property int $id_jenjang_pendidikan
 * @property string $nama_jenjang_pendidikan
 * @property int $id_gelar_akademik
 * @property string $nama_gelar_akademik
 * @property string $nama_perguruan_tinggi
 * @property string|null $fakultas
 * @property int $tahun_lulus
 * @property int $sks_lulus
 * @property float $ipk
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_dosen
 * @property string|null $id_perguruan_tinggi
 *
 * @property Dosen $dosen
 * @property JenjangPendidikan $jenjang_pendidikan
 * @property ProfilPt|null $profil_pt
 *
 * @package App\Models
 */
class RiwayatPendidikanDosen extends Model
{
    use HasUuids;
	protected $table = 'riwayat_pendidikan_dosen';
	public $incrementing = false;

	protected $casts = [
		'id_bidang_studi' => 'int',
		'id_jenjang_pendidikan' => 'int',
		'id_gelar_akademik' => 'int',
		'tahun_lulus' => 'int',
		'sks_lulus' => 'int',
		'ipk' => 'float'
	];

	protected $fillable = [
		'nidn',
		'nama_dosen',
		'id_bidang_studi',
		'nama_bidang_studi',
		'id_jenjang_pendidikan',
		'nama_jenjang_pendidikan',
		'id_gelar_akademik',
		'nama_gelar_akademik',
		'nama_perguruan_tinggi',
		'fakultas',
		'tahun_lulus',
		'sks_lulus',
		'ipk',
		'id_dosen',
		'id_perguruan_tinggi'
	];

	public function dosen()
	{
		return $this->belongsTo(Dosen::class, 'id_dosen', 'id_dosen');
	}

	public function jenjang_pendidikan()
	{
		return $this->belongsTo(JenjangPendidikan::class, 'id_jenjang_pendidikan', 'id_jenjang_didik');
	}

	public function profil_pt()
	{
		return $this->belongsTo(ProfilPt::class, 'id_perguruan_tinggi', 'id_perguruan_tinggi');
	}
}
