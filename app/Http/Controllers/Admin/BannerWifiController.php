<?php

namespace App\Http\Controllers\Admin;

use App\BannerWifi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BannerWifiRequest;

class BannerWifiController extends Controller
{
    private $title;

    function __construct()
    {
        $this->title = 'Banner Wifi';
    }

    public function index(Request $request)
    {
        return view('_admin.banner_wifi.index')->with('title', $this->title);
    }

    public function list(Request $request)
    {
        $keyword = $request->get('only');
        if (!empty($keyword)) {
            $bannerWifi = BannerWifi::oldest()->paginate(10);
        } else {
            $bannerWifi = BannerWifi::oldest()->paginate(10);
        }

        return view('_admin.banner_wifi.list', compact('bannerWifi','keyword'));
    }

    public function create()
    {
        return view('_admin.banner_wifi.create')->with('title', $this->title);
    }

    public function store(BannerWifiRequest $request)
    {
        $validated = $request->validated();

        $data = BannerWifi::newRecord($request);

        return redirect('magic/bannerwifi')->with('success', 'Banner Wifi added!');
    }

    public function edit($id)
    {
        $bannerWifi = BannerWifi::findOrFail($id);
        return view('_admin.banner_wifi.edit', compact('bannerWifi'))->with('title', $this->title);
    }

    public function show($id)
    {
        $bannerWifi = BannerWifi::findOrFail($id);

        return view('_admin.banner_wifi.show', compact('bannerWifi'))->with('title', $this->title);
    }

    public function update(BannerWifiRequest $request, $id)
    {
        $validated = $request->validated();

        $data = BannerWifi::updateRecord($request, $id);

        return redirect('magic/bannerwifi')->with('success', 'Banner Wifi updated!');
    }

    public function destroy(Request $request, $id)
    {
        BannerWifi::destroy($id);

        if($request->ajax()){
            return array("message" => 'Banner Wifi deleted!', "id" => $id);
        } else {
            return redirect('magic/bannerwifi')->with('success', 'Banner Wifi deleted!');
        }
    }
}
