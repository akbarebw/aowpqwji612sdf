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
 * Class ListMataKuliah
 *
 * @property string $id
 * @property int $id_jenj_didik
 * @property Carbon $tgl_create
 * @property string $id_matkul
 * @property string|null $jns_mk
 * @property string|null $kel_mk
 * @property string $kode_mata_kuliah
 * @property string $nama_mata_kuliah
 * @property float $sks_mata_kuliah
 * @property string $id_prodi
 * @property string $nama_program_studi
 * @property string|null $id_jenis_mata_kuliah
 * @property string|null $id_kelompok_mata_kuliah
 * @property float|null $sks_tatap_muka
 * @property float|null $sks_praktek
 * @property float|null $sks_praktek_lapangan
 * @property float|null $sks_simulasi
 * @property string|null $metode_kuliah
 * @property int|null $ada_sap
 * @property int|null $ada_silabus
 * @property int|null $ada_bahan_ajar
 * @property int|null $ada_acara_praktek
 * @property int|null $ada_diktat
 * @property Carbon|null $tanggal_mulai_efektif
 * @property Carbon|null $tanggal_selesai_efektif
 * @property string|null $nama_kelompok_mata_kuliah
 * @property string|null $nama_jenis_mata_kuliah
 * @property string $status_sync
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property JenjangPendidikan $jenjang_pendidikan
 * @property Prodi $prodi
 * @property Collection|AktivitasMengajarDosen[] $aktivitas_mengajar_dosens
 * @property Collection|BobotKomponen[] $bobot_komponens
 * @property Collection|DetailKelasKuliah[] $detail_kelas_kuliahs
 * @property Collection|DetailNilaiPerkuliahan[] $detail_nilai_perkuliahans
 * @property Collection|ExportDataKelasPerkuliahan[] $export_data_kelas_perkuliahans
 * @property Collection|ExportDataMahasiswaKrs[] $export_data_mahasiswa_krs
 * @property Collection|ExportDataMatkulProdi[] $export_data_matkul_prodis
 * @property Collection|KrsMahasiswa[] $krs_mahasiswas
 * @property Collection|ListNilaiPerkuliahanKelas[] $list_nilai_perkuliahan_kelas
 * @property Collection|NilaiTransferPendidikanMahasiswa[] $nilai_transfer_pendidikan_mahasiswas
 * @property Collection|PesertaKelasKuliah[] $peserta_kelas_kuliahs
 * @property Collection|RekapKhsMahasiswa[] $rekap_khs_mahasiswas
 * @property Collection|RekapKrsMahasiswa[] $rekap_krs_mahasiswas
 *
 * @package App\Models
 */
class ListMataKuliah extends Model
{
    use HasUuids;
	protected $table = 'list_mata_kuliah';
	public $incrementing = false;

	protected $casts = [
		'id_jenj_didik' => 'int',
		'tgl_create' => 'datetime',
		'sks_mata_kuliah' => 'float',
		'sks_tatap_muka' => 'float',
		'sks_praktek' => 'float',
		'sks_praktek_lapangan' => 'float',
		'sks_simulasi' => 'float',
		'ada_sap' => 'int',
		'ada_silabus' => 'int',
		'ada_bahan_ajar' => 'int',
		'ada_acara_praktek' => 'int',
		'ada_diktat' => 'int',
		'tanggal_mulai_efektif' => 'datetime',
		'tanggal_selesai_efektif' => 'datetime'
	];

	protected $fillable = [
		'id_jenj_didik',
		'tgl_create',
		'id_matkul',
		'jns_mk',
		'kel_mk',
		'kode_mata_kuliah',
		'nama_mata_kuliah',
		'sks_mata_kuliah',
		'id_prodi',
		'nama_program_studi',
		'id_jenis_mata_kuliah',
		'id_kelompok_mata_kuliah',
		'sks_tatap_muka',
		'sks_praktek',
		'sks_praktek_lapangan',
		'sks_simulasi',
		'metode_kuliah',
		'ada_sap',
		'ada_silabus',
		'ada_bahan_ajar',
		'ada_acara_praktek',
		'ada_diktat',
		'tanggal_mulai_efektif',
		'tanggal_selesai_efektif',
		'nama_kelompok_mata_kuliah',
		'nama_jenis_mata_kuliah',
		'status_sync'
	];

	public function jenjang_pendidikan()
	{
		return $this->belongsTo(JenjangPendidikan::class, 'id_jenj_didik', 'id_jenjang_didik');
	}

	public function prodi()
	{
		return $this->belongsTo(Prodi::class, 'id_prodi', 'id_prodi');
	}

	public function aktivitas_mengajar_dosens()
	{
		return $this->hasMany(AktivitasMengajarDosen::class, 'id_matkul', 'id_matkul');
	}

	public function bobot_komponens()
	{
		return $this->hasMany(BobotKomponen::class, 'id_matkul');
	}

	public function detail_kelas_kuliahs()
	{
		return $this->hasMany(DetailKelasKuliah::class, 'id_matkul', 'id_matkul');
	}

	public function detail_nilai_perkuliahans()
	{
		return $this->hasMany(DetailNilaiPerkuliahan::class, 'id_matkul', 'id_matkul');
	}

	public function export_data_kelas_perkuliahans()
	{
		return $this->hasMany(ExportDataKelasPerkuliahan::class, 'id_matkul', 'id_matkul');
	}

	public function export_data_mahasiswa_krs()
	{
		return $this->hasMany(ExportDataMahasiswaKrs::class, 'id_matkul', 'id_matkul');
	}

	public function export_data_matkul_prodis()
	{
		return $this->hasMany(ExportDataMatkulProdi::class, 'id_matkul', 'id_matkul');
	}

	public function krs_mahasiswas()
	{
		return $this->hasMany(KrsMahasiswa::class, 'id_matkul', 'id_matkul');
	}

	public function list_nilai_perkuliahan_kelas()
	{
		return $this->hasMany(ListNilaiPerkuliahanKelas::class, 'id_matkul', 'id_matkul');
	}

	public function nilai_transfer_pendidikan_mahasiswas()
	{
		return $this->hasMany(NilaiTransferPendidikanMahasiswa::class, 'id_matkul', 'id_matkul');
	}

	public function peserta_kelas_kuliahs()
	{
		return $this->hasMany(PesertaKelasKuliah::class, 'id_matkul', 'id_matkul');
	}

	public function rekap_khs_mahasiswas()
	{
		return $this->hasMany(RekapKhsMahasiswa::class, 'id_matkul', 'id_matkul');
	}

	public function rekap_krs_mahasiswas()
	{
		return $this->hasMany(RekapKrsMahasiswa::class, 'id_matkul', 'id_matkul');
	}
}
