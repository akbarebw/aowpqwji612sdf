<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Models\DosenPengajarKelasKuliah;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class KelasKuliah
 *
 * @property string $id
 * @property string $id_kelas_kuliah
 * @property string $nama_program_studi
 * @property int $id_semester
 * @property string $nama_semester
 * @property string $kode_mata_kuliah
 * @property string $nama_mata_kuliah
 * @property string $nama_kelas_kuliah
 * @property float $sks
 * @property string|null $id_dosen
 * @property string|null $nama_dosen
 * @property int $jumlah_mahasiswa
 * @property int $apa_untuk_pditt
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_prodi
 * @property string $id_matkul
 *
 * @property Prodi $prodi
 * @property Semester $semester
 * @property Collection|DetailKelasKuliah[] $detail_kelas_kuliahs
 * @property Collection|DetailNilaiPerkuliahan[] $detail_nilai_perkuliahans
 * @property Collection|Dosen[] $dosen
 * @property Collection|ExportDataKelasPerkuliahan[] $export_data_kelas_perkuliahans
 * @property Collection|ListNilaiPerkuliahanKelas[] $list_nilai_perkuliahan_kelas
 * @property Collection|Nilai[] $nilais
 * @property Collection|NilaiPerkuliahanKelas[] $nilai_perkuliahan_kelas
 * @property Collection|PesertaKelasKuliah[] $peserta_kelas_kuliahs
 *
 * @package App\Models
 */
class KelasKuliah extends Model
{
	use HasUuids;
	protected $table = 'kelas_kuliah';
	protected $primaryKey = 'id';
	protected $keyType = 'string';
	public $incrementing = false;

	protected $casts = [
		'id_semester' => 'int',
		'sks' => 'float',
		'jumlah_mahasiswa' => 'int',
		'apa_untuk_pditt' => 'int'
	];

	protected $fillable = [
		'id_kelas_kuliah',
		'nama_program_studi',
		'id_semester',
		'nama_semester',
		'kode_mata_kuliah',
		'nama_mata_kuliah',
		'nama_kelas_kuliah',
		'sks',
		'id_dosen',
		'nama_dosen',
		'jumlah_mahasiswa',
		'apa_untuk_pditt',
		'id_prodi',
		'id_matkul'
	];

	public function prodi()
	{
		return $this->belongsTo(Prodi::class, 'id_prodi', 'id_prodi');
	}

	public function semester()
	{
		return $this->belongsTo(Semester::class, 'id_semester', 'id_semester');
	}

	public function detail_kelas_kuliahs()
	{
		return $this->hasMany(DetailKelasKuliah::class, 'id_kelas_kuliah', 'id_kelas_kuliah');
	}

	public function detail_nilai_perkuliahans()
	{
		return $this->hasMany(DetailNilaiPerkuliahan::class, 'id_kelas_kuliah', 'id_kelas_kuliah');
	}

	public function dosen()
	{
		return $this->belongsToMany(Dosen::class, 'dosen_pengajar_kelas_kuliah', 'id_kelas_kuliah', 'id_dosen')
			->withPivot('id', 'id_aktivitas_mengajar', 'id_registrasi_dosen', 'nidn', 'nama_dosen', 'nama_kelas_kuliah', 'id_substansi', 'sks_substansi_total', 'rencana_minggu_pertemuan', 'realisasi_minggu_pertemuan', 'id_jenis_evaluasi', 'nama_jenis_evaluasi', 'id_semester', 'id_prodi')
			->withTimestamps();
	}

	public function dosenPengajar()
	{
		return $this->hasMany(DosenPengajarKelasKuliah::class, 'id_kelas_kuliah', 'id_kelas_kuliah');
	}

	public function export_data_kelas_perkuliahans()
	{
		return $this->hasMany(ExportDataKelasPerkuliahan::class, 'id_kelas_kuliah', 'id_kelas_kuliah');
	}

	public function list_nilai_perkuliahan_kelas()
	{
		return $this->hasMany(ListNilaiPerkuliahanKelas::class, 'id_kelas_kuliah', 'id_kelas_kuliah');
	}

	public function nilais()
	{
		return $this->hasMany(Nilai::class, 'id_kelas_kuliah');
	}

	public function nilai_perkuliahan_kelas()
	{
		return $this->hasMany(NilaiPerkuliahanKelas::class, 'id_kelas_kuliah', 'id_kelas_kuliah');
	}

	public function peserta_kelas_kuliahs()
	{
		return $this->hasMany(PesertaKelasKuliah::class, 'id_kelas_kuliah', 'id_kelas_kuliah');
	}
}
