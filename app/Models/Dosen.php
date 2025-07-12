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
 * Class Dosen
 *
 * @property string $id
 * @property string $id_dosen
 * @property string|null $nidn
 * @property string|null $nip
 * @property string $jenis_kelamin
 * @property int $id_agama
 * @property string $nama_agama
 * @property Carbon $tanggal_lahir
 * @property int $id_status_aktif
 * @property string $nama_status_aktif
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Agama $agama
 * @property StatusKeaktifanPegawai $status_keaktifan_pegawai
 * @property Collection|AktivitasMengajarDosen[] $aktivitas_mengajar_dosens
 * @property Collection|BiodataDosen[] $biodata_dosens
 * @property Collection|DosenPembimbing[] $dosen_pembimbings
 * @property Collection|KelasKuliah[] $kelas_kuliah
 * @property Collection|MahasiswaBimbinganDosen[] $mahasiswa_bimbingan_dosens
 * @property Collection|PenugasanDosen[] $penugasan_dosens
 * @property Collection|PenugasanSemuaDosen[] $penugasan_semua_dosens
 * @property Collection|PerhitunganSks[] $perhitungan_sks
 * @property Collection|RiwayatFungsionalDosen[] $riwayat_fungsional_dosens
 * @property Collection|RiwayatPangkatDosen[] $riwayat_pangkat_dosens
 * @property Collection|RiwayatPendidikanDosen[] $riwayat_pendidikan_dosens
 * @property Collection|RiwayatPenelitianDosen[] $riwayat_penelitian_dosens
 * @property Collection|RiwayatSertifikasiDosen[] $riwayat_sertifikasi_dosens
 *
 * @package App\Models
 */
class Dosen extends Model
{
    use HasUuids;
	protected $table = 'dosen';
	public $incrementing = false;

	protected $casts = [
		'id_agama' => 'int',
		'tanggal_lahir' => 'datetime',
		'id_status_aktif' => 'int'
	];

	protected $fillable = [
		'id_dosen',
		'nidn',
		'nip',
		'jenis_kelamin',
		'id_agama',
		'nama_agama',
		'tanggal_lahir',
		'id_status_aktif',
		'nama_status_aktif'
	];

	public function agama()
	{
		return $this->belongsTo(Agama::class, 'id_agama', 'id_agama');
	}

	public function status_keaktifan_pegawai()
	{
		return $this->belongsTo(StatusKeaktifanPegawai::class, 'id_status_aktif', 'id_status_aktif');
	}

	public function aktivitas_mengajar_dosens()
	{
		return $this->hasMany(AktivitasMengajarDosen::class, 'id_dosen', 'id_dosen');
	}

	public function biodata_dosens()
	{
		return $this->hasMany(BiodataDosen::class, 'id_dosen', 'id_dosen');
	}

	public function dosen_pembimbings()
	{
		return $this->hasMany(DosenPembimbing::class, 'id_dosen', 'id_dosen');
	}

	public function kelas_kuliah()
	{
		return $this->belongsToMany(KelasKuliah::class, 'dosen_pengajar_kelas_kuliah', 'id_dosen', 'id_kelas_kuliah')
					->withPivot('id', 'id_aktivitas_mengajar', 'id_registrasi_dosen', 'nidn', 'nama_dosen', 'nama_kelas_kuliah', 'id_substansi', 'sks_substansi_total', 'rencana_minggu_pertemuan', 'realisasi_minggu_pertemuan', 'id_jenis_evaluasi', 'nama_jenis_evaluasi', 'id_semester', 'id_prodi')
					->withTimestamps();
	}

	public function mahasiswa_bimbingan_dosens()
	{
		return $this->hasMany(MahasiswaBimbinganDosen::class, 'id_dosen', 'id_dosen');
	}

	public function penugasan_dosens()
	{
		return $this->hasMany(PenugasanDosen::class, 'id_dosen', 'id_dosen');
	}

	public function penugasan_semua_dosens()
	{
		return $this->hasMany(PenugasanSemuaDosen::class, 'id_dosen', 'id_dosen');
	}

	public function perhitungan_sks()
	{
		return $this->hasMany(PerhitunganSks::class, 'id_dosen', 'id_dosen');
	}

	public function riwayat_fungsional_dosens()
	{
		return $this->hasMany(RiwayatFungsionalDosen::class, 'id_dosen', 'id_dosen');
	}

	public function riwayat_pangkat_dosens()
	{
		return $this->hasMany(RiwayatPangkatDosen::class, 'id_dosen', 'id_dosen');
	}

	public function riwayat_pendidikan_dosens()
	{
		return $this->hasMany(RiwayatPendidikanDosen::class, 'id_dosen', 'id_dosen');
	}

	public function riwayat_penelitian_dosens()
	{
		return $this->hasMany(RiwayatPenelitianDosen::class, 'id_dosen', 'id_dosen');
	}

	public function riwayat_sertifikasi_dosens()
	{
		return $this->hasMany(RiwayatSertifikasiDosen::class, 'id_dosen', 'id_dosen');
	}

	public function user(){
        return $this->belongsTo(User::class, 'users_id');
    }

	public function pengajaran()
{
	return $this->hasMany(DosenPengajarKelasKuliah::class, 'id_dosen', 'id');
}
}
