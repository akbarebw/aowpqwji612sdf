<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class BiodataDosen
 *
 * @property string $id
 * @property string $nama_dosen
 * @property string $tempat_lahir
 * @property Carbon $tanggal_lahir
 * @property string $jenis_kelamin
 * @property int $id_agama
 * @property string $nama_agama
 * @property int $id_status_aktif
 * @property string $nama_status_aktif
 * @property string|null $nidn
 * @property string $nama_ibu_kandung
 * @property string|null $nik
 * @property string|null $nip
 * @property string|null $npwp
 * @property int $id_jenis_sdm
 * @property string $nama_jenis_sdm
 * @property string|null $no_sk_cpns
 * @property Carbon|null $tanggal_sk_cpns
 * @property string|null $no_sk_pengangkatan
 * @property Carbon|null $mulai_sk_pengangkatan
 * @property int|null $id_lembaga_angkat
 * @property string|null $nama_lembaga_pengangkatan
 * @property int|null $id_pangkat_golongan
 * @property string|null $nama_pangkat_golongan
 * @property int|null $id_sumber_gaji
 * @property string|null $nama_sumber_gaji
 * @property string|null $jalan
 * @property string|null $dusun
 * @property string|null $rt
 * @property string|null $rw
 * @property string|null $ds_kel
 * @property string|null $kode_pos
 * @property string|null $id_wilayah
 * @property string|null $nama_wilayah
 * @property string|null $telepon
 * @property string|null $handphone
 * @property string|null $email
 * @property string|null $status_pernikahan
 * @property string|null $nama_suami_istri
 * @property string|null $nip_suami_istri
 * @property Carbon|null $tanggal_mulai_pns
 * @property string|null $id_pekerjaan_suami_istri
 * @property string|null $nama_pekerjaan_suami_istri
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_dosen
 *
 * @property Agama $agama
 * @property Dosen $dosen
 * @property LembagaPengangkat|null $lembaga_pengangkat
 * @property PangkatGolongan|null $pangkat_golongan
 * @property StatusKeaktifanPegawai $status_keaktifan_pegawai
 *
 * @package App\Models
 */
class BiodataDosen extends Model
{
    use HasUuids;
	protected $table = 'biodata_dosen';
	public $incrementing = false;

	protected $casts = [
		'tanggal_lahir' => 'datetime',
		'id_agama' => 'int',
		'id_status_aktif' => 'int',
		'id_jenis_sdm' => 'int',
		'tanggal_sk_cpns' => 'datetime',
		'mulai_sk_pengangkatan' => 'datetime',
		'id_lembaga_angkat' => 'int',
		'id_pangkat_golongan' => 'int',
		'id_sumber_gaji' => 'int',
		'tanggal_mulai_pns' => 'datetime'
	];

	protected $fillable = [
		'nama_dosen',
		'tempat_lahir',
		'tanggal_lahir',
		'jenis_kelamin',
		'id_agama',
		'nama_agama',
		'id_status_aktif',
		'nama_status_aktif',
		'nidn',
		'nama_ibu_kandung',
		'nik',
		'nip',
		'npwp',
		'id_jenis_sdm',
		'nama_jenis_sdm',
		'no_sk_cpns',
		'tanggal_sk_cpns',
		'no_sk_pengangkatan',
		'mulai_sk_pengangkatan',
		'id_lembaga_angkat',
		'nama_lembaga_pengangkatan',
		'id_pangkat_golongan',
		'nama_pangkat_golongan',
		'id_sumber_gaji',
		'nama_sumber_gaji',
		'jalan',
		'dusun',
		'rt',
		'rw',
		'ds_kel',
		'kode_pos',
		'id_wilayah',
		'nama_wilayah',
		'telepon',
		'handphone',
		'email',
		'status_pernikahan',
		'nama_suami_istri',
		'nip_suami_istri',
		'tanggal_mulai_pns',
		'id_pekerjaan_suami_istri',
		'nama_pekerjaan_suami_istri',
		'id_dosen'
	];

	public function agama()
	{
		return $this->belongsTo(Agama::class, 'id_agama', 'id_agama');
	}

	public function dosen()
	{
		return $this->belongsTo(Dosen::class, 'id_dosen', 'id_dosen');
	}

	public function lembaga_pengangkat()
	{
		return $this->belongsTo(LembagaPengangkat::class, 'id_lembaga_angkat', 'id_lembaga_angkat');
	}

	public function pangkat_golongan()
	{
		return $this->belongsTo(PangkatGolongan::class, 'id_pangkat_golongan', 'id_pangkat_golongan');
	}

	public function status_keaktifan_pegawai()
	{
		return $this->belongsTo(StatusKeaktifanPegawai::class, 'id_status_aktif', 'id_status_aktif');
	}
}
