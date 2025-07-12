<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class PegawaiJabatanStruktural
 *
 * @property string $id
 * @property string $status
 * @property Carbon|null $mulai_menjabat
 * @property Carbon|null $selesai_menjabat
 * @property bool $is_aktif
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class PegawaiJabatanStruktural extends Model
{
    use HasUuids;
	protected $table = 'pegawai_jabatan_struktural';
	public $incrementing = false;

	protected $casts = [
		'mulai_menjabat' => 'datetime',
		'selesai_menjabat' => 'datetime',
		'is_aktif' => 'bool'
	];

	protected $fillable = [
        'jabatan_struktural_id',
        'pegawai_id',
        'status',
        'mulai_menjabat',
        'selesai_menjabat',
        'is_aktif',
	];
}
