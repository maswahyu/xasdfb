<?php

namespace App\Http\Controllers;

use App\News;
use App\Category;
use App\Tag;
use App\Http\Resources\NewsCollection;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function category($category)
    {
    	$category = Category::detail($category);

	    if (!$category) {
	    	abort(404);
	    }

        if ($category->parent_id != Category::TOP_PARENT) {

            $slug = array(Category::SNEAKERLAND, Category::LENSA);

            if (!in_array($category->slug, $slug)) {
                return redirect($category->url);
            }
        }

	    $sticky 	 = News::getSticky(2, $category);
	    $latest 	 = News::getLatest(3, $category);
	    $recommended = News::getRecommended();
	    $type 	 	 = 1;

	    return view('frontend.pages.category', [
			'category'         => $category,
            'head'             => $category,
			'type'             => $type,
			'stickyPosts'      => $sticky,
			'latestPosts'      => $latest,
			'recommendedPosts' => $recommended,
	    ]);
    }

    public function subcategory($category, $subcategory)
    {
    	$category = Category::detail($category);

	    if (!$category) {
	    	abort(404);
	    }

	    $subcategory = Category::detail($subcategory);

	    if (!$subcategory) {
	    	abort(404);
	    }

        if ($subcategory->parent_id == Category::TOP_PARENT) {

            return redirect($category->url);

        } else {

            $slug = array(Category::SNEAKERLAND, Category::LENSA);

            if (in_array($subcategory->slug, $slug)) {
                return redirect($subcategory->slug);
            }
        }

    	$sticky 	 = News::getSticky(2, $subcategory);
	    $latest 	 = News::getLatest(3, $subcategory);
	    $recommended = News::getRecommended();
	    $type 	 	 = 0;

	    return view('frontend.pages.category', [
			'category'         => $category,
			'subcategory'      => $subcategory,
            'head'             => $subcategory,
			'type'             => $type,
			'stickyPosts'      => $sticky,
			'latestPosts'      => $latest,
			'recommendedPosts' => $recommended,
	    ]);
    }

    public function detailPost($category, $subcategory, $slug)
    {
        $slug = preg_replace('/~.+/', '', $slug);
    	$post = News::detail($slug);

    	if (!$post) {
	    	abort(404);
	    }

        $category = Category::detail($category);

        if (!$category) {
            return redirect($post->url);
        }

        $subcategory = Category::detail($subcategory);

        if (!$subcategory) {
            return redirect($post->url);
        }

        if ($subcategory->slug == Category::SNEAKERLAND) {
            return redirect(Category::SNEAKERLAND.'/'.$slug);
        }

        if ($subcategory->slug == Category::LENSA) {
            return redirect(Category::LENSA.'/'.$slug);
        }

	    $related = News::related($post->slug, $post->category_id);

	    return view('frontend.pages.post', [
	        'post' => $post,
	        'relatedPosts' => $related,
	    ]);
    }

    public function topPost($slug)
    {
        $slug = preg_replace('/~.+/', '', $slug);
        $post = News::detail($slug);

        if (!$post) {
            abort(404);
        }

        $related = News::related($post->slug, $post->category_id);

        return view('frontend.pages.post', [
            'post' => $post,
            'relatedPosts' => $related,
        ]);
    }

    public function tags($hashtag)
    {
    	return view('frontend.pages.tags');
    }

    public function feedTags(Request $request)
    {
		$hashtag = strip_tags($request->get('hashtag'));
		$page    = $request->get('page');

	    $posts = News::getNewsTags($page, $hashtag);
	    return response()->json(new NewsCollection($posts));
    }

    public function hitperform($id)
    {
    	$post = News::findOrFail($id);
    	$post->hit();

    	return response()->json(['status'=>'success'], 200);
    }
}
