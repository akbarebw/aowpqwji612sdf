<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class NilaiTransferPendidikanMahasiswa
 *
 * @property string $id
 * @property string $id_transfer
 * @property string $id_registrasi_mahasiswa
 * @property string $nim
 * @property string $nama_mahasiswa
 * @property string $nama_program_studi
 * @property string $id_periode_masuk
 * @property string $kode_mata_kuliah_asal
 * @property string $nama_mata_kuliah_asal
 * @property int $sks_mata_kuliah_asal
 * @property string $nilai_huruf_asal
 * @property string $kode_matkul_diakui
 * @property string $nama_mata_kuliah_diakui
 * @property int $sks_mata_kuliah_diakui
 * @property string $nilai_huruf_diakui
 * @property float $nilai_angka_diakui
 * @property string|null $id_perguruan_tinggi
 * @property string|null $id_aktivitas
 * @property string|null $judul
 * @property int|null $id_jenis_aktivitas
 * @property string|null $nama_jenis_aktivitas
 * @property int|null $id_semester
 * @property string|null $nama_semester
 * @property string $status_sync
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_prodi
 * @property string $id_matkul
 *
 * @property ListMataKuliah $list_mata_kuliah
 * @property Prodi $prodi
 * @property Semester|null $semester
 * @property Collection|ExportDataNilaiTransfer[] $export_data_nilai_transfers
 *
 * @package App\Models
 */
class NilaiTransferPendidikanMahasiswa extends Model
{
    use HasUuids;
	protected $table = 'nilai_transfer_pendidikan_mahasiswa';
	public $incrementing = false;

	protected $casts = [
		'sks_mata_kuliah_asal' => 'int',
		'sks_mata_kuliah_diakui' => 'int',
		'nilai_angka_diakui' => 'float',
		'id_jenis_aktivitas' => 'int',
		'id_semester' => 'int'
	];

	protected $fillable = [
		'id_transfer',
		'id_registrasi_mahasiswa',
		'nim',
		'nama_mahasiswa',
		'nama_program_studi',
		'id_periode_masuk',
		'kode_mata_kuliah_asal',
		'nama_mata_kuliah_asal',
		'sks_mata_kuliah_asal',
		'nilai_huruf_asal',
		'kode_matkul_diakui',
		'nama_mata_kuliah_diakui',
		'sks_mata_kuliah_diakui',
		'nilai_huruf_diakui',
		'nilai_angka_diakui',
		'id_perguruan_tinggi',
		'id_aktivitas',
		'judul',
		'id_jenis_aktivitas',
		'nama_jenis_aktivitas',
		'id_semester',
		'nama_semester',
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

	public function semester()
	{
		return $this->belongsTo(Semester::class, 'id_semester', 'id_semester');
	}

	public function export_data_nilai_transfers()
	{
		return $this->hasMany(ExportDataNilaiTransfer::class, 'id_transfer', 'id_transfer');
	}
}
