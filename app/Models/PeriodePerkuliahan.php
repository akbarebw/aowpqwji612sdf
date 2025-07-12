<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class PeriodePerkuliahan
 *
 * @property string $id
 * @property string $nama_program_studi
 * @property int $id_semester
 * @property string $nama_semester
 * @property int|null $jumlah_target_mahasiswa_baru
 * @property Carbon $tanggal_awal_perkuliahan
 * @property Carbon $tanggal_akhir_perkuliahan
 * @property int|null $calon_ikut_seleksi
 * @property int|null $calon_lulus_seleksi
 * @property int|null $daftar_sbg_mhs
 * @property int|null $pst_undur_diri
 * @property int|null $jml_mgu_kul
 * @property string|null $metode_kul
 * @property string|null $metode_kul_eks
 * @property Carbon $tgl_create
 * @property Carbon $last_update
 * @property string $status_sync
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_prodi
 *
 * @property Semester $semester
 *
 * @package App\Models
 */
class PeriodePerkuliahan extends Model
{
    use HasUuids;
	protected $table = 'periode_perkuliahan';
	public $incrementing = false;

	protected $casts = [
		'id_semester' => 'int',
		'jumlah_target_mahasiswa_baru' => 'int',
		'tanggal_awal_perkuliahan' => 'datetime',
		'tanggal_akhir_perkuliahan' => 'datetime',
		'calon_ikut_seleksi' => 'int',
		'calon_lulus_seleksi' => 'int',
		'daftar_sbg_mhs' => 'int',
		'pst_undur_diri' => 'int',
		'jml_mgu_kul' => 'int',
		'tgl_create' => 'datetime',
		'last_update' => 'datetime'
	];

	protected $fillable = [
		'nama_program_studi',
		'id_semester',
		'nama_semester',
		'jumlah_target_mahasiswa_baru',
		'tanggal_awal_perkuliahan',
		'tanggal_akhir_perkuliahan',
		'calon_ikut_seleksi',
		'calon_lulus_seleksi',
		'daftar_sbg_mhs',
		'pst_undur_diri',
		'jml_mgu_kul',
		'metode_kul',
		'metode_kul_eks',
		'tgl_create',
		'last_update',
		'status_sync',
		'id_prodi'
	];

	public function semester()
	{
		return $this->belongsTo(Semester::class, 'id_semester', 'id_semester');
	}
}
