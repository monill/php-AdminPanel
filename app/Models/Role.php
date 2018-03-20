<?php

namespace App\Models;

use Zizaco\Entrust\EntrustRole;

/**
 * Class Role
 * 
 * @property int $id
 * @property string $name
 * @property string $display_name
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $permissions
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package App\Models
 */
class Role extends EntrustRole
{
	protected $fillable = [
		'name',
		'display_name',
		'description'
	];

	public function permissions()
	{
		return $this->belongsToMany(\App\Models\Permission::class);
	}

	public function users()
	{
		return $this->belongsToMany(\App\Models\User::class);
	}
}
