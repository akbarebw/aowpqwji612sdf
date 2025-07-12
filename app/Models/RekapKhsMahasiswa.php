<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class RekapKhsMahasiswa
 *
 * @property string $id
 * @property string $id_registrasi_mahasiswa
 * @property string $nama_program_studi
 * @property string $nim
 * @property string $nama_mahasiswa
 * @property int $angkatan
 * @property int $id_periode
 * @property string $nama_periode
 * @property string $nama_mata_kuliah
 * @property float|null $sks_mata_kuliah
 * @property float|null $nilai_angka
 * @property string|null $nilai_huruf
 * @property float|null $nilai_indeks
 * @property float|null $sks_x_indeks
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_prodi
 * @property string $id_matkul
 *
 * @property ListMataKuliah $list_mata_kuliah
 * @property Prodi $prodi
 *
 * @package App\Models
 */
class RekapKhsMahasiswa extends Model
{
    use HasUuids;
	protected $table = 'rekap_khs_mahasiswa';
	public $incrementing = false;

	protected $casts = [
		'angkatan' => 'int',
		'id_periode' => 'int',
		'sks_mata_kuliah' => 'float',
		'nilai_angka' => 'float',
		'nilai_indeks' => 'float',
		'sks_x_indeks' => 'float'
	];

	protected $fillable = [
		'id_registrasi_mahasiswa',
		'nama_program_studi',
		'nim',
		'nama_mahasiswa',
		'angkatan',
		'id_periode',
		'nama_periode',
		'nama_mata_kuliah',
		'sks_mata_kuliah',
		'nilai_angka',
		'nilai_huruf',
		'nilai_indeks',
		'sks_x_indeks',
		'id_prodi',
		'id_matkul'
	];

	public function list_mata_kuliah()
	{
		return $this->belongsTo(ListMataKuliah::class, 'id_matkul', 'id_matkul');
	}

	public function prodi()
	{
		return $this->belongsTo(Prodi::class, 'id_prodi', 'id_prodi');
	}
}
