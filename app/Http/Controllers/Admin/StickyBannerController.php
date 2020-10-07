<?php

namespace App\Http\Controllers\Admin;

use App\StickyBanner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StickyBannerRequest;

class StickyBannerController extends Controller
{
    private $title;

    function __construct()
    {
        $this->title = 'Sticky Banner';
    }

    public function index(Request $request)
    {
        StickyBanner::getConstanta('PAGE');
        return view('_admin.sticky_banner.index')->with('title', $this->title);
    }

    public function list(Request $request)
    {
        $keyword = $request->get('only');
        if (!empty($keyword)) {
            $stickyBanner = StickyBanner::oldest()->paginate(10);
        } else {
            $stickyBanner = StickyBanner::oldest()->paginate(10);
        }
        return view('_admin.sticky_banner.list', compact('stickyBanner','keyword'));
    }

    public function create()
    {
        return view('_admin.sticky_banner.create')->with('title', $this->title);
    }

    public function store(StickyBannerRequest $request)
    {
        $validated = $request->validated();

        $data = StickyBanner::newRecord($request);

        return redirect('magic/stickybanner')->with('success', 'Sticky Banner added!');
    }

    public function edit($id)
    {
        $stickyBanner = StickyBanner::findOrFail($id);
        return view('_admin.sticky_banner.edit', compact('stickyBanner'))->with('title', $this->title);
    }

    public function show($id)
    {
        $stickyBanner = StickyBanner::findOrFail($id);

        return view('_admin.sticky_banner.show', compact('stickyBanner'))->with('title', $this->title);
    }

    public function update(StickyBannerRequest $request, $id)
    {
        $validated = $request->validated();

        $data = StickyBanner::updateRecord($request, $id);

        return redirect('magic/stickybanner')->with('success', 'Sticky Banner updated!');
    }

    public function destroy(Request $request, $id)
    {
        StickyBanner::destroy($id);

        if($request->ajax()){
            return array("message" => 'Sticky Banner deleted!', "id" => $id);
        } else {
            return redirect('magic/stickybanner')->with('success', 'Sticky Banner deleted!');
        }
    }

    public function copy(Request $request)
    {
        $stickyBanner = StickyBanner::find($request->post('stickyBanner'));
        if($stickyBanner->copyRecord()) {
            $request->session()->put('success', 'Sticky Banner <strong>' . $stickyBanner->name .'</strong> copied');
            return \response()->json(['status' => 1]);
        }
        $request->session()->put('success', 'Failed copy Sticky Banner Sticky Banner <strong>' . $stickyBanner->name .'</strong>');
        return \response()->json(['status' => 0]);
    }
}
