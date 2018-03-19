<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 09 Mar 2018 12:39:52 -0300.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Log
 * 
 * @property int $id
 * @property string $content
 * @property string $ip
 * @property string $browser
 * @property string $os_system
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Log extends Eloquent
{
	protected $fillable = [
		'content',
		'ip',
		'browser',
		'os_system'
	];
}
