<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class RiwayatNilaiMahasiswa
 *
 * @property string $id
 * @property string $id_registrasi_mahasiswa
 * @property string $id_prodi
 * @property string $nama_program_studi
 * @property string $id_periode
 * @property string $nama_mata_kuliah
 * @property string $id_kelas
 * @property string $nama_kelas_kuliah
 * @property string $sks_mata_kuliah
 * @property int|null $nilai_angka
 * @property string $nilai_huruf
 * @property string $nilai_indeks
 * @property string $nim
 * @property string $nama_mahasiswa
 * @property string $angkatan
 * @property string $status_sync
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_matkul
 *
 * @property Prodi $prodi
 *
 * @package App\Models
 */
class RiwayatNilaiMahasiswa extends Model
{
    use HasUuids;
	protected $table = 'riwayat_nilai_mahasiswa';
	public $incrementing = false;

	protected $casts = [
		'nilai_angka' => 'int'
	];

	protected $fillable = [
		'id_registrasi_mahasiswa',
		'id_prodi',
		'nama_program_studi',
		'id_periode',
		'nama_mata_kuliah',
		'id_kelas',
		'nama_kelas_kuliah',
		'sks_mata_kuliah',
		'nilai_angka',
		'nilai_huruf',
		'nilai_indeks',
		'nim',
		'nama_mahasiswa',
		'angkatan',
		'status_sync',
		'id_matkul'
	];

	public function prodi()
	{
		return $this->belongsTo(Prodi::class, 'id_prodi', 'id_prodi');
	}
}
