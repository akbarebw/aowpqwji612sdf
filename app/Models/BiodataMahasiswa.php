<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class BiodataMahasiswa
 *
 * @property string $id
 * @property string $nama_mahasiswa
 * @property string $jenis_kelamin
 * @property string $tempat_lahir
 * @property Carbon $tanggal_lahir
 * @property string|null $id_mahasiswa
 * @property int $id_agama
 * @property string $nama_agama
 * @property string|null $nik
 * @property int|null $nisn
 * @property int|null $npwp
 * @property string $id_negara
 * @property string $kewarganegaraan
 * @property string|null $jalan
 * @property string|null $dusun
 * @property string|null $rt
 * @property string|null $rw
 * @property string|null $kelurahan
 * @property string|null $kode_pos
 * @property string $id_wilayah
 * @property string|null $nama_wilayah
 * @property int|null $id_jenis_tinggal
 * @property string|null $nama_jenis_tinggal
 * @property int|null $id_alat_transportasi
 * @property string|null $nama_alat_transportasi
 * @property string|null $telepon
 * @property string|null $handphone
 * @property string|null $email
 * @property int|null $penerima_kps
 * @property int|null $nomor_kps
 * @property string|null $nik_ayah
 * @property string|null $nama_ayah
 * @property Carbon|null $tanggal_lahir_ayah
 * @property int|null $id_pendidikan_ayah
 * @property string|null $nama_pendidikan_ayah
 * @property int|null $id_pekerjaan_ayah
 * @property string|null $nama_pekerjaan_ayah
 * @property int|null $id_penghasilan_ayah
 * @property string|null $nama_penghasilan_ayah
 * @property string|null $nik_ibu
 * @property string $nama_ibu_kandung
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
 * @property int $id_kebutuhan_khusus_mahasiswa
 * @property string $nama_kebutuhan_khusus_mahasiswa
 * @property int $id_kebutuhan_khusus_ayah
 * @property string $nama_kebutuhan_khusus_ayah
 * @property int $id_kebutuhan_khusus_ibu
 * @property string $nama_kebutuhan_khusus_ibu
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Agama $agama
 * @property AlatTransportasi|null $alat_transportasi
 * @property JenisTinggal|null $jenis_tinggal
 *
 * @package App\Models
 */
class BiodataMahasiswa extends Model
{
    use HasUuids;
	protected $table = 'biodata_mahasiswa';
	public $incrementing = false;

	protected $casts = [
		'tanggal_lahir' => 'datetime',
		'id_agama' => 'int',
		'nisn' => 'int',
		'npwp' => 'int',
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
		'id_kebutuhan_khusus_ibu' => 'int'
	];

	protected $fillable = [
		'nama_mahasiswa',
		'jenis_kelamin',
		'tempat_lahir',
		'tanggal_lahir',
		'id_mahasiswa',
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
		'nik_ayah',
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
		'nama_kebutuhan_khusus_ibu'
	];

	public function agama()
	{
		return $this->belongsTo(Agama::class, 'id_agama', 'id_agama');
	}

	public function alat_transportasi()
	{
		return $this->belongsTo(AlatTransportasi::class, 'id_alat_transportasi', 'id_alat_transportasi');
	}

	public function jenis_tinggal()
	{
		return $this->belongsTo(JenisTinggal::class, 'id_jenis_tinggal', 'id_jenis_tinggal');
	}
}
