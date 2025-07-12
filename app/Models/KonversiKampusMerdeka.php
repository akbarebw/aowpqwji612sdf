<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class KonversiKampusMerdeka
 *
 * @property string $id
 * @property string $id_konversi_aktivitas
 * @property string $nama_mata_kuliah
 * @property string $id_aktivitas
 * @property string $judul
 * @property string $id_anggota
 * @property string $nama_mahasiswa
 * @property string $nim
 * @property float $sks_mata_kuliah
 * @property float $nilai_angka
 * @property float $nilai_indeks
 * @property string $nilai_huruf
 * @property int $id_semester
 * @property string $nama_semester
 * @property string $status_sync
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_matkul
 *
 * @property MataKuliah $mata_kuliah
 * @property Semester $semester
 *
 * @package App\Models
 */
class KonversiKampusMerdeka extends Model
{
    use HasUuids;
	protected $table = 'konversi_kampus_merdeka';
	public $incrementing = false;

	protected $casts = [
		'sks_mata_kuliah' => 'float',
		'nilai_angka' => 'float',
		'nilai_indeks' => 'float',
		'id_semester' => 'int'
	];

	protected $fillable = [
		'id_konversi_aktivitas',
		'nama_mata_kuliah',
		'id_aktivitas',
		'judul',
		'id_anggota',
		'nama_mahasiswa',
		'nim',
		'sks_mata_kuliah',
		'nilai_angka',
		'nilai_indeks',
		'nilai_huruf',
		'id_semester',
		'nama_semester',
		'status_sync',
		'id_matkul'
	];

	public function mata_kuliah()
	{
		return $this->belongsTo(MataKuliah::class, 'id_matkul', 'id_matkul');
	}

	public function semester()
	{
		return $this->belongsTo(Semester::class, 'id_semester', 'id_semester');
	}
}
