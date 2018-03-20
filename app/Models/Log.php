<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 19 Mar 2018 14:58:26 -0300.
 */

namespace App\Models;

use App\BrowserDetection;
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

	public static function newLog($content)
    {
        $broser = new BrowserDetection();

        return Log::create([
            'content' => $content,
            'ip' => getIP(),
            'browser' => $broser->getName(),
            'os_system' => $broser->getPlatformVersion()
        ]);
    }
}
