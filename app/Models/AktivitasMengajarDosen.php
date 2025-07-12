<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class AktivitasMengajarDosen
 *
 * @property string $id
 * @property string $id_registrasi_dosen
 * @property string $nama_dosen
 * @property int $id_periode
 * @property string $nama_periode
 * @property string $nama_program_studi
 * @property string $nama_mata_kuliah
 * @property string $id_kelas
 * @property string $nama_kelas_kuliah
 * @property int $rencana_minggu_pertemuan
 * @property int|null $realisasi_minggu_pertemuan
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_dosen
 * @property string $id_prodi
 * @property string $id_matkul
 *
 * @property Dosen $dosen
 * @property ListMataKuliah $list_mata_kuliah
 * @property Prodi $prodi
 *
 * @package App\Models
 */
class AktivitasMengajarDosen extends Model
{
    use HasUuids;
	protected $table = 'aktivitas_mengajar_dosen';
	public $incrementing = false;

	protected $casts = [
		'id_periode' => 'int',
		'rencana_minggu_pertemuan' => 'int',
		'realisasi_minggu_pertemuan' => 'int'
	];

	protected $fillable = [
		'id_registrasi_dosen',
		'nama_dosen',
		'id_periode',
		'nama_periode',
		'nama_program_studi',
		'nama_mata_kuliah',
		'id_kelas',
		'nama_kelas_kuliah',
		'rencana_minggu_pertemuan',
		'realisasi_minggu_pertemuan',
		'id_dosen',
		'id_prodi',
		'id_matkul'
	];

	public function dosen()
	{
		return $this->belongsTo(Dosen::class, 'id_dosen', 'id_dosen');
	}

	public function list_mata_kuliah()
	{
		return $this->belongsTo(ListMataKuliah::class, 'id_matkul', 'id_matkul');
	}

	public function prodi()
	{
		return $this->belongsTo(Prodi::class, 'id_prodi', 'id_prodi');
	}
}
