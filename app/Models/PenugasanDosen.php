<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class PenugasanDosen
 *
 * @property string $id
 * @property string $id_registrasi_dosen
 * @property string $jk
 * @property string $nama_dosen
 * @property string|null $nidn
 * @property int $id_tahun_ajaran
 * @property string $nama_tahun_ajaran
 * @property string $nama_perguruan_tinggi
 * @property string|null $nama_program_studi
 * @property string $nomor_surat_tugas
 * @property Carbon $tanggal_surat_tugas
 * @property Carbon $mulai_surat_tugas
 * @property Carbon $tgl_create
 * @property Carbon|null $tgl_ptk_keluar
 * @property int $id_stat_pegawai
 * @property string|null $id_jns_keluar
 * @property string $id_ikatan_kerja
 * @property int $a_sp_homebase
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_dosen
 * @property string|null $id_prodi
 *
 * @property Dosen $dosen
 * @property IkatanKerjaSdm $ikatan_kerja_sdm
 * @property JenisKeluar|null $jenis_keluar
 * @property Prodi|null $prodi
 * @property TahunAjaran $tahun_ajaran
 *
 * @package App\Models
 */
class PenugasanDosen extends Model
{
    use HasUuids;
	protected $table = 'penugasan_dosen';
	public $incrementing = false;

	protected $casts = [
		'id_tahun_ajaran' => 'int',
		'tanggal_surat_tugas' => 'datetime',
		'mulai_surat_tugas' => 'datetime',
		'tgl_create' => 'datetime',
		'tgl_ptk_keluar' => 'datetime',
		'id_stat_pegawai' => 'int',
		'a_sp_homebase' => 'int'
	];

	protected $fillable = [
		'id_registrasi_dosen',
		'jk',
		'nama_dosen',
		'nidn',
		'id_tahun_ajaran',
		'nama_tahun_ajaran',
		'nama_perguruan_tinggi',
		'nama_program_studi',
		'nomor_surat_tugas',
		'tanggal_surat_tugas',
		'mulai_surat_tugas',
		'tgl_create',
		'tgl_ptk_keluar',
		'id_stat_pegawai',
		'id_jns_keluar',
		'id_ikatan_kerja',
		'a_sp_homebase',
		'id_dosen',
		'id_prodi'
	];

	public function dosen()
	{
		return $this->belongsTo(Dosen::class, 'id_dosen', 'id_dosen');
	}

	public function ikatan_kerja_sdm()
	{
		return $this->belongsTo(IkatanKerjaSdm::class, 'id_ikatan_kerja', 'id_ikatan_kerja');
	}

	public function jenis_keluar()
	{
		return $this->belongsTo(JenisKeluar::class, 'id_jns_keluar', 'id_jenis_keluar');
	}

	public function prodi()
	{
		return $this->belongsTo(Prodi::class, 'id_prodi', 'id_prodi');
	}

	public function tahun_ajaran()
	{
		return $this->belongsTo(TahunAjaran::class, 'id_tahun_ajaran', 'id_tahun_ajaran');
	}
}
