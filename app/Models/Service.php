<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 09 Mar 2018 12:39:52 -0300.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Service
 * 
 * @property int $id
 * @property string $title
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $image
 * @property string $content
 * @property int $views
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Service extends Eloquent
{
	protected $casts = [
		'views' => 'int'
	];

	protected $fillable = [
		'title',
		'meta_title',
		'meta_keywords',
		'meta_description',
		'image',
		'content',
		'views'
	];
}
