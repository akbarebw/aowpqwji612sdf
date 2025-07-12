<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class ExportDataMahasiswaKrs
 *
 * @property string $id
 * @property string $nama_program_studi
 * @property string $id_periode
 * @property string $nama_periode
 * @property string $id_registrasi_mahasiswa
 * @property string $nim
 * @property string $nama_mahasiswa
 * @property string $kode_mata_kuliah
 * @property string $nama_mata_kuliah
 * @property float $sks_mata_kuliah
 * @property int $nilai_angka
 * @property string $nilai_huruf
 * @property int $nilai_indeks
 * @property string $status_sync
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
class ExportDataMahasiswaKrs extends Model
{
    use HasUuids;
	protected $table = 'export_data_mahasiswa_krs';
	public $incrementing = false;

	protected $casts = [
		'sks_mata_kuliah' => 'float',
		'nilai_angka' => 'int',
		'nilai_indeks' => 'int'
	];

	protected $fillable = [
		'nama_program_studi',
		'id_periode',
		'nama_periode',
		'id_registrasi_mahasiswa',
		'nim',
		'nama_mahasiswa',
		'kode_mata_kuliah',
		'nama_mata_kuliah',
		'sks_mata_kuliah',
		'nilai_angka',
		'nilai_huruf',
		'nilai_indeks',
		'status_sync',
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
