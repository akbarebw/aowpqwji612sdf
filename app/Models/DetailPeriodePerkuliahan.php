<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class DetailPeriodePerkuliahan
 *
 * @property string $id
 * @property string $nama_program_studi
 * @property int $id_semester
 * @property string $nama_semester
 * @property int|null $jumlah_target_mahasiswa_baru
 * @property int|null $jumlah_pendaftar_ikut_seleksi
 * @property int|null $jumlah_pendaftar_lulus_seleksi
 * @property int|null $jumlah_daftar_ulang
 * @property int|null $jumlah_mengundurkan_diri
 * @property Carbon $tanggal_awal_perkuliahan
 * @property Carbon $tanggal_akhir_perkuliahan
 * @property int|null $jumlah_minggu_pertemuan
 * @property string $status_sync
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_prodi
 *
 * @property Prodi $prodi
 * @property Semester $semester
 *
 * @package App\Models
 */
class DetailPeriodePerkuliahan extends Model
{
    use HasUuids;
	protected $table = 'detail_periode_perkuliahan';
	public $incrementing = false;

	protected $casts = [
		'id_semester' => 'int',
		'jumlah_target_mahasiswa_baru' => 'int',
		'jumlah_pendaftar_ikut_seleksi' => 'int',
		'jumlah_pendaftar_lulus_seleksi' => 'int',
		'jumlah_daftar_ulang' => 'int',
		'jumlah_mengundurkan_diri' => 'int',
		'tanggal_awal_perkuliahan' => 'datetime',
		'tanggal_akhir_perkuliahan' => 'datetime',
		'jumlah_minggu_pertemuan' => 'int'
	];

	protected $fillable = [
		'nama_program_studi',
		'id_semester',
		'nama_semester',
		'jumlah_target_mahasiswa_baru',
		'jumlah_pendaftar_ikut_seleksi',
		'jumlah_pendaftar_lulus_seleksi',
		'jumlah_daftar_ulang',
		'jumlah_mengundurkan_diri',
		'tanggal_awal_perkuliahan',
		'tanggal_akhir_perkuliahan',
		'jumlah_minggu_pertemuan',
		'status_sync',
		'id_prodi'
	];

	public function prodi()
	{
		return $this->belongsTo(Prodi::class, 'id_prodi', 'id_prodi');
	}

	public function semester()
	{
		return $this->belongsTo(Semester::class, 'id_semester', 'id_semester');
	}
}
