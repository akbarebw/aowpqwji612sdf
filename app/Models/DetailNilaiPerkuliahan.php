<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class DetailNilaiPerkuliahan
 *
 * @property string $id
 * @property string $nama_program_studi
 * @property int $id_semester
 * @property string $nama_semester
 * @property string $kode_mata_kuliah
 * @property string $nama_mata_kuliah
 * @property float $sks_mata_kuliah
 * @property string $nama_kelas_kuliah
 * @property string $id_registrasi_mahasiswa
 * @property string $id_mahasiswa
 * @property string $nama_mahasiswa
 * @property string $jurusan
 * @property string $angkatan
 * @property int|null $nilai_angka
 * @property float|null $nilai_indeks
 * @property string|null $nilai_huruf
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_prodi
 * @property string $id_matkul
 * @property string $id_kelas_kuliah
 *
 * @property KelasKuliah $kelas_kuliah
 * @property ListMataKuliah $list_mata_kuliah
 * @property Prodi $prodi
 * @property Semester $semester
 *
 * @package App\Models
 */
class DetailNilaiPerkuliahan extends Model
{
    use HasUuids;
    
	protected $table = 'detail_nilai_perkuliahan';
	public $incrementing = false;

	protected $casts = [
		'id_semester' => 'int',
		'sks_mata_kuliah' => 'float',
		'nilai_angka' => 'int',
		'nilai_indeks' => 'float'
	];

	protected $fillable = [
		'nama_program_studi',
		'id_semester',
		'nama_semester',
		'kode_mata_kuliah',
		'nama_mata_kuliah',
		'sks_mata_kuliah',
		'nama_kelas_kuliah',
		'id_registrasi_mahasiswa',
		'id_mahasiswa',
		'nama_mahasiswa',
		'jurusan',
		'angkatan',
		'nilai_angka',
		'nilai_indeks',
		'nilai_huruf',
		'id_prodi',
		'id_matkul',
		'id_kelas_kuliah'
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
