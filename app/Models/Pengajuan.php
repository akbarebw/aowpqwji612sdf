<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class Pengajuan
 *
 * @property string $id
 * @property string|null $sk_pangkat_terakhir
 * @property string|null $sk_pns
 * @property string|null $dp3_skp
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Pengajuan extends Model
{
    use HasUuids;
	protected $table = 'pengajuan';
	public $incrementing = false;

	protected $fillable = [
		'sk_pangkat_terakhir',
		'sk_pns',
		'dp3_skp'
	];
}
