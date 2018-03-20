<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 19 Mar 2018 14:58:26 -0300.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $avatar
 * @property string $description
 * @property string $class
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $blogs
 * @property \Illuminate\Database\Eloquent\Collection $roles
 *
 * @package App\Models
 */
class User extends Eloquent
{
	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'password',
		'avatar',
		'description',
		'class',
		'remember_token'
	];

	public function blogs()
	{
		return $this->hasMany(\App\Models\Blog::class);
	}

	public function roles()
	{
		return $this->belongsToMany(\App\Models\Role::class);
	}
}
