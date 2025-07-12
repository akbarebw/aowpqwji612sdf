<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ModelHasRoles
 * 
 * @property string $role_id
 * @property string $model_type
 * @property string $model_id
 * 
 * @property Roles $roles
 *
 * @package App\Models
 */
class ModelHasRoles extends Model
{
	protected $table = 'model_has_roles';
	public $incrementing = false;
	public $timestamps = false;

	public function roles()
	{
		return $this->belongsTo(Roles::class, 'role_id');
	}
}
