<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 19 Mar 2018 14:58:26 -0300.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class BlogCategory
 * 
 * @property int $id
 * @property string $name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \Illuminate\Database\Eloquent\Collection $blogs
 *
 * @package App\Models
 */
class BlogCategory extends Eloquent
{
	protected $fillable = [
		'name'
	];

	public function blogs()
	{
		return $this->hasMany(\App\Models\Blog::class, 'category_id');
	}
}
