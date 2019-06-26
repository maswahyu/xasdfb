<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Tag;

class TagController extends Controller
{   
    private $title;

    function __construct()
    {
        $this->title = 'Tag';
    }

    public function index(Request $request)
    {   
        return view('_admin.tag.index')->with('title', $this->title);
    }

    public function list(Request $request)
    {   
        $keyword = $request->get('only');
        if (!empty($keyword)) {
            $tag = Tag::latest()->paginate(10);
        } else {
            $tag = Tag::latest()->paginate(10);
        }
        
        return view('_admin.tag.list', compact('tag','keyword'));
    }

    public function create()
    {
        return view('_admin.tag.create')->with('title', $this->title);
    }

    public function store(TagRequest $request)
    {   
        $validated = $request->validated();
        
        $data = Tag::newRecord($request);

        return redirect('magic/tag')->with('success', 'Tag added!');
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('_admin.tag.edit', compact('tag'))->with('title', $this->title);
    } 

    public function show($id)
    {
        $tag = Tag::findOrFail($id);
                
        return view('_admin.tag.show', compact('tag'))->with('title', $this->title);
    }

    public function update(TagRequest $request, $id)
    {
        $validated = $request->validated();
        
        $data = Tag::updateRecord($request, $id);
        
        return redirect('magic/tag')->with('success', 'Tag updated!');
    }

    public function destroy(Request $request, $id)
    {
        Tag::destroy($id);

        if($request->ajax()){
            return array("message" => 'Tag deleted!', "id" => $id);
        } else {
            return redirect('magic/tag')->with('success', 'Tag deleted!');
        }
    }
}