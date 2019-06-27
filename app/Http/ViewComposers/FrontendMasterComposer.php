<?php

namespace App\Http\ViewComposers;
use App\Setting;
use Illuminate\Contracts\View\View;
use Auth;
use App\City;

class FrontendMasterComposer
{
    public function compose(View $view)
    {
        //get site meta values
        $metas = Setting::getSiteMetas();

        $siteInfo = [
            'site_name' => isset($metas['site_name']) ? $metas['site_name'] : '',
            'site_meta_title' => isset($metas['site_meta_title']) ? $metas['site_meta_title'] : '',
            'site_meta_description' => isset($metas['site_meta_description']) ? $metas['site_meta_description'] : '',
            'site_meta_keyword' => isset($metas['site_meta_keyword']) ? $metas['site_meta_keyword'] : '',
            'analytics_id' => isset($metas['analytics_id']) ? $metas['analytics_id'] : '',
            'fb_id' => isset($metas['fb_id']) ? $metas['fb_id'] : '',
            'headercode' => isset($metas['headercode']) ? $metas['headercode'] : '',
            'footercode' => isset($metas['footercode']) ? $metas['footercode'] : '',
            'bodycode' => isset($metas['bodycode']) ? $metas['bodycode'] : '',
            'contact_copyright' => isset($metas['contact_copyright']) ? $metas['contact_copyright'] : '',
            'contact_we_work' => isset($metas['contact_we_work']) ? $metas['contact_we_work'] : '',
            'contact_office' => isset($metas['contact_office']) ? $metas['contact_office'] : '',
            'contact_whatsapp' => isset($metas['contact_whatsapp']) ? $metas['contact_whatsapp'] : '',
            'contact_fax' => isset($metas['contact_fax']) ? $metas['contact_fax'] : '',
            'contact_maps_url' => isset($metas['contact_maps_url']) ? $metas['contact_maps_url'] : '',
            'contact_email_info' => isset($metas['contact_email_info']) ? $metas['contact_email_info'] : '',
            'contact_address' => isset($metas['contact_address']) ? $metas['contact_address'] : '',
            'contact_facebook' => isset($metas['contact_facebook']) ? $metas['contact_facebook'] : '',
            'contact_twitter' => isset($metas['contact_twitter']) ? $metas['contact_twitter'] : '',
            'contact_youtube' => isset($metas['contact_youtube']) ? $metas['contact_youtube'] : '',
            'contact_linkedin' => isset($metas['contact_linkedin']) ? $metas['contact_linkedin'] : '',
        ];
        $view->with('siteInfo', $siteInfo);
    }
}