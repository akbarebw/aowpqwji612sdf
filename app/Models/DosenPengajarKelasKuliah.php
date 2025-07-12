<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class DosenPengajarKelasKuliah
 *
 * @property string $id
 * @property string $id_aktivitas_mengajar
 * @property string $id_registrasi_dosen
 * @property int|null $nidn
 * @property string $nama_dosen
 * @property string $nama_kelas_kuliah
 * @property string|null $id_substansi
 * @property float $sks_substansi_total
 * @property int $rencana_minggu_pertemuan
 * @property int|null $realisasi_minggu_pertemuan
 * @property int $id_jenis_evaluasi
 * @property string $nama_jenis_evaluasi
 * @property int $id_semester
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_dosen
 * @property string $id_kelas_kuliah
 * @property string $id_prodi
 *
 * @property Dosen $dosen
 * @property JenisEvaluasi $jenis_evaluasi
 * @property KelasKuliah $kelas_kuliah
 * @property Prodi $prodi
 * @property Semester $semester
 *
 * @package App\Models
 */
class DosenPengajarKelasKuliah extends Model
{
    use HasUuids;
	protected $table = 'dosen_pengajar_kelas_kuliah';
	public $incrementing = false;

	protected $casts = [
		'nidn' => 'int',
		'sks_substansi_total' => 'float',
		'rencana_minggu_pertemuan' => 'int',
		'realisasi_minggu_pertemuan' => 'int',
		'id_jenis_evaluasi' => 'int',
		'id_semester' => 'int'
	];

	protected $fillable = [
		'id_aktivitas_mengajar',
		'id_registrasi_dosen',
		'nidn',
		'nama_dosen',
		'nama_kelas_kuliah',
		'id_substansi',
		'sks_substansi_total',
		'rencana_minggu_pertemuan',
		'realisasi_minggu_pertemuan',
		'id_jenis_evaluasi',
		'nama_jenis_evaluasi',
		'id_semester',
		'id_dosen',
		'id_kelas_kuliah',
		'id_prodi'
	];

	public function dosen()
	{
		return $this->belongsTo(Dosen::class, 'id_dosen', 'id_dosen');
	}

	public function jenis_evaluasi()
	{
		return $this->belongsTo(JenisEvaluasi::class, 'id_jenis_evaluasi', 'id_jenis_evaluasi');
	}

	public function kelas_kuliah()
	{
		return $this->belongsTo(KelasKuliah::class, 'id_kelas_kuliah', 'id_kelas_kuliah');
	}

	public function prodi()
	{
		return $this->belongsTo(Prodi::class, 'id_prodi', 'id_prodi');
	}

	public function semester()
	{
		return $this->belongsTo(Semester::class, 'id_semester', 'id_semester');
	}
}
