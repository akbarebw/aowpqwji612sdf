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
class PengajuanStrukturalPegawai extends Model
{
    use HasUuids;
	public $incrementing = false;

	protected $guarded = [];

    public function createdBy(){
        return $this->belongsTo(User::class, 'created_by');
    }

    public function decidedBy(){
        return $this->belongsTo(User::class, 'decided_by');
    }

    public function jabatanSebelumnya(){
        return $this->belongsTo(JabatanStruktural::class, 'jabatan_sebelumnya');
    }

    public function jabatanDiajukan(){
        return $this->belongsTo(JabatanStruktural::class, 'jabatan_diajukan');
    }
}
