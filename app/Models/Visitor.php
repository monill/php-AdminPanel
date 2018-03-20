<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 19 Mar 2018 14:58:26 -0300.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Visitor
 * 
 * @property int $id
 * @property string $ip
 * @property string $country
 * @property string $os_system
 * @property string $browser
 * @property bool $has_returned
 * @property int $access
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Visitor extends Eloquent
{
	protected $casts = [
		'has_returned' => 'bool',
		'access' => 'int'
	];

	protected $fillable = [
		'ip',
		'country',
		'os_system',
		'browser',
		'has_returned',
		'access'
	];
}
