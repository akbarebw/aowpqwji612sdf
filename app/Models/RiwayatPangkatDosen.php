<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

/**
 * Class RiwayatPangkatDosen
 *
 * @property string $id
 * @property string|null $nidn
 * @property string $nama_dosen
 * @property int $id_pangkat_golongan
 * @property string $nama_pangkat_golongan
 * @property string $sk_pangkat
 * @property Carbon $tanggal_sk_pangkat
 * @property Carbon $mulai_sk_pangkat
 * @property int $masa_kerja_dalam_tahun
 * @property int $masa_kerja_dalam_bulan
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $id_dosen
 *
 * @property Dosen $dosen
 * @property PangkatGolongan $pangkat_golongan
 *
 * @package App\Models
 */
class RiwayatPangkatDosen extends Model
{
    use HasUuids;
	protected $table = 'riwayat_pangkat_dosen';
	public $incrementing = false;

	protected $casts = [
		'id_pangkat_golongan' => 'int',
		'tanggal_sk_pangkat' => 'datetime',
		'mulai_sk_pangkat' => 'datetime',
		'masa_kerja_dalam_tahun' => 'int',
		'masa_kerja_dalam_bulan' => 'int'
	];

	protected $fillable = [
		'nidn',
		'nama_dosen',
		'id_pangkat_golongan',
		'nama_pangkat_golongan',
		'sk_pangkat',
		'tanggal_sk_pangkat',
		'mulai_sk_pangkat',
		'masa_kerja_dalam_tahun',
		'masa_kerja_dalam_bulan',
		'id_dosen'
	];

	public function dosen()
	{
		return $this->belongsTo(Dosen::class, 'id_dosen', 'id_dosen');
	}

	public function pangkat_golongan()
	{
		return $this->belongsTo(PangkatGolongan::class, 'id_pangkat_golongan', 'id_pangkat_golongan');
	}
}
