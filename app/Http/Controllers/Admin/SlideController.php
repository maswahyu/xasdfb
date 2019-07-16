<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SlideRequest;
use App\Slide;
use App\Http\Resources\Admin\SliderCollection;

class SlideController extends Controller
{
    private $title;

    function __construct()
    {
        $this->title = 'Slide';
    }

    public function index(Request $request)
    {
        return view('_admin.slide.index')->with('title', $this->title);
    }

    public function listAjax(Request $request)
    {
        if($request->has('paging_limit')) {
            $paging_limit = intval($request->get('paging_limit'));
            if($paging_limit <= 0) {
                $paging_limit = 25;
            }
        }
        else {
            $paging_limit = 25;
        }
        if($request->has('page_number')) {
            $page_number = intval($request->get('page_number'));
            if($page_number <= 1) {
                $page_number = 1;
            }
        }
        else {
            $page_number = 1;
        }
        // $skip = $page_number * $paging_limit;
        if($request->has('orderby')) {
            $orderby = $request->get('orderby');
        }
        else {
            $orderby = '';
        }
        if($request->has('order')) {
            $order = $request->get('order');
        }
        else {
            $order = 'asc';
        }

        $posts = Slide::getPage($page_number, $paging_limit, $orderby, $order);

        return response()->json(new SliderCollection($posts));
    }

    public function list(Request $request)
    {
        $keyword = $request->get('only');
        if (!empty($keyword)) {
            $slide = Slide::where('title', 'LIKE', '%'.$keyword.'%')->latest()->paginate(10);
        } else {
            $slide = Slide::latest()->paginate(10);
        }

        return view('_admin.slide.list', compact('slide','keyword'));
    }

    public function create()
    {
        return view('_admin.slide.create')->with('title', $this->title);
    }

    public function store(SlideRequest $request)
    {
        $validated = $request->validated();

        $data = Slide::newRecord($request);

        return redirect('magic/slide')->with('success', 'Slide added!');
    }

    public function edit($id)
    {
        $slide = Slide::findOrFail($id);
        return view('_admin.slide.edit', compact('slide'))->with('title', $this->title);
    }

    public function show($id)
    {
        $slide = Slide::findOrFail($id);

        return view('_admin.slide.show', compact('slide'))->with('title', $this->title);
    }

    public function update(SlideRequest $request, $id)
    {
        $validated = $request->validated();

        $data = Slide::updateRecord($request, $id);

        return redirect('magic/slide')->with('success', 'Slide updated!');
    }

    public function destroy(Request $request, $id)
    {
        Slide::destroy($id);

        if($request->ajax()){
            return array("message" => 'Slide deleted!', "id" => $id);
        } else {
            return redirect('magic/slide')->with('success', 'Slide deleted!');
        }
    }
}