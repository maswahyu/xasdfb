<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\News;
use Auth;
use App\Category;

class NewsController extends Controller
{   
    private $title;

    function __construct()
    {
        $this->title = 'News';
    }

    public function index(Request $request)
    {   
        return view('_admin.news.index')->with('title', $this->title);
    }

    public function list(Request $request)
    {   
        $type    = News::NEWS;
        $keyword = $request->get('only');

        if (!empty($keyword)) {
            $news = News::where('title', 'LIKE', '%'.$keyword.'%')->latest()->paginate(10);
        } else {
            $news = News::latest()->paginate(10);
        }

        return view('_admin.news.list', compact('news', 'type','keyword'));
    }

    public function create(Request $request)
    {
        $category = Category::where('parent_id', 0)->get();

        return view('_admin.news.create', compact('category'))->with('title', $this->title);
    }

    public function store(NewsRequest $request)
    {   
        $validated = $request->validated();

        $data = News::newRecord($request);

        $type = $request->get('type');
        return redirect('magic/news')->with('success', 'News added!');
    }

    public function edit(Request $request, $id)
    {   
        $category = Category::all();
        $news = News::findOrFail($id); 
        return view('_admin.news.edit', compact('news','category'))->with('title', $this->title);
    } 

    public function show(Request $request, $id)
    {
        $news = News::findOrFail($id); 
        return view('_admin.news.show', compact('news'))->with('title', $this->title);
    }

    public function update(NewsRequest $request, $id)
    {
        $validated = $request->validated();

        $data= News::updateRecord($request, $id);

        $type = $request->get('type');

        return redirect('magic/news')->with('success', 'News updated!');
    }

    public function destroy(Request $request, $id)
    {
        News::destroy($id);

        if($request->ajax()){
            return array("message" => 'News deleted!', "id" => $id);
        } else {
            return redirect('magic/news')->with('success', 'News deleted!');
        }
    }
}