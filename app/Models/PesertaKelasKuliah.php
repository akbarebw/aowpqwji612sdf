<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class PesertaKelasKuliah
 *
 * @property string $id
 * @property string $nama_kelas_kuliah
 * @property string $id_registrasi_mahasiswa
 * @property string $id_mahasiswa
 * @property string $nim
 * @property string $nama_mahasiswa
 * @property string $kode_mata_kuliah
 * @property string $nama_mata_kuliah
 * @property string $nama_program_studi
 * @property float $angkatan
 * @property string $status_sync
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_kelas_kuliah
 * @property string $id_matkul
 * @property string $id_prodi
 *
 * @property KelasKuliah $kelas_kuliah
 * @property ListMataKuliah $list_mata_kuliah
 * @property Prodi $prodi
 *
 * @package App\Models
 */
class PesertaKelasKuliah extends Model
{
    use HasUuids;
	protected $table = 'peserta_kelas_kuliah';
	public $incrementing = false;

	protected $casts = [
		'angkatan' => 'float'
	];

	protected $fillable = [
		'nama_kelas_kuliah',
		'id_registrasi_mahasiswa',
		'id_mahasiswa',
		'nim',
		'nama_mahasiswa',
		'kode_mata_kuliah',
		'nama_mata_kuliah',
		'nama_program_studi',
		'angkatan',
		'status_sync',
		'id_kelas_kuliah',
		'id_matkul',
		'id_prodi'
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
}
