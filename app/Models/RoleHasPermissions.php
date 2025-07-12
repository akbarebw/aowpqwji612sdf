<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RoleHasPermissions
 * 
 * @property string $role_id
 * @property string $permission_id
 * 
 * @property Permissions $permissions
 * @property Roles $roles
 *
 * @package App\Models
 */
class RoleHasPermissions extends Model
{
	protected $table = 'role_has_permissions';
	public $incrementing = false;
	public $timestamps = false;

	public function permissions()
	{
		return $this->belongsTo(Permissions::class, 'permission_id');
	}

	public function roles()
	{
		return $this->belongsTo(Roles::class, 'role_id');
	}
}
