<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class KomponenHasPengaturan
 * 
 * @property string $komponen_id
 * @property string $pengaturan_id
 * 
 * @property Komponen $komponen
 * @property PengaturanKomponen $pengaturan_komponen
 *
 * @package App\Models
 */
class KomponenHasPengaturan extends Model
{
	protected $table = 'komponen_has_pengaturan';
	public $incrementing = false;
	public $timestamps = false;

	public function komponen()
	{
		return $this->belongsTo(Komponen::class);
	}

	public function pengaturan_komponen()
	{
		return $this->belongsTo(PengaturanKomponen::class, 'pengaturan_id');
	}
}
