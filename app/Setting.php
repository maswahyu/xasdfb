<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cache;

class Setting extends Model
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

	const TYPE_TEXTINPUT      = 'textinput'; /* done */
	const TYPE_TEXTAREA       = 'textarea'; /* done */
	const TYPE_TEXTINPUT_I18N = 'textinput-i18n'; /* done */
	const TYPE_TEXTAREA_I18N  = 'textarea-i18n'; /* done */
	const TYPE_DROPDOWN       = 'dropdown';
	const TYPE_SELECT2        = 'select2';
	const TYPE_SELECT2MULTI   = 'select2-multi'; /* done */
	const TYPE_FILE           = 'file';
	const TYPE_IMAGE          = 'image'; /* done */
	const TYPE_CHECKBOX       = 'checkbox';
	const TYPE_CHECKSWITCH    = 'checkswitch'; /* done */
	const TYPE_RADIO          = 'radio';
	const TYPE_RADIOSWITCH    = 'radioswitch';

	const SORT_ALL_PAGES = 1;
    const SORT_HOME = 2;
    const SORT_PROJECT = 3;
    const SORT_ABOUT_US = 4;
    const SORT_CONTACT_US = 5;
    const SORT_NEWS = 6;
    const SORT_MYPOINT = 7;

    public $timestamps = false;

    public function getStatus()
    {
        switch ($this->status) {
            case self::STATUS_ACTIVE:
                $label = '<span class="fa fa-check-circle"></span>';
                $state = 'success';
                break;

            case self::STATUS_INACTIVE:
                $label = '<span class="fa fa-minus-circle"></span>';
                $state = 'danger';
                break;
        }

        return sprintf('<p class="text-center text-%s">%s</p>', $state, $label);
    }

    public static function find_key($key)
    {
    	return Setting::where('key', $key)->first()->value;
    }

    public static function getSiteMetas(){
        $siteMetas = null;
        if (Cache::has('site_metas')) {
            $siteMetas = Cache::get('site_metas');
        }
        else{

            $settings = Setting::all();

            $metas = [];
            foreach ($settings as $setting){
                $metas[$setting->key] = $setting->value;
            }
            $siteMetas = $metas;
            Cache::forever('site_metas', $metas);

        }

        return $siteMetas;
    }

    public static function getConfig($key)
    {
        $metas = self::getSiteMetas();
        return isset($metas[$key]) ? $metas[$key] : '';
    }
}
