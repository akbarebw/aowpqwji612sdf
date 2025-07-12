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
 * Class Kurikulum
 * 
 * @property string $id
 * @property string $id_kurikulum
 * @property string $nama_kurikulum
 * @property string $nama_program_studi
 * @property int $id_semester
 * @property string $semester_mulai_berlaku
 * @property int $jumlah_sks_lulus
 * @property int $jumlah_sks_wajib
 * @property int $jumlah_sks_pilihan
 * @property int|null $jumlah_sks_mata_kuliah_wajib
 * @property int|null $jumlah_sks_mata_kuliah_pilihan
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_prodi
 * 
 * @property Prodi $prodi
 * @property Semester $semester
 * @property Collection|DetailKurikulum[] $detail_kurikulums
 * @property Collection|MatkulKurikulum[] $matkul_kurikulums
 *
 * @package App\Models
 */
class Kurikulum extends Model
{
	Use HasUuids;
	protected $table = 'kurikulum';
	public $incrementing = false;

	protected $casts = [
		'id_semester' => 'int',
		'jumlah_sks_lulus' => 'int',
		'jumlah_sks_wajib' => 'int',
		'jumlah_sks_pilihan' => 'int',
		'jumlah_sks_mata_kuliah_wajib' => 'int',
		'jumlah_sks_mata_kuliah_pilihan' => 'int'
	];

	protected $fillable = [
		'id_kurikulum',
		'nama_kurikulum',
		'nama_program_studi',
		'id_semester',
		'semester_mulai_berlaku',
		'jumlah_sks_lulus',
		'jumlah_sks_wajib',
		'jumlah_sks_pilihan',
		'jumlah_sks_mata_kuliah_wajib',
		'jumlah_sks_mata_kuliah_pilihan',
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

	public function detail_kurikulums()
	{
		return $this->hasMany(DetailKurikulum::class, 'id_kurikulum', 'id_kurikulum');
	}

	public function matkul_kurikulums()
	{
		return $this->hasMany(MatkulKurikulum::class, 'id_kurikulum', 'id_kurikulum');
	}
}
