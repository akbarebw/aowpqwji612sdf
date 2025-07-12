<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class DataLengkapMahasiswaProdi
 *
 * @property string $id
 * @property Carbon $tanggal_lahir
 * @property string $nama_program_studi
 * @property string $nama_status_mahasiswa
 * @property string|null $id_status_mahasiswa
 * @property string $nim
 * @property int $id_periode_masuk
 * @property string $nama_periode_masuk
 * @property string $id_registrasi_mahasiswa
 * @property string|null $jalur_masuk
 * @property string|null $nama_jalur_masuk
 * @property string $id_mahasiswa
 * @property string $nama_mahasiswa
 * @property string $jenis_kelamin
 * @property string $tempat_lahir
 * @property int $id_agama
 * @property string $nama_agama
 * @property string|null $nik
 * @property string|null $nisn
 * @property string|null $npwp
 * @property string $id_negara
 * @property string|null $kewarganegaraan
 * @property string|null $jalan
 * @property string|null $dusun
 * @property string|null $rt
 * @property string|null $rw
 * @property string|null $kelurahan
 * @property int|null $kode_pos
 * @property string $id_wilayah
 * @property string|null $nama_wilayah
 * @property int|null $id_jenis_tinggal
 * @property string|null $nama_jenis_tinggal
 * @property int|null $id_alat_transportasi
 * @property string|null $nama_alat_transportasi
 * @property string|null $telepon
 * @property string|null $handphone
 * @property string|null $email
 * @property int $penerima_kps
 * @property int|null $nomor_kps
 * @property string|null $nama_ayah
 * @property Carbon|null $tanggal_lahir_ayah
 * @property int|null $id_pendidikan_ayah
 * @property string|null $nama_pendidikan_ayah
 * @property int|null $id_pekerjaan_ayah
 * @property string|null $nama_pekerjaan_ayah
 * @property int|null $id_penghasilan_ayah
 * @property string|null $nama_penghasilan_ayah
 * @property string|null $nik_ibu
 * @property string|null $nama_ibu_kandung
 * @property Carbon|null $tanggal_lahir_ibu
 * @property int|null $id_pendidikan_ibu
 * @property string|null $nama_pendidikan_ibu
 * @property int|null $id_pekerjaan_ibu
 * @property string|null $nama_pekerjaan_ibu
 * @property int|null $id_penghasilan_ibu
 * @property string|null $nama_penghasilan_ibu
 * @property string|null $nama_wali
 * @property Carbon|null $tanggal_lahir_wali
 * @property int|null $id_pendidikan_wali
 * @property string|null $nama_pendidikan_wali
 * @property int|null $id_pekerjaan_wali
 * @property string|null $nama_pekerjaan_wali
 * @property int|null $id_penghasilan_wali
 * @property string|null $nama_penghasilan_wali
 * @property int|null $id_kebutuhan_khusus_mahasiswa
 * @property string|null $nama_kebutuhan_khusus_mahasiswa
 * @property int|null $id_kebutuhan_khusus_ayah
 * @property string|null $nama_kebutuhan_khusus_ayah
 * @property int|null $id_kebutuhan_khusus_ibu
 * @property string|null $nama_kebutuhan_khusus_ibu
 * @property int|null $sks_diakui
 * @property string|null $id_perguruan_tinggi_asal
 * @property string|null $nama_perguruan_tinggi_asal
 * @property string|null $id_prodi_asal
 * @property string|null $nama_program_studi_asal
 * @property string $status_sync
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_prodi
 *
 * @property Agama $agama
 * @property Prodi $prodi
 *
 * @package App\Models
 */
class DataLengkapMahasiswaProdi extends Model
{
    use HasUuids;
	protected $table = 'data_lengkap_mahasiswa_prodi';
	public $incrementing = false;

	protected $casts = [
		'tanggal_lahir' => 'datetime',
		'id_periode_masuk' => 'int',
		'id_agama' => 'int',
		'kode_pos' => 'int',
		'id_jenis_tinggal' => 'int',
		'id_alat_transportasi' => 'int',
		'penerima_kps' => 'int',
		'nomor_kps' => 'int',
		'tanggal_lahir_ayah' => 'datetime',
		'id_pendidikan_ayah' => 'int',
		'id_pekerjaan_ayah' => 'int',
		'id_penghasilan_ayah' => 'int',
		'tanggal_lahir_ibu' => 'datetime',
		'id_pendidikan_ibu' => 'int',
		'id_pekerjaan_ibu' => 'int',
		'id_penghasilan_ibu' => 'int',
		'tanggal_lahir_wali' => 'datetime',
		'id_pendidikan_wali' => 'int',
		'id_pekerjaan_wali' => 'int',
		'id_penghasilan_wali' => 'int',
		'id_kebutuhan_khusus_mahasiswa' => 'int',
		'id_kebutuhan_khusus_ayah' => 'int',
		'id_kebutuhan_khusus_ibu' => 'int',
		'sks_diakui' => 'int'
	];

	protected $fillable = [
		'tanggal_lahir',
		'nama_program_studi',
		'nama_status_mahasiswa',
		'id_status_mahasiswa',
		'nim',
		'id_periode_masuk',
		'nama_periode_masuk',
		'id_registrasi_mahasiswa',
		'jalur_masuk',
		'nama_jalur_masuk',
		'id_mahasiswa',
		'nama_mahasiswa',
		'jenis_kelamin',
		'tempat_lahir',
		'id_agama',
		'nama_agama',
		'nik',
		'nisn',
		'npwp',
		'id_negara',
		'kewarganegaraan',
		'jalan',
		'dusun',
		'rt',
		'rw',
		'kelurahan',
		'kode_pos',
		'id_wilayah',
		'nama_wilayah',
		'id_jenis_tinggal',
		'nama_jenis_tinggal',
		'id_alat_transportasi',
		'nama_alat_transportasi',
		'telepon',
		'handphone',
		'email',
		'penerima_kps',
		'nomor_kps',
		'nama_ayah',
		'tanggal_lahir_ayah',
		'id_pendidikan_ayah',
		'nama_pendidikan_ayah',
		'id_pekerjaan_ayah',
		'nama_pekerjaan_ayah',
		'id_penghasilan_ayah',
		'nama_penghasilan_ayah',
		'nik_ibu',
		'nama_ibu_kandung',
		'tanggal_lahir_ibu',
		'id_pendidikan_ibu',
		'nama_pendidikan_ibu',
		'id_pekerjaan_ibu',
		'nama_pekerjaan_ibu',
		'id_penghasilan_ibu',
		'nama_penghasilan_ibu',
		'nama_wali',
		'tanggal_lahir_wali',
		'id_pendidikan_wali',
		'nama_pendidikan_wali',
		'id_pekerjaan_wali',
		'nama_pekerjaan_wali',
		'id_penghasilan_wali',
		'nama_penghasilan_wali',
		'id_kebutuhan_khusus_mahasiswa',
		'nama_kebutuhan_khusus_mahasiswa',
		'id_kebutuhan_khusus_ayah',
		'nama_kebutuhan_khusus_ayah',
		'id_kebutuhan_khusus_ibu',
		'nama_kebutuhan_khusus_ibu',
		'sks_diakui',
		'id_perguruan_tinggi_asal',
		'nama_perguruan_tinggi_asal',
		'id_prodi_asal',
		'nama_program_studi_asal',
		'status_sync',
		'id_prodi'
	];

	public function agama()
	{
		return $this->belongsTo(Agama::class, 'id_agama', 'id_agama');
	}

	public function prodi()
	{
		return $this->belongsTo(Prodi::class, 'id_prodi', 'id_prodi');
	}
}
