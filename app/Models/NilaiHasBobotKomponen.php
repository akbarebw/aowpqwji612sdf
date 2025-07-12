<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class NilaiHasBobotKomponen
 * 
 * @property string $bobot_komponen_id
 * @property string $nilai_id
 * 
 * @property BobotKomponen $bobot_komponen
 * @property Nilai $nilai
 *
 * @package App\Models
 */
class NilaiHasBobotKomponen extends Model
{
	protected $table = 'nilai_has_bobot_komponen';
	public $incrementing = false;
	public $timestamps = false;

	public function bobot_komponen()
	{
		return $this->belongsTo(BobotKomponen::class);
	}

	public function nilai()
	{
		return $this->belongsTo(Nilai::class);
	}
}
