<?php

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Setting
 * 
 * @property int $id
 * @property string $site_title
 * @property string $phone1
 * @property string $phone2
 * @property string $email1
 * @property string $email2
 * @property string $meta_title
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $address
 * @property string $city
 * @property string $estate
 * @property string $zip
 * @property float $geolat
 * @property float $geolng
 * @property string $ganalytics
 * @property string $social_facebook
 * @property string $social_twitter
 * @property string $social_pinterest
 * @property string $social_linkedin
 * @property string $social_googleplus
 * @property string $social_youtube
 * @property string $social_skype
 * @property string $social_instagram
 *
 * @package App\Models
 */
class Setting extends Eloquent
{
	public $timestamps = false;

    protected $table = 'settings';

    protected $casts = [
		'geolat' => 'float',
		'geolng' => 'float'
	];

	protected $fillable = [
		'site_title',
		'phone1',
		'phone2',
		'email1',
		'email2',
		'meta_title',
		'meta_keywords',
		'meta_description',
		'address',
		'city',
		'estate',
		'zip',
		'geolat',
		'geolng',
		'ganalytics',
		'social_facebook',
		'social_twitter',
		'social_pinterest',
		'social_linkedin',
		'social_googleplus',
		'social_youtube',
		'social_skype',
		'social_instagram'
	];

    protected $dates = [
        'created_at',
        'updated_at'
    ];
}
