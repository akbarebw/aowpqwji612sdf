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
 * Class ProfilPt
 *
 * @property string $id
 * @property string $id_perguruan_tinggi
 * @property int $kode_perguruan_tinggi
 * @property string $nama_perguruan_tinggi
 * @property string $telepon
 * @property string $faximile
 * @property string $email
 * @property string $website
 * @property string $jalan
 * @property string|null $dusun
 * @property string|null $rt_rw
 * @property string $kelurahan
 * @property int $kode_pos
 * @property string $id_wilayah
 * @property string $nama_wilayah
 * @property string $lintang_bujur
 * @property string|null $bank
 * @property string|null $unit_cabang
 * @property string|null $nomor_rekening
 * @property int $mbs
 * @property int $luas_tanah_milik
 * @property int $luas_tanah_bukan_milik
 * @property string $sk_pendirian
 * @property Carbon $tanggal_sk_pendirian
 * @property int $id_status_milik
 * @property string $nama_status_milik
 * @property string $status_perguruan_tinggi
 * @property string|null $sk_izin_operasional
 * @property Carbon|null $tanggal_izin_operasional
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|Mahasiswa[] $mahasiswas
 * @property Collection|RiwayatPendidikanDosen[] $riwayat_pendidikan_dosens
 *
 * @package App\Models
 */
class ProfilPt extends Model
{
    use HasUuids;
	protected $table = 'profil_pt';
	public $incrementing = false;

	protected $casts = [
		'kode_perguruan_tinggi' => 'int',
		'kode_pos' => 'int',
		'mbs' => 'int',
		'luas_tanah_milik' => 'int',
		'luas_tanah_bukan_milik' => 'int',
		'tanggal_sk_pendirian' => 'datetime',
		'id_status_milik' => 'int',
		'tanggal_izin_operasional' => 'datetime'
	];

	protected $fillable = [
		'id_perguruan_tinggi',
		'kode_perguruan_tinggi',
		'nama_perguruan_tinggi',
		'telepon',
		'faximile',
		'email',
		'website',
		'jalan',
		'dusun',
		'rt_rw',
		'kelurahan',
		'kode_pos',
		'id_wilayah',
		'nama_wilayah',
		'lintang_bujur',
		'bank',
		'unit_cabang',
		'nomor_rekening',
		'mbs',
		'luas_tanah_milik',
		'luas_tanah_bukan_milik',
		'sk_pendirian',
		'tanggal_sk_pendirian',
		'id_status_milik',
		'nama_status_milik',
		'status_perguruan_tinggi',
		'sk_izin_operasional',
		'tanggal_izin_operasional'
	];

	public function mahasiswas()
	{
		return $this->hasMany(Mahasiswa::class, 'id_perguruan_tinggi', 'id_perguruan_tinggi');
	}

	public function riwayat_pendidikan_dosens()
	{
		return $this->hasMany(RiwayatPendidikanDosen::class, 'id_perguruan_tinggi', 'id_perguruan_tinggi');
	}
}
