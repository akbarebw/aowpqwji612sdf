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
 * Class Prodi
 *
 * @property string $id
 * @property string $id_prodi
 * @property int $kode_program_studi
 * @property string $nama_program_studi
 * @property string $status
 * @property int $id_jenjang_pendidikan
 * @property string $nama_jenjang_pendidikan
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property JenjangPendidikan $jenjang_pendidikan
 * @property Collection|AktivitasMengajarDosen[] $aktivitas_mengajar_dosens
 * @property Collection|DataLengkapMahasiswaProdi[] $data_lengkap_mahasiswa_prodis
 * @property Collection|DetailKelasKuliah[] $detail_kelas_kuliahs
 * @property Collection|DetailKurikulum[] $detail_kurikulums
 * @property Collection|DetailMataKuliah[] $detail_mata_kuliahs
 * @property Collection|DetailNilaiPerkuliahan[] $detail_nilai_perkuliahans
 * @property Collection|DetailPeriodePerkuliahan[] $detail_periode_perkuliahans
 * @property Collection|DetailPerkuliahanMahasiswa[] $detail_perkuliahan_mahasiswas
 * @property Collection|DosenPengajarKelasKuliah[] $dosen_pengajar_kelas_kuliahs
 * @property Collection|ExportDataAktivitasKuliah[] $export_data_aktivitas_kuliahs
 * @property Collection|ExportDataKelasPerkuliahan[] $export_data_kelas_perkuliahans
 * @property Collection|ExportDataMahasiswa[] $export_data_mahasiswas
 * @property Collection|ExportDataMahasiswaKrs[] $export_data_mahasiswa_krs
 * @property Collection|ExportDataMahasiswaLulus[] $export_data_mahasiswa_luluses
 * @property Collection|ExportDataNilaiTransfer[] $export_data_nilai_transfers
 * @property Collection|ExportDataPenugasanDosen[] $export_data_penugasan_dosens
 * @property Collection|KelasKuliah[] $kelas_kuliahs
 * @property Collection|KrsMahasiswa[] $krs_mahasiswas
 * @property Collection|Kurikulum[] $kurikulums
 * @property Collection|ListAktivitasMahasiswa[] $list_aktivitas_mahasiswas
 * @property Collection|ListMataKuliah[] $list_mata_kuliahs
 * @property Collection|ListNilaiPerkuliahanMahasiswa[] $list_nilai_perkuliahan_mahasiswas
 * @property Collection|ListPerkuliahanMahasiswa[] $list_perkuliahan_mahasiswas
 * @property Collection|ListSkalaNilaiProdi[] $list_skala_nilai_prodis
 * @property Collection|Mahasiswa[] $mahasiswas
 * @property Collection|MataKuliah[] $mata_kuliahs
 * @property Collection|MatkulKurikulum[] $matkul_kurikulums
 * @property Collection|NilaiTransferPendidikanMahasiswa[] $nilai_transfer_pendidikan_mahasiswas
 * @property Collection|PenugasanDosen[] $penugasan_dosens
 * @property Collection|PenugasanSemuaDosen[] $penugasan_semua_dosens
 * @property Collection|Periode[] $periodes
 * @property Collection|PesertaKelasKuliah[] $peserta_kelas_kuliahs
 * @property Collection|RekapJumlahDosen[] $rekap_jumlah_dosens
 * @property Collection|RekapKhsMahasiswa[] $rekap_khs_mahasiswas
 * @property Collection|RekapKrsMahasiswa[] $rekap_krs_mahasiswas
 * @property Collection|RencanaEvaluasi[] $rencana_evaluasis
 * @property Collection|RencanaPembelajaran[] $rencana_pembelajarans
 * @property Collection|RiwayatNilaiMahasiswa[] $riwayat_nilai_mahasiswas
 *
 * @package App\Models
 */
class Prodi extends Model
{
    use HasUuids;
	protected $table = 'prodi';
	public $incrementing = false;

	protected $casts = [
		'kode_program_studi' => 'int',
		'id_jenjang_pendidikan' => 'int'
	];

	protected $fillable = [
		'id_prodi',
		'kode_program_studi',
		'nama_program_studi',
		'status',
		'id_jenjang_pendidikan',
		'nama_jenjang_pendidikan'
	];

	public function jenjang_pendidikan()
	{
		return $this->belongsTo(JenjangPendidikan::class, 'id_jenjang_pendidikan', 'id_jenjang_didik');
	}

	public function aktivitas_mengajar_dosens()
	{
		return $this->hasMany(AktivitasMengajarDosen::class, 'id_prodi', 'id_prodi');
	}

	public function data_lengkap_mahasiswa_prodis()
	{
		return $this->hasMany(DataLengkapMahasiswaProdi::class, 'id_prodi', 'id_prodi');
	}

	public function detail_kelas_kuliahs()
	{
		return $this->hasMany(DetailKelasKuliah::class, 'id_prodi', 'id_prodi');
	}

	public function detail_kurikulums()
	{
		return $this->hasMany(DetailKurikulum::class, 'id_prodi', 'id_prodi');
	}

	public function detail_mata_kuliahs()
	{
		return $this->hasMany(DetailMataKuliah::class, 'id_prodi', 'id_prodi');
	}

