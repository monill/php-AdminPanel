<?php

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Visitor
 * 
 * @property int $id
 * @property string $ip
 * @property string $country
 * @property string $city
 * @property string $estate
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
    protected $table = 'visitors';

    protected $casts = [
		'has_returned' => 'bool',
		'access' => 'int'
	];

	protected $fillable = [
		'ip',
		'country',
		'city',
		'estate',
		'os_system',
		'browser',
		'has_returned',
		'access'
	];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
