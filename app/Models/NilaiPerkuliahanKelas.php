<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class NilaiPerkuliahanKelas
 *
 * @property string $id
 * @property string $kode_mata_kuliah
 * @property string $nama_mata_kuliah
 * @property string $id_kelas_kuliah
 * @property string $nama_kelas_kuliah
 * @property string $sks_mata_kuliah
 * @property int $jumlah_mahasiswa_krs
 * @property int $jumlah_mahasiswa_dapat_nilai
 * @property string $sks_tm
 * @property string $sks_prak
 * @property string $sks_prak_lap
 * @property string|null $sks_sim
 * @property string|null $bahasan_case
 * @property int $a_selenggara_pditt
 * @property int $a_pengguna_pditt
 * @property int $kuota_pditt
 * @property Carbon|null $tgl_mulai_koas
 * @property Carbon|null $tgl_selesai_koas
 * @property string|null $id_mou
 * @property string|null $id_kls_pditt
 * @property string $id_sms
 * @property string $id_smt
 * @property Carbon $tgl_create
 * @property string|null $lingkup_kelas
 * @property string|null $mode_kuliah
 * @property string $nm_smt
 * @property string $nama_prodi
 * @property string $status_sync
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_matkul
 *
 * @property KelasKuliah $kelas_kuliah
 *
 * @package App\Models
 */
class NilaiPerkuliahanKelas extends Model
{
    use HasUuids;
	protected $table = 'nilai_perkuliahan_kelas';
	public $incrementing = false;

	protected $casts = [
		'jumlah_mahasiswa_krs' => 'int',
		'jumlah_mahasiswa_dapat_nilai' => 'int',
		'a_selenggara_pditt' => 'int',
		'a_pengguna_pditt' => 'int',
		'kuota_pditt' => 'int',
		'tgl_mulai_koas' => 'datetime',
		'tgl_selesai_koas' => 'datetime',
		'tgl_create' => 'datetime'
	];

	protected $fillable = [
		'kode_mata_kuliah',
		'nama_mata_kuliah',
		'id_kelas_kuliah',
		'nama_kelas_kuliah',
		'sks_mata_kuliah',
		'jumlah_mahasiswa_krs',
		'jumlah_mahasiswa_dapat_nilai',
		'sks_tm',
		'sks_prak',
		'sks_prak_lap',
		'sks_sim',
		'bahasan_case',
		'a_selenggara_pditt',
		'a_pengguna_pditt',
		'kuota_pditt',
		'tgl_mulai_koas',
		'tgl_selesai_koas',
		'id_mou',
		'id_kls_pditt',
		'id_sms',
		'id_smt',
		'tgl_create',
		'lingkup_kelas',
		'mode_kuliah',
		'nm_smt',
		'nama_prodi',
		'status_sync',
		'id_matkul'
	];

	public function kelas_kuliah()
	{
		return $this->belongsTo(KelasKuliah::class, 'id_kelas_kuliah', 'id_kelas_kuliah');
	}
}
