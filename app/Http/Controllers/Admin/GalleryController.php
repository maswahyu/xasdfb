<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryRequest;
use App\Gallery;
use App\Album;

class GalleryController extends Controller
{   
    private $title;

    function __construct()
    {
        $this->title = 'Gallery';
    }

    public function index(Request $request)
    {
        $this->title = ucfirst($request->query('type'));
        return view('_admin.gallery.index')->with('title', $this->title);
    }

    public function list(Request $request)
    {
        $type    = $request->query('type');

        $keyword = $request->get('only');
        if (!empty($keyword)) {
            $gallery = Gallery::where('type', $type)->where('title', 'LIKE', '%'.$keyword.'%')->latest()->paginate(10);
        } else {
            $gallery = Gallery::where('type', $type)->latest()->paginate(10);
        }
        
        return view('_admin.gallery.list', compact('gallery','type', 'keyword'));
    }

    public function create(Request $request)
    {   
        $this->title = ucfirst($request->query('type'));
        return view('_admin.gallery.create')->with('title', $this->title);
    }

    public function store(GalleryRequest $request)
    {   
        $validated = $request->validated();
        
        $data = Gallery::newRecord($request);

        $type = $request->get('type');
        return redirect('magic/gallery'.'?type='.$type)->with('success', 'Gallery added!');
    }

    public function edit(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);
        $this->title = ucfirst($request->query('type'));
        return view('_admin.gallery.edit', compact('gallery'))->with('title', $this->title);
    } 

    public function show(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);
        $this->title = ucfirst($request->query('type'));       
        return view('_admin.gallery.show', compact('gallery'))->with('title', $this->title);
    }

    public function update(GalleryRequest $request, $id)
    {
        $validated = $request->validated();
        
        $data = Gallery::updateRecord($request, $id);
        $type = $request->get('type');
        return redirect('magic/gallery'.'?type='.$type)->with('success', 'Gallery updated!');
    }

    public function destroy(Request $request, $id)
    {
        Gallery::destroy($id);

        if($request->ajax()){
            return array("message" => 'Gallery deleted!', "id" => $id);
        } else {
            return redirect('magic/gallery'.'?type='.$request->query('type'))->with('success', 'Gallery deleted!');
        }
    }

    public function loadAlbum()
    {
        $album = Album::where('publish', 1)->orderBy('name', 'asc')->get();
        return response()->json($album);
    }
}