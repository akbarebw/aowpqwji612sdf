<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class PengajuanFungsionalDosen extends Model
{
    use HasUuids;

	protected $guarded = [];

    public function createdBy(){
        return $this->belongsTo(User::class, 'created_by');
    }

    public function decidedBy(){
        return $this->belongsTo(User::class, 'decided_by');
    }
}
