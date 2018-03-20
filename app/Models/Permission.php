<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 19 Mar 2018 14:58:26 -0300.
 */

namespace App\Models;

use Zizaco\Entrust\EntrustPermission;

/**
 * Class Permission
 * 
 * @property int $id
 * @property string $name
 * @property string $display_name
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $roles
 *
 * @package App\Models
 */
class Permission extends EntrustPermission
{
	protected $fillable = [
		'name',
		'display_name',
		'description'
	];

	public function roles()
	{
		return $this->belongsToMany(\App\Models\Role::class);
	}
}
