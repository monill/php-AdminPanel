<?php

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
    protected $table = 'permissions';

	protected $fillable = [
		'name',
		'display_name',
		'description'
	];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

	public function roles()
	{
		return $this->belongsToMany(\App\Models\Role::class);
	}
}
