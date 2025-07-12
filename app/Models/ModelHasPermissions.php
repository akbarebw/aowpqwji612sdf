<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ModelHasPermissions
 *
 * @property string $permission_id
 * @property string $model_type
 * @property string $model_id
 *
 * @property Permissions $permissions
 *
 * @package App\Models
 */
class ModelHasPermissions extends Model
{
	protected $table = 'model_has_permissions';
	public $incrementing = false;
	public $timestamps = false;

	public function permissions()
	{
		return $this->belongsTo(Permissions::class, 'permission_id');
	}
}
