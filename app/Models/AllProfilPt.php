<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class AllProfilPt
 *
 * @property string $id
 * @property string $id_perguruan_tinggi
 * @property string $kode_perguruan_tinggi
 * @property string $nama_perguruan_tinggi
 * @property string|null $nama_singkat
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class AllProfilPt extends Model
{
    use HasUuids;
	protected $table = 'all_profil_pt';
	public $incrementing = false;

	protected $fillable = [
		'id_perguruan_tinggi',
		'kode_perguruan_tinggi',
		'nama_perguruan_tinggi',
		'nama_singkat'
	];
}
