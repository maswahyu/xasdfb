<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LinkRequest;
use App\Link;

class LinkController extends Controller
{   
    private $title;

    function __construct()
    {
        $this->title = 'Link';
    }

    public function index(Request $request)
    {   
        return view('_admin.link.index')->with('title', $this->title);
    }

    public function list(Request $request)
    {   
        $keyword = $request->get('only');
        if (!empty($keyword)) {
            $link = Link::where('name', 'LIKE', '%'.$keyword.'%')->latest()->paginate(10);
        } else {
            $link = Link::latest()->paginate(10);
        }
        
        return view('_admin.link.list', compact('link','keyword'));
    }

    public function create()
    {
        return view('_admin.link.create')->with('title', $this->title);
    }

    public function store(LinkRequest $request)
    {   
        $validated = $request->validated();
        
        $data = Link::newRecord($request);

        return redirect('magic/link')->with('success', 'Link added!');
    }

    public function edit($id)
    {
        $link = Link::findOrFail($id);
        return view('_admin.link.edit', compact('link'))->with('title', $this->title);
    } 

    public function show($id)
    {
        $link = Link::findOrFail($id);
                
        return view('_admin.link.show', compact('link'))->with('title', $this->title);
    }

    public function update(LinkRequest $request, $id)
    {
        $validated = $request->validated();
        
        $data = Link::updateRecord($request, $id);
        
        return redirect('magic/link')->with('success', 'Link updated!');
    }

    public function destroy(Request $request, $id)
    {
        Link::destroy($id);

        if($request->ajax()){
            return array("message" => 'Link deleted!', "id" => $id);
        } else {
            return redirect('magic/link')->with('success', 'Link deleted!');
        }
    }
}