	public function detail_nilai_perkuliahans()
	{
		return $this->hasMany(DetailNilaiPerkuliahan::class, 'id_prodi', 'id_prodi');
	}

	public function detail_periode_perkuliahans()
	{
		return $this->hasMany(DetailPeriodePerkuliahan::class, 'id_prodi', 'id_prodi');
	}

	public function detail_perkuliahan_mahasiswas()
	{
		return $this->hasMany(DetailPerkuliahanMahasiswa::class, 'id_prodi', 'id_prodi');
	}

	public function dosen_pengajar_kelas_kuliahs()
	{
		return $this->hasMany(DosenPengajarKelasKuliah::class, 'id_prodi', 'id_prodi');
	}

	public function export_data_aktivitas_kuliahs()
	{
		return $this->hasMany(ExportDataAktivitasKuliah::class, 'id_prodi', 'id_prodi');
	}

	public function export_data_kelas_perkuliahans()
	{
		return $this->hasMany(ExportDataKelasPerkuliahan::class, 'id_prodi', 'id_prodi');
	}

	public function export_data_mahasiswas()
	{
		return $this->hasMany(ExportDataMahasiswa::class, 'id_prodi', 'id_prodi');
	}

	public function export_data_mahasiswa_krs()
	{
		return $this->hasMany(ExportDataMahasiswaKrs::class, 'id_prodi', 'id_prodi');
	}

	public function export_data_mahasiswa_luluses()
	{
		return $this->hasMany(ExportDataMahasiswaLulus::class, 'id_prodi', 'id_prodi');
	}

	public function export_data_nilai_transfers()
	{
		return $this->hasMany(ExportDataNilaiTransfer::class, 'id_prodi', 'id_prodi');
	}

	public function export_data_penugasan_dosens()
	{
		return $this->hasMany(ExportDataPenugasanDosen::class, 'id_prodi', 'id_prodi');
	}

	public function kelas_kuliahs()
	{
		return $this->hasMany(KelasKuliah::class, 'id_prodi', 'id_prodi');
	}

	public function krs_mahasiswas()
	{
		return $this->hasMany(KrsMahasiswa::class, 'id_prodi', 'id_prodi');
	}

	public function kurikulums()
	{
		return $this->hasMany(Kurikulum::class, 'id_prodi', 'id_prodi');
	}

	public function list_aktivitas_mahasiswas()
	{
		return $this->hasMany(ListAktivitasMahasiswa::class, 'id_prodi', 'id_prodi');
	}

	public function list_mata_kuliahs()
	{
		return $this->hasMany(ListMataKuliah::class, 'id_prodi', 'id_prodi');
	}

	public function list_nilai_perkuliahan_mahasiswas()
	{
		return $this->hasMany(ListNilaiPerkuliahanMahasiswa::class, 'id_prodi', 'id_prodi');
	}

	public function list_perkuliahan_mahasiswas()
	{
		return $this->hasMany(ListPerkuliahanMahasiswa::class, 'id_prodi', 'id_prodi');
	}

	public function list_skala_nilai_prodis()
	{
		return $this->hasMany(ListSkalaNilaiProdi::class, 'id_prodi', 'id_prodi');
	}

	public function mahasiswas()
	{
		return $this->hasMany(Mahasiswa::class, 'id_prodi', 'id_prodi');
	}

	public function mata_kuliahs()
	{
		return $this->hasMany(MataKuliah::class, 'id_prodi', 'id_prodi');
	}

	public function matkul_kurikulums()
	{
		return $this->hasMany(MatkulKurikulum::class, 'id_prodi', 'id_prodi');
	}

	public function nilai_transfer_pendidikan_mahasiswas()
	{
		return $this->hasMany(NilaiTransferPendidikanMahasiswa::class, 'id_prodi', 'id_prodi');
	}

	public function penugasan_dosens()
	{
		return $this->hasMany(PenugasanDosen::class, 'id_prodi', 'id_prodi');
	}

	public function penugasan_semua_dosens()
	{
		return $this->hasMany(PenugasanSemuaDosen::class, 'id_prodi', 'id_prodi');
	}

	public function periodes()
	{
		return $this->hasMany(Periode::class, 'id_prodi', 'id_prodi');
	}

	public function peserta_kelas_kuliahs()
	{
		return $this->hasMany(PesertaKelasKuliah::class, 'id_prodi', 'id_prodi');
	}

	public function rekap_jumlah_dosens()
	{
		return $this->hasMany(RekapJumlahDosen::class, 'id_prodi', 'id_prodi');
	}

	public function rekap_khs_mahasiswas()
	{
		return $this->hasMany(RekapKhsMahasiswa::class, 'id_prodi', 'id_prodi');
	}

	public function rekap_krs_mahasiswas()
	{
		return $this->hasMany(RekapKrsMahasiswa::class, 'id_prodi', 'id_prodi');
	}

	public function rencana_evaluasis()
	{
		return $this->hasMany(RencanaEvaluasi::class, 'id_prodi', 'id_prodi');
	}

	public function rencana_pembelajarans()
	{
		return $this->hasMany(RencanaPembelajaran::class, 'id_prodi', 'id_prodi');
	}

	public function riwayat_nilai_mahasiswas()
	{
		return $this->hasMany(RiwayatNilaiMahasiswa::class, 'id_prodi', 'id_prodi');
	}
}
