<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use Cache;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        return view('_admin.pages.setting');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = array(
            'site_name'             => $request->get('site_name'), 
            'site_email'            => $request->get('site_email'),
            'site_meta_title'       => $request->get('site_meta_title'),
            'site_meta_description' => $request->get('site_meta_description'),
            'site_name_keyword'     => $request->get('site_name_keyword'),
            'analytics_id'          => $request->get('analytics_id'),
            'fb_id'                 => $request->get('fb_id'),
            'headercode'            => $request->get('headercode'),
            'footercode'            => $request->get('footercode'),
            'bodycode'              => $request->get('bodycode'),
        );

        $value = Cache::forget('site_metas');

        foreach ($data as $key => $value) {
            
            Setting::where('key', $key)->update([
                'value' => $value,
            ]);
        }

        return redirect()->route('site.settings')->with('success', 'Setting updated!');
    }


    public function termpolicy()
    {   
        return view('_admin.pages.tp')->with('title', 'Terms & Policy');
    }

    public function updatetp(Request $request)
    {
        $data = array(
            'terms_title' => $request->get('terms_title'), 
            'terms_content' => $request->get('terms_content'),
            'policy_title' => $request->get('policy_title'),
            'policy_content' => $request->get('policy_content')
        );

        $value = Cache::forget('site_metas');
        foreach ($data as $key => $value) {
            
            Setting::where('key', $key)->update([
                'value' => $value,
            ]);
        }

        return redirect()->route('site.terms_policy')->with('success', 'Terms & Policy Successfully Updated');
    }

    public function contactShowForm()
    {   
        return view('_admin.pages.contact_detail');
    }

    public function updateContact(Request $request)
    {
        $data = array(
            'info' => $request->get('info'), 
            'address' => $request->get('address'),
            'gmaps_url' => $request->get('gmaps_url'),
            'phone' => $request->get('phone'),
            'whatsapp' => $request->get('whatsapp'),
            'sales_email' => $request->get('sales_email'),
            'info_email' => $request->get('info_email'),
            'working' => $request->get('working'),
        );

        $value = Cache::forget('site_metas');

        foreach ($data as $key => $value) {
            
            Setting::where('key', $key)->update([
                'value' => $value,
            ]);
        }

        return redirect()->route('site.contact')->with('success', 'Contact Detail Successfully Updated');
    }

    public function about()
    {   
        return view('_admin.pages.about');
    }

    public function updateabout(Request $request)
    {
        $data = array(
            'about_title' => $request->get('about_title'), 
            'about_content' => $request->get('about_content')
        );

        $value = Cache::forget('site_metas');
        
        foreach ($data as $key => $value) {
            
            Setting::where('key', $key)->update([
                'value' => $value,
            ]);
        }

         \Session::flash('success.message', 'About Data Successfully Updated');
        return redirect('magic/homepage/about');
    }

    public function filemanager()
    {   
        return view('_admin.pages.filemanager');
    }

    public function all(Request $request)
    {
        $data = [];
        $settings = Setting::where('status', Setting::STATUS_ACTIVE)
            ->orderBy('sort_group', 'asc')
            ->orderBy('section', 'asc')
            ->orderBy('sort', 'asc')
            ->get();

        foreach ($settings as $i => $setting) {
            $data[$setting->group][$setting->section][] = $setting;
        }

        return view('_admin.settings.all', compact('data'))->with('title', 'All Setting');
    }

    public function save(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            $model = Setting::where('key', $key)->first();

            if (!$model) {
                continue;
            }

            $model->value = is_array($value) ? serialize($value) : $value;
            $model->save();
        }

        Cache::flush();   
        return redirect('/site/website')->with('success', 'Settings updated!');
    }

    public function flushCache(Request $request)
    {
        Cache::flush(); 
        return redirect('/site/website')->with('success', 'Cache cleared!');
    }
}
