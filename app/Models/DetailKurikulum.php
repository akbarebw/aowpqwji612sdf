<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class DetailKurikulum
 *
 * @property string $id
 * @property string $nama_kurikulum
 * @property string $nama_program_studi
 * @property int $id_semester
 * @property string $semester_mulai_berlaku
 * @property int $jumlah_sks_lulus
 * @property int $jumlah_sks_wajib
 * @property int $jumlah_sks_pilihan
 * @property string $status_sync
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_kurikulum
 * @property string $id_prodi
 *
 * @property Kurikulum $kurikulum
 * @property Prodi $prodi
 * @property Semester $semester
 *
 * @package App\Models
 */
class DetailKurikulum extends Model
{
    use HasUuids;
	protected $table = 'detail_kurikulum';
	public $incrementing = false;

	protected $casts = [
		'id_semester' => 'int',
		'jumlah_sks_lulus' => 'int',
		'jumlah_sks_wajib' => 'int',
		'jumlah_sks_pilihan' => 'int'
	];

	protected $fillable = [
		'nama_kurikulum',
		'nama_program_studi',
		'id_semester',
		'semester_mulai_berlaku',
		'jumlah_sks_lulus',
		'jumlah_sks_wajib',
		'jumlah_sks_pilihan',
		'status_sync',
		'id_kurikulum',
		'id_prodi'
	];

	public function kurikulum()
	{
		return $this->belongsTo(Kurikulum::class, 'id_kurikulum', 'id_kurikulum');
	}

	public function prodi()
	{
		return $this->belongsTo(Prodi::class, 'id_prodi', 'id_prodi');
	}

	public function semester()
	{
		return $this->belongsTo(Semester::class, 'id_semester', 'id_semester');
	}
}
