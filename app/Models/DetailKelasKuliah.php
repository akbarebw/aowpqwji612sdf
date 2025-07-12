<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class DetailKelasKuliah
 *
 * @property string $id
 * @property string $nama_program_studi
 * @property int $id_semester
 * @property string $nama_semester
 * @property string $kode_mata_kuliah
 * @property string $nama_mata_kuliah
 * @property string $nama_kelas_kuliah
 * @property string|null $bahasan
 * @property Carbon|null $tanggal_mulai_efektif
 * @property Carbon|null $tanggal_akhir_efektif
 * @property string|null $kapasitas
 * @property Carbon|null $tanggal_tutup_daftar
 * @property string|null $prodi_penyelenggara
 * @property string|null $perguruan_tinggi_penyelenggara
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_kelas_kuliah
 * @property string $id_prodi
 * @property string $id_matkul
 *
 * @property KelasKuliah $kelas_kuliah
 * @property ListMataKuliah $list_mata_kuliah
 * @property Prodi $prodi
 * @property Semester $semester
 *
 * @package App\Models
 */
class DetailKelasKuliah extends Model
{
    use HasUuids;
	protected $table = 'detail_kelas_kuliah';
	public $incrementing = false;

	protected $casts = [
		'id_semester' => 'int',
		'tanggal_mulai_efektif' => 'datetime',
		'tanggal_akhir_efektif' => 'datetime',
		'tanggal_tutup_daftar' => 'datetime'
	];

	protected $fillable = [
		'nama_program_studi',
		'id_semester',
		'nama_semester',
		'kode_mata_kuliah',
		'nama_mata_kuliah',
		'nama_kelas_kuliah',
		'bahasan',
		'tanggal_mulai_efektif',
		'tanggal_akhir_efektif',
		'kapasitas',
		'tanggal_tutup_daftar',
		'prodi_penyelenggara',
		'perguruan_tinggi_penyelenggara',
		'id_kelas_kuliah',
		'id_prodi',
		'id_matkul'
	];

	public function kelas_kuliah()
	{
		return $this->belongsTo(KelasKuliah::class, 'id_kelas_kuliah', 'id_kelas_kuliah');
	}

	public function list_mata_kuliah()
	{
		return $this->belongsTo(ListMataKuliah::class, 'id_matkul', 'id_matkul');
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
