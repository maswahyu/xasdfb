<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Jobs\NewsScheduler;
use App\News;
use App\Tag;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

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
        $keyword = $request->get('only');

        if (!empty($keyword)) {
            $news = News::where('title', 'LIKE', '%'.$keyword.'%')->latest()->paginate(10);
        } else {
            $news = News::latest()->paginate(10);
        }

        return view('_admin.news.list', compact('news','keyword'));
    }

    public function create(Request $request)
    {
        $category = Category::where('parent_id', 0)->get();
        $tags = null;

        return view('_admin.news.create', compact('category','tags'))->with('title', $this->title);
    }

    public function store(NewsRequest $request)
    {
        $validated = $request->validated();
        $data = News::newRecord($request);

        if ($data->publish == News::STATUS_SCHEDULED) {
            $publishedAt = Carbon::parse($request->get('published_at'));
            NewsScheduler::dispatch($data)->delay($publishedAt);
        }

        return redirect('magic/news')->with('success', 'News added!');
    }

    public function edit(Request $request, $id)
    {
        $category = Category::all();
        $news     = News::findOrFail($id);

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
        $data = News::updateRecord($request, $id);

        if ($data->publish == News::STATUS_SCHEDULED) {
            $publishedAt = Carbon::parse($request->get('published_at'));
            NewsScheduler::dispatch($data)->delay($publishedAt);
        }

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

    public function loadTagData(Request $request)
    {
        $tags = Tag::byPublish()->orderBy('name', 'ASC')->get();
        return response()->json($tags);
    }

    public function loadTagNews(Request $request, $id)
    {
        $news = News::findOrFail($id);
        $tags = $news->tags->pluck('tag_id');
        $tags = Tag::byPublish()->whereIn('id', $tags)->get();
        return response()->json($tags);
    }
}