<?php

/**
 * Created by Reliese Model.
 * Date: Fri, 09 Mar 2018 12:39:52 -0300.
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
 * @property int $returns
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @package App\Models
 */
class Visitor extends Eloquent
{
	protected $casts = [
		'has_returned' => 'bool',
		'returns' => 'int'
	];

	protected $fillable = [
		'ip',
		'country',
		'os_system',
		'browser',
		'has_returned',
		'returns'
	];
}
