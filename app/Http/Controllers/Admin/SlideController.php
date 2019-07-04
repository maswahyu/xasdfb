<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SlideRequest;
use App\Slide;

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