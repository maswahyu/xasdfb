<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AlbumRequest;
use App\Album;

class AlbumController extends Controller
{   
    private $title;

    function __construct()
    {
        $this->title = 'Album';
    }

    public function index(Request $request)
    {   
        return view('_admin.album.index')->with('title', $this->title);
    }

    public function list(Request $request)
    {   
        $keyword = $request->get('only');
        if (!empty($keyword)) {
            $album = Album::where('name', 'LIKE', '%'.$keyword.'%')->latest()->paginate(10);
        } else {
            $album = Album::latest()->paginate(10);
        }
        
        return view('_admin.album.list', compact('album','keyword'));
    }

    public function create()
    {
        return view('_admin.album.create')->with('title', $this->title);
    }

    public function store(AlbumRequest $request)
    {   
        $validated = $request->validated();
        
        $data = Album::newRecord($request);

        return redirect('magic/album')->with('success', 'Album added!');
    }

    public function edit($id)
    {
        $album = Album::findOrFail($id);
        return view('_admin.album.edit', compact('album'))->with('title', $this->title);
    } 

    public function show($id)
    {
        $album = Album::findOrFail($id);
                
        return view('_admin.album.show', compact('album'))->with('title', $this->title);
    }

    public function update(AlbumRequest $request, $id)
    {
        $validated = $request->validated();
        
        $data = Album::updateRecord($request, $id);
        
        return redirect('magic/album')->with('success', 'Album updated!');
    }

    public function destroy(Request $request, $id)
    {
        Album::destroy($id);

        if($request->ajax()){
            return array("message" => 'Album deleted!', "id" => $id);
        } else {
            return redirect('magic/album')->with('success', 'Album deleted!');
        }
    }
}