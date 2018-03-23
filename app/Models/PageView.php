<?php

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PageView
 * 
 * @property int $id
 * @property int $sid
 * @property int $bid
 * @property string $from_ip
 * @property string $from_os
 * @property string $from_wb
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * 
 * @property \App\Models\Blog $blog
 * @property \App\Models\Service $service
 *
 * @package App\Models
 */
class PageView extends Eloquent
{
    protected $table = 'page_views';

	protected $casts = [
		'sid' => 'int',
		'bid' => 'int'
	];

	protected $fillable = [
		'sid',
		'bid',
		'from_ip',
		'from_os',
		'from_wb'
	];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

	public function blog()
	{
		return $this->belongsTo(\App\Models\Blog::class, 'bid');
	}

	public function service()
	{
		return $this->belongsTo(\App\Models\Service::class, 'sid');
	}
}
