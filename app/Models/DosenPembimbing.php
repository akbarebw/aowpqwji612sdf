<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class DosenPembimbing
 *
 * @property string $id
 * @property string $id_registrasi_mahasiswa
 * @property string $nama_mahasiswa
 * @property string $nim
 * @property int|null $nidn
 * @property string $nama_dosen
 * @property int $pembimbing_ke
 * @property string $jenis_aktivitas
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_dosen
 *
 * @property Dosen $dosen
 *
 * @package App\Models
 */
class DosenPembimbing extends Model
{
    use HasUuids;
	protected $table = 'dosen_pembimbing';
	public $incrementing = false;

	protected $casts = [
		'nidn' => 'int',
		'pembimbing_ke' => 'int'
	];

	protected $fillable = [
		'id_registrasi_mahasiswa',
		'nama_mahasiswa',
		'nim',
		'nidn',
		'nama_dosen',
		'pembimbing_ke',
		'jenis_aktivitas',
		'id_dosen'
	];

	public function dosen()
	{
		return $this->belongsTo(Dosen::class, 'id_dosen', 'id_dosen');
	}
}
