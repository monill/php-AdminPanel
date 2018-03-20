<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 19 Mar 2018 14:58:26 -0300.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Blog
 * 
 * @property int $id
 * @property int $user_id
 * @property int $category_id
 * @property string $title
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $image
 * @property string $video
 * @property string $content
 * @property int $views
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\BlogCategory $blog_category
 * @property \App\Models\User $user
 *
 * @package App\Models
 */
class Blog extends Eloquent
{
	protected $casts = [
		'user_id' => 'int',
		'category_id' => 'int',
		'views' => 'int'
	];

	protected $fillable = [
		'user_id',
		'category_id',
		'title',
		'meta_title',
		'meta_keywords',
		'meta_description',
		'image',
		'video',
		'content',
		'views'
	];

	public function blog_category()
	{
		return $this->belongsTo(\App\Models\BlogCategory::class, 'category_id');
	}

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}
}
