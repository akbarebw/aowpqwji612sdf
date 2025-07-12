<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class StatusKepegawaian
 *
 * @property string $id
 * @property int $id_status_pegawai
 * @property string $nama_status_pegawai
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class StatusKepegawaian extends Model
{
    use HasUuids;
	protected $table = 'status_kepegawaian';
	public $incrementing = false;

	protected $casts = [
		'id_status_pegawai' => 'int'
	];

	protected $fillable = [
		'id_status_pegawai',
		'nama_status_pegawai'
	];
}
