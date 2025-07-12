<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class ExportDataNilaiTransfer
 *
 * @property string $id
 * @property int $periode
 * @property string $id_registrasi_mahasiswa
 * @property string $id_mahasiswa
 * @property string $nim
 * @property string $nama_mahasiswa
 * @property string $id_prodi
 * @property string $program_studi
 * @property int $angkatan
 * @property string $id_transfer
 * @property string $kode_matkul_asal
 * @property string $nama_mata_kuliah_asal
 * @property int $sks_mata_kuliah_asal
 * @property string $nilai_huruf_asal
 * @property string $kode_matkul_baru
 * @property string $nama_mata_kuliah_baru
 * @property int $sks_mata_kuliah_diakui
 * @property string $nilai_huruf_diakui
 * @property float $nilai_angka_diakui
 * @property string $status_sync
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Prodi $prodi
 * @property NilaiTransferPendidikanMahasiswa $nilai_transfer_pendidikan_mahasiswa
 *
 * @package App\Models
 */
class ExportDataNilaiTransfer extends Model
{
    use HasUuids;
	protected $table = 'export_data_nilai_transfer';
	public $incrementing = false;

	protected $casts = [
		'periode' => 'int',
		'angkatan' => 'int',
		'sks_mata_kuliah_asal' => 'int',
		'sks_mata_kuliah_diakui' => 'int',
		'nilai_angka_diakui' => 'float'
	];

	protected $fillable = [
		'periode',
		'id_registrasi_mahasiswa',
		'id_mahasiswa',
		'nim',
		'nama_mahasiswa',
		'id_prodi',
		'program_studi',
		'angkatan',
		'id_transfer',
		'kode_matkul_asal',
		'nama_mata_kuliah_asal',
		'sks_mata_kuliah_asal',
		'nilai_huruf_asal',
		'kode_matkul_baru',
		'nama_mata_kuliah_baru',
		'sks_mata_kuliah_diakui',
		'nilai_huruf_diakui',
		'nilai_angka_diakui',
		'status_sync'
	];

	public function prodi()
	{
		return $this->belongsTo(Prodi::class, 'id_prodi', 'id_prodi');
	}

	public function nilai_transfer_pendidikan_mahasiswa()
	{
		return $this->belongsTo(NilaiTransferPendidikanMahasiswa::class, 'id_transfer', 'id_transfer');
	}
}
