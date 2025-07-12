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
 * Class Semester
 *
 * @property string $id
 * @property int $id_semester
 * @property int|null $id_tahun_ajaran
 * @property string $nama_semester
 * @property int $semester
 * @property int $a_periode_aktif
 * @property Carbon $tanggal_mulai
 * @property Carbon $tanggal_selesai
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|DetailKelasKuliah[] $detail_kelas_kuliahs
 * @property Collection|DetailKurikulum[] $detail_kurikulums
 * @property Collection|DetailNilaiPerkuliahan[] $detail_nilai_perkuliahans
 * @property Collection|DetailPeriodePerkuliahan[] $detail_periode_perkuliahans
 * @property Collection|DetailPerkuliahanMahasiswa[] $detail_perkuliahan_mahasiswas
 * @property Collection|DosenPengajarKelasKuliah[] $dosen_pengajar_kelas_kuliahs
 * @property Collection|KelasKuliah[] $kelas_kuliahs
 * @property Collection|KonversiKampusMerdeka[] $konversi_kampus_merdekas
 * @property Collection|Kurikulum[] $kurikulums
 * @property Collection|ListAktivitasMahasiswa[] $list_aktivitas_mahasiswas
 * @property Collection|ListNilaiPerkuliahanKelas[] $list_nilai_perkuliahan_kelas
 * @property Collection|ListNilaiPerkuliahanMahasiswa[] $list_nilai_perkuliahan_mahasiswas
 * @property Collection|ListPerkuliahanMahasiswa[] $list_perkuliahan_mahasiswas
 * @property Collection|MatkulKurikulum[] $matkul_kurikulums
 * @property Collection|NilaiTransferPendidikanMahasiswa[] $nilai_transfer_pendidikan_mahasiswas
 * @property Collection|PeriodePerkuliahan[] $periode_perkuliahans
 * @property Collection|RekapKrsMahasiswa[] $rekap_krs_mahasiswas
 *
 * @package App\Models
 */
class Semester extends Model
{
    use HasUuids;
	protected $table = 'semester';
	public $incrementing = false;

	protected $casts = [
		'id_semester' => 'int',
		'id_tahun_ajaran' => 'int',
		'semester' => 'int',
		'a_periode_aktif' => 'int',
		'tanggal_mulai' => 'datetime',
		'tanggal_selesai' => 'datetime'
	];

	protected $fillable = [
		'id_semester',
		'id_tahun_ajaran',
		'nama_semester',
		'semester',
		'a_periode_aktif',
		'tanggal_mulai',
		'tanggal_selesai'
	];

	public function detail_kelas_kuliahs()
	{
		return $this->hasMany(DetailKelasKuliah::class, 'id_semester', 'id_semester');
	}

	public function detail_kurikulums()
	{
		return $this->hasMany(DetailKurikulum::class, 'id_semester', 'id_semester');
	}

	public function detail_nilai_perkuliahans()
	{
		return $this->hasMany(DetailNilaiPerkuliahan::class, 'id_semester', 'id_semester');
	}

	public function detail_periode_perkuliahans()
	{
		return $this->hasMany(DetailPeriodePerkuliahan::class, 'id_semester', 'id_semester');
	}

	public function detail_perkuliahan_mahasiswas()
	{
		return $this->hasMany(DetailPerkuliahanMahasiswa::class, 'id_semester', 'id_semester');
	}

	public function dosen_pengajar_kelas_kuliahs()
	{
		return $this->hasMany(DosenPengajarKelasKuliah::class, 'id_semester', 'id_semester');
	}

	public function kelas_kuliahs()
	{
		return $this->hasMany(KelasKuliah::class, 'id_semester', 'id_semester');
	}

	public function konversi_kampus_merdekas()
	{
		return $this->hasMany(KonversiKampusMerdeka::class, 'id_semester', 'id_semester');
	}

	public function kurikulums()
	{
		return $this->hasMany(Kurikulum::class, 'id_semester', 'id_semester');
	}

	public function list_aktivitas_mahasiswas()
	{
		return $this->hasMany(ListAktivitasMahasiswa::class, 'id_semester', 'id_semester');
	}

	public function list_nilai_perkuliahan_kelas()
	{
		return $this->hasMany(ListNilaiPerkuliahanKelas::class, 'id_smt', 'id_semester');
	}

	public function list_nilai_perkuliahan_mahasiswas()
	{
		return $this->hasMany(ListNilaiPerkuliahanMahasiswa::class, 'id_semester', 'id_semester');
	}

	public function list_perkuliahan_mahasiswas()
	{
		return $this->hasMany(ListPerkuliahanMahasiswa::class, 'id_semester', 'id_semester');
	}

	public function matkul_kurikulums()
	{
		return $this->hasMany(MatkulKurikulum::class, 'id_semester', 'id_semester');
	}

	public function nilai_transfer_pendidikan_mahasiswas()
	{
		return $this->hasMany(NilaiTransferPendidikanMahasiswa::class, 'id_semester', 'id_semester');
	}

	public function periode_perkuliahans()
	{
		return $this->hasMany(PeriodePerkuliahan::class, 'id_semester', 'id_semester');
	}

	public function rekap_krs_mahasiswas()
	{
		return $this->hasMany(RekapKrsMahasiswa::class, 'id_semester', 'id_semester');
	}

	public function kelasKuliah()
{
    return $this->hasMany(\App\Models\KelasKuliah::class, 'id_semester', 'id_semester');
}

}
