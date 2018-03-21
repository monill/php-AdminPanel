<?php

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class PageView
 * 
 * @property int $id
 * @property string $page_id
 * @property string $from_ip
 * @property string $os_system
 * @property string $browser
 * @property \Carbon\Carbon $access_on
 *
 * @package App\Models
 */
class PageView extends Eloquent
{
    protected $table = 'page_views';

	public $timestamps = false;

	protected $dates = [
		'access_on'
	];

	protected $fillable = [
		'page_id',
		'from_ip',
		'os_system',
		'browser',
		'access_on'
	];
}
