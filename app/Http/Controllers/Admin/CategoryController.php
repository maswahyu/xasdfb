<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Category;

class CategoryController extends Controller
{   
    private $title;

    function __construct()
    {
        $this->title = 'Category';
    }

    public function index(Request $request)
    {   
        return view('_admin.category.index')->with('title', $this->title);
    }

    public function list(Request $request)
    {   
        $keyword = $request->get('only');
        if (!empty($keyword)) {
            $category = Category::oldest()->paginate(10);
        } else {
            $category = Category::oldest()->paginate(10);
        }
        
        return view('_admin.category.list', compact('category','keyword'));
    }

    public function create()
    {   
        $parent = Category::where('parent_id', 0)->get();
        return view('_admin.category.create', compact('parent'))->with('title', $this->title);
    }

    public function store(CategoryRequest $request)
    {   
        $validated = $request->validated();
        
        $data = Category::newRecord($request);

        return redirect('magic/category')->with('success', 'Category added!');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $parent = Category::where('parent_id', 0)->get();
        return view('_admin.category.edit', compact('category','parent'))->with('title', $this->title);
    } 

    public function show($id)
    {
        $category = Category::findOrFail($id);
                
        return view('_admin.category.show', compact('category'))->with('title', $this->title);
    }

    public function update(CategoryRequest $request, $id)
    {
        $validated = $request->validated();
        
        $data = Category::updateRecord($request, $id);
        
        return redirect('magic/category')->with('success', 'Category updated!');
    }

    public function destroy(Request $request, $id)
    {
        Category::destroy($id);

        if($request->ajax()){
            return array("message" => 'Category deleted!', "id" => $id);
        } else {
            return redirect('magic/category')->with('success', 'Category deleted!');
        }
    }
}