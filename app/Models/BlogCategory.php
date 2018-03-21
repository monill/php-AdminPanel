<?php

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
    protected $table = 'blog_categories';

	protected $fillable = [
		'name'
	];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

	public function blogs()
	{
		return $this->hasMany(\App\Models\Blog::class, 'category_id');
	}
}
