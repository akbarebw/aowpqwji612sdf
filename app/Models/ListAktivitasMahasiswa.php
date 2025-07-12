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
 * Class ListAktivitasMahasiswa
 *
 * @property string $id
 * @property int $asal_data
 * @property string $nm_asaldata
 * @property string $id_aktivitas
 * @property int $program_mbkm
 * @property string $nama_program_mbkm
 * @property int $jenis_anggota
 * @property string $nama_jenis_anggota
 * @property int $id_jenis_aktivitas
 * @property string $nama_jenis_aktivitas
 * @property string $nama_prodi
 * @property int $id_semester
 * @property string $nama_semester
 * @property string $judul
 * @property string|null $keterangan
 * @property string|null $lokasi
 * @property string|null $sk_tugas
 * @property string|null $sumber_data
 * @property Carbon|null $tanggal_sk_tugas
 * @property Carbon|null $tanggal_mulai
 * @property Carbon|null $tanggal_selesai
 * @property int $untuk_kampus_merdeka
 * @property string $status_sync
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_prodi
 *
 * @property Prodi $prodi
 * @property Semester $semester
 * @property Collection|MahasiswaBimbinganDosen[] $mahasiswa_bimbingan_dosens
 *
 * @package App\Models
 */
class ListAktivitasMahasiswa extends Model
{
    use HasUuids;
	protected $table = 'list_aktivitas_mahasiswa';
	public $incrementing = false;

	protected $casts = [
		'asal_data' => 'int',
		'program_mbkm' => 'int',
		'jenis_anggota' => 'int',
		'id_jenis_aktivitas' => 'int',
		'id_semester' => 'int',
		'tanggal_sk_tugas' => 'datetime',
		'tanggal_mulai' => 'datetime',
		'tanggal_selesai' => 'datetime',
		'untuk_kampus_merdeka' => 'int'
	];

	protected $fillable = [
		'asal_data',
		'nm_asaldata',
		'id_aktivitas',
		'program_mbkm',
		'nama_program_mbkm',
		'jenis_anggota',
		'nama_jenis_anggota',
		'id_jenis_aktivitas',
		'nama_jenis_aktivitas',
		'nama_prodi',
		'id_semester',
		'nama_semester',
		'judul',
		'keterangan',
		'lokasi',
		'sk_tugas',
		'sumber_data',
		'tanggal_sk_tugas',
		'tanggal_mulai',
		'tanggal_selesai',
		'untuk_kampus_merdeka',
		'status_sync',
		'id_prodi'
	];

	public function prodi()
	{
		return $this->belongsTo(Prodi::class, 'id_prodi', 'id_prodi');
	}

	public function semester()
	{
		return $this->belongsTo(Semester::class, 'id_semester', 'id_semester');
	}

	public function mahasiswa_bimbingan_dosens()
	{
		return $this->hasMany(MahasiswaBimbinganDosen::class, 'id_aktivitas', 'id_aktivitas');
	}
}